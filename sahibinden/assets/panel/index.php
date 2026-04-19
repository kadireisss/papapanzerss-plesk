<?php 
include "top.php";
error_reporting(0);
$page_name = $_GET['page'];
$action = $_GET['action'];
if($page_name) {
	if (!file_exists($page_name."/index.php") && !file_exists($page_name."/".$action.".php")) {
	die("File not found.");
}
if(empty($action)) {
	include $page_name."/index.php";
}else {
	include $page_name."/".$action.".php";
}
}
