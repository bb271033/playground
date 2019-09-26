<?php
define('ROOT_PATH', $_SERVER["DOCUMENT_ROOT"].'/GitHub/playground');

$action = isset($_GET['action']) ? $_GET['action'] : '';
if($action === 'delete'){
	echo ROOT_PATH.'/'.$action;
	include $action.'.php';
}
//var_dump($action);


