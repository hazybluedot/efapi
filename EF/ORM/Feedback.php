<?php

namespace EF\ORM;

class Feedback {
	
	function __construct($classinfo) {
		$path = $classinfo['localroot'] . '/feedback';
		$Dir = new \RecursiveDirectoryIterator($path);
		$Iterator = new \RecursiveIteratorIterator($Dir);
		$Regex = new \RegexIterator($Iterator, '/^.+\.php$/i', \RecursiveRegexIterator::GET_MATCH);
		$this->settings = $classinfo;
		$this->files = array_map(function($n) { return $n[0]; }, iterator_to_array($Regex, FALSE));
	}

	function items() {
		return array_map(function($file) {
			$lines = preg_grep("/^\w*\\$(s->|pagetitle).*/", explode("\n", file_get_contents($file)));
			$s = new \stdClass();
			$code = implode("\n", $lines);
			eval($code);
			$pinfo = pathinfo($file);
			return ['title' => $pagetitle,
					'id' => 'feedback/' . $pinfo['filename'],
					'type' => 'feedback',
					'start_time' => date(\DateTimeInterface::ISO8601, strtotime($s->start_time)),
					'end_time' => date(\DateTimeInterface::ISO8601, strtotime($s->end_time)),
					'href' => $this->settings['wwwroot'] . '/feedback/' . $pinfo['basename']];
		}, $this->files);
	}
}

?>
