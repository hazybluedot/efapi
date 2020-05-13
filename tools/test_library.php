<?php
$script_path = pathinfo(getcwd() . '/' . $_SERVER['PATH_TRANSLATED'], PATHINFO_DIRNAME);

require_once($script_path . "/../vendor/autoload.php");
require_once($script_path . "/../Morea/Morea.php");
require_once($script_path . "/../EF/ORM/Library.php");

use EF\ORM\Library as Library;

$user = array('username' => 'dmaczka', 'name' => 'Darren Maczka', 'email' => 'dmaczka@utk.edu');

$library = new Library($user, './test/repos');

$item = $library->get('module-spreadsheet-visualize-timeseries');

var_dump($item->getYAML());
var_dump($item->getContent());
?>
