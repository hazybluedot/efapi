<?php

namespace EF\ORM;

require_once("EF/ORM/Feedback.php");
use EF\ORM\Feedback as Surveys;

require_once('sqlHelpers.php');

function quizLink($quizID) {
	$q = http_build_query(['f' => 'assess/main', 'name' => $quizID]);
	return '/sys.php?' . $q;
}

function dropboxLink($dbID) {
	$q = http_build_query(['f' => 'dropbox/main', 'pid' => $dbID]);
	return '/sys.php?' . $q;
}

class Resources {
	private $settings;
	private $db;

 	const time_cutoffs = ['time_1', 'time_2', 'time_3', 'time_4', 'time_5'];

	function __construct($db, $classconfig) {
		$this->db = $db;
		$this->settings = $classconfig;	
	}

  	/* list all items */
  	function items() {
		$q = "SELECT title,shortname,time_start,time_1,time_2,time_3,time_4,time_5,time_end,time_weights FROM quiz_setup WHERE shortname IS NOT NULL AND time_start >= (SELECT MIN(starttime) FROM `calendar`)";
        $quizdata = $this->db->query($q . ';', [$this, 'assignment_map']); 

		$q = "SELECT pid, description as title, instructions, time_start, time_late, time_end FROM `dropbox`
				WHERE time_start >= (SELECT MIN(starttime) FROM `calendar`)";
		$dropboxdata = $this->db->query($q . ';', [$this, 'dropbox_map']);

		$feedback = new Surveys($this->settings); 		

		return array_merge($quizdata, $dropboxdata, $feedback->items());
  	}

	function assignment_map($rs) {	//global $time_cutoffs;
		$time_cutoffs = Resources::time_cutoffs; 
		return result_map($rs, function($item) use($time_cutoffs) {
			$item['id'] = 'quiz/' . $item['shortname'];
        	$item['type'] = 'quiz';
			$item['href'] = $this->settings['wwwroot'] . quizLink($item['shortname']);
        	$cutoffs = explode(",", $item['time_weights']);
        	$time_cols =  array_slice($time_cutoffs, 0, count($cutoffs) - 1);
        	array_push($time_cols, 'time_end');
                    	$item['dates'] = array_map(function($weight, $col) use($item) {
           		return ['due' => $item[$col], 'weight' => $weight];
	        }, $cutoffs, $time_cols);
    	    foreach($time_cutoffs as $name) {
        	    unset($item[$name]);
	        }
    	    unset($item['time_weights']);
	        unset($item['shortname']);
			return $item;
    	});
	}

	function dropbox_map($rs) {
		return result_map($rs, function($item) {
			$item['id'] = 'dropbox/' . $item['pid'];
			$item['type'] = 'file';
			$item['href'] = $this->settings['wwwroot'] . dropboxLink($item['pid']);
			$item['dates'] = [['due' => $item['time_late'], 'weight'=>1]];
			unset($item['time_late']);
			unset($item['pid']);
			return $item;
		});
	}
}
?>
