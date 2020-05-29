<?php
$script_path = pathinfo(getcwd() . '/' . $_SERVER['PATH_TRANSLATED'], PATHINFO_DIRNAME);

require_once($script_path . "/../vendor/autoload.php");
require_once($script_path . "/../Morea/Morea.php");
require_once($script_path . "/../EF/ORM/Library.php");

use EF\ORM\Library as Library;

$user = array('username' => 'dmaczka', 'name' => 'Darren Maczka', 'email' => 'dmaczka@utk.edu');

$repoPath = is_dir($argv[1]) ? $argv[1] : './test/repo';
$library = new Library($user, $repoPath);
$library->setDebug(true);

//var_dump($library->items());
//exit(0);

$item = $library->get('module/spreadsheet-visualize-timeseries');

if ($item) {
    print(json_encode($item->getYAML(), JSON_PRETTY_PRINT) . "\n");
    print($item->getContent());
} else {
    echo "Item not found\n";
}

?>
