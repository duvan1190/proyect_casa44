<?php
	// error_reporting(E_ALL);
	// ini_set('display_errors', '1');
$url = $_GET['view'];
$url = str_replace('/', '', $url);
session_start();
date_default_timezone_set('America/Bogota');
setlocale(LC_CTYPE, 'es');
$rute = getcwd();
$rute = $rute.'/';
require_once('db/db-li.class.php');
require_once('models/logic.php');
require_once('models/estructure.php');
require_once('models/tools.php');
require_once('models/model.php');
include_once('controller/controller.php');
$db = new Database();
$GLOBALS['connect'] = $db->connect();
$controller = new Controller($db);
?>
