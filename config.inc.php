<?php
list($scriptPath) = get_included_files();
$SCRIPT_DIR = pathinfo($scriptPath, PATHINFO_DIRNAME);
$API_BASEPATH = '/ef105-2020-08/apidev';
//$CLASS_CONFIG_PATH = '/www/c/ef105-2020-08/inc/classconfig.inc.php';
$CLASS_CONFIG = array(
    'sessionname' => "UTK_EFD_EF105_2020_08",
    'localroot' => $SCRIPT_DIR . DIRECTORY_SEPARATOR . "test/www",
    'repobase' => $SCRIPT_DIR . DIRECTORY_SEPARATOR . "test/library",
    'wwwroot' => "/ef105-2020-08",
    'gbowwwroot' => "/c/sys/30",
    'gbolocalroot' => "/www/c/sys/30",
    'classid' => "ef105_2020_08",
    'secureserver' => "https://efcms.engr.utk.edu");
$TEST_SESSION = array("user" => array("priv" => "admin", "username" => "dmaczka", "name" => "Darren Maczka", "email" => "dkm@utk.edu", "show" => 0));
ini_set("mysqli.default_user", "ef_local"); 
ini_set("mysqli.default_host", "localhost"); # "localhost";
ini_set("mysqli.default_pw", "supersecret");
?>
