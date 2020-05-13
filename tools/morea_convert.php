<?php

$script_path = pathinfo(getcwd() . '/' . $_SERVER['PATH_TRANSLATED'], PATHINFO_DIRNAME);

require($script_path . "/../vendor/autoload.php");
include($script_path . "/../Morea/Morea.php");
require_once($script_path . "/../EF/ORM/Library.php");

use EF\ORM\Library as Library;

echo "Script path: $script_path\n";
echo "Server home: " . $_SERVER['HOME'] . "\n";
$morea_path = isset($argv[1]) ? $argv[1] : $_SERVER['HOME'] . '/src/morea';

$morea = new Morea($morea_path);
$user = array('username' => 'dmaczka', 'name' => 'Darren Maczka', 'email' => 'dmaczka@utk.edu');
$library = new Library($user, './test/repos');

class PropIterator extends IteratorIterator {
    private $prop = null;
    
    public function __construct(Iterator $iterator, string $prop) {
        parent::__construct($iterator);
        $this->prop = $prop;
    }
    
    public function current() {
        $current = parent::current();
        return $current[$this->prop];
    }
}

$ids = array_count_values(iterator_to_array(new PropIterator($morea->items(), 'morea_id')));
$dups = array_filter($ids, function($k, $v) {
    return $v > 1;
}, ARRAY_FILTER_USE_BOTH);

if (count($dups) > 1) {
    echo "Duplicate IDs, resolve before continuing...\n";
    print_r($dups);
    exit(-1);
}

foreach($morea->items(true) as $item) {
    //var_dump($key, $item);
    $content = $item['content'];
    unset($item['content']);
    unset($item['_source']);
    $library->stage($item['morea_id'], $item, $content);
    $library->commit($item['morea_id'], 'Initial commit', array('--author="Another Author"'));
}
?>
