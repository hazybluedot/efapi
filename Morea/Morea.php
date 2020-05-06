<?php

function first_item($n)
{
    return $n[0];
}

function filter_by($key, $value) {
    return function($n) use ($key, $value) {
        return $n[$key] == $value;
    };
}

function module_filter($module_id) {
    return function($n) use ($module_id) {
        return $n['morea_type'] == 'module' && $n['morea_id'] == $module_id;
    };
}

/* Given a module object, and loaded data,
   Return an array containing all items associated with that module
 */
function module_data($module, $data) {
    $types = array('morea_outcomes', 'morea_readings', 'morea_experiences', 'morea_assessments');
   	$ids = array_reduce($types, function($carry, $type) use ($module) {
        if (array_key_exists($type, $module)) {
            return array_merge($carry, $module[$type]);
        } else {
            return $carry;
        }
    }, array());

    $items = array_filter($data, function($n) use ($ids) {
        #print("checking if " . $n['morea_id'] . " in list of ids\n"); 
        return in_array($n['morea_id'], $ids);
    });

    array_unshift($items,$module);

    return($items);
}

function extractNotes($module) {
	$content = $module['content'];
	$lines = explode("\n", $content);
	//qpreg_split("/<!--\s*NOTE:\s+(.*)-->/", $content);

	$notes = [];
	$state = 'TEXT';
	$currentNote = '';
	while (count($lines) > 0) {
		$line = array_shift($lines);
		$matches = [];
		if (preg_match("/<!-- NOTE:\s*(.*)$/", $line, $matches)) {
			$state = 'NOTE';
			$currentNote = ['title' => $matches[1], 'content' => ''];
		} elseif ($state == 'NOTE' && preg_match("/(.*)\s*-->\s*/", $line)) {
			$state = 'TEXT';
			$currentNote['content'] = $currentNote['content'] . $matches[1] . "\n";
			array_push($notes, $currentNote);
		} elseif ($state == 'NOTE') {
			$currentNote['content'] = $currentNote['content'] . $line . "\n";
		}
	}

	return ['morea_id' => $module['morea_id'], 
			'title' => $module['title'], 
			'morea_type' => $module['morea_type'], 
			'notes' => $notes];
}

class Morea {
	protected $files = [];
	protected $parser = NULL;
 
	function __construct($path) {

		$Dir = new RecursiveDirectoryIterator($path);
		$Iterator = new RecursiveIteratorIterator($Dir);
		$Regex = new RegexIterator($Iterator, '/^.+\.md$/i', RecursiveRegexIterator::GET_MATCH);

		$this->files = array_map('first_item', iterator_to_array($Regex, FALSE));
		$this->parser = new Mni\FrontYAML\Parser();
	}

	function modules() {
    	$data = array_map(array($this, 'parse_file'), $this->files);
	    $modules = array_filter($data, filter_by('morea_type', 'module'));
		return $modules;
 	}

	function module($module_id) {
        $data = array_map(array($this, 'parse_file_with_content'), $this->files);
    
        $module = array_filter($data, module_filter($module_id));

	    $module = array_values($module)[0];
		#$rs = module_data($module, $data);
		return module_data($module, $data);

 	}

	function fetchItem($id) {
	}

	protected function parse_file($file_name, $load_content = FALSE) {
	    $parser = $this->parser;
    	$str = file_get_contents($file_name);
		if (!$str) {
			return ['error' => [ $file_name => 'some error' ]];
		}
    	$document = $parser->parse($str, false);
	    $yaml = $document->getYAML();
		$yaml['_source'] = $file_name;

    	if ($load_content) {
	        $yaml['content'] = str_replace("\r", "", $document->getContent());
	    } else {
    	    #$yaml['file_path'] = $file_name;
	    }
    	return $yaml;
	}

	protected function parse_file_with_content($file_name) {
	    return $this->parse_file($file_name, TRUE);
	}
	
}

?>
