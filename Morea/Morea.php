<?php

function filter_by($key, $value) {
    return function($n) use ($key, $value) {
        return isset($n[$key]) && $n[$key] == $value;
    };
}

function module_filter($module_id) {
    return function($n) use ($module_id) {
        return isset($n['morea_type']) && $n['morea_type'] == 'module' && $n['morea_id'] == $module_id;
    };
}

/* Given a module object, and loaded data,
   Return an array containing all items associated with that module
 */
function module_data($module, Iterator $data) {
    $morea_types = Morea::$types;
   	$ids = array_reduce($morea_types, function($carry, $type) use ($module) {
        if (array_key_exists($type, $module)) {
            return array_merge($carry, $module[$type]);
        } else {
            return $carry;
        }
    }, array());

    $items = new CallbackFilterIterator($data, function($n) use ($ids) {
        #print("checking if " . $n['morea_id'] . " in list of ids\n"); 
        return in_array($n['morea_id'], $ids);
    });

    $items = iterator_to_array($items);
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

class ItemIterator extends IteratorIterator {
    //private $position = 0;
    private $files; // = [];
    private $parser;
    private $load_contents = false;
    private $current = null;
    
    public function __construct(Iterator $files, bool $load_contents = false) {
        //$this->position = 0;
        parent::__construct($files);
        //$this->files = $files;
        $this->load_contents = $load_contents;
		$this->parser = new Mni\FrontYAML\Parser();
    }
        
    public function current() {
        $current = parent::current();
        $this->current = call_user_func_array(array($this, 'parse_file'), array($current, $this->load_contents));
        return $this->current;
    }

    public function isValid() {
        return isset($this->current['title']) && isset($this->current['morea_id']);
    }
    
    public function isType($type) {
        return $this->current['morea_type'] == $type;
    }

	protected function parse_file($file_name, $load_content = FALSE) {
	    $parser = $this->parser;
    	$str = file_get_contents($file_name);
		if (!$str) {
			return array('error' => [ 'path' => $file_name ]);
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
}

class FileIterator extends FilterIterator {
    public function accept() {
        $basename = $this->current()->getFilename();
        $ext = $this->current()->getExtension();
        return (!in_array($basename[0], array('#', '.'), true) && $ext == 'md');
    }
}

class Morea {
    public static $types = array('morea_outcomes', 'morea_readings', 'morea_experiences', 'morea_assessments');
	protected $files = [];
	protected $parser = NULL;
 
	function __construct($path) {
		$Dir = new RecursiveDirectoryIterator($path);
		$this->files = new FileIterator(new RecursiveIteratorIterator($Dir)); 
		$this->parser = new Mni\FrontYAML\Parser();
	}

    function items($load_content = false) {
        return new CallbackFilterIterator(new ItemIterator($this->files, $load_content), function($item, $key, $iterator) {
                return $iterator->isValid();
            });
    }
    
    function getItem($itemid) {
        $item = new CallbackFilterIterator($this->items, filter_by('morea_id', $itemid));
        $item->next();
        return $item->current();
    }
    
	function modules() {
    	$modules = new CallbackFilterIterator($this->items(), filter_by('morea_type', 'module'));
	    //$modules = array_filter($data, filter_by('morea_type', 'module'));
		return $modules;
 	}

	function module($module_id) {
        $it = new CallbackFilterIterator($this->items(true), module_filter($module_id));
        $it->next();
        return module_data($it->current(), $this->items(true));
 	}

	function fetchItem($id) {
	}

    function validate() {
        $items = iterator_to_array($this->items());
        $report = array_map(function($item) use ($items) {
            return [$item['morea_id'], $this->validation_report($item, $items)];
        }, $items);
        return array_combine(array_column($report, 0), array_column($report, 1));
    }
    
    protected function validation_report($item, $items) {
        $report = [];
        $keys = array_map(function($item) { return array_column($item, 'morea_id'); }, $items);
        if (!isset($item['title'])) $report[] = 'no title';
        foreach(self::$types as $type) {
            $children = $item[$type];
            if (is_array($children)) {
                foreach($children as $childkey) {
                    if (!in_array($childkey, $keys)) {
                        $report[] = "$type/$childkey not found";
                    } else {
                        $child = $this->getItem($childkey);
                        if ($child['morea_type'] !== $type) {
                            $report[] = "$type/$childkey has mismatched type (" . $child['morea_type'] . ")";
                        }
                    }
                }
            }
        }
        
        return $report;
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
