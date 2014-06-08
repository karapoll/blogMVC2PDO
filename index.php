<?php
session_start();
require('conf.php');
function __autoload($classname)
{
	require('model/'.$classname.'.class.php');
}
try
{
	$db = new PDO($db_connector.':host='.$db_host.';port='.$db_port.';dbname='.$db_database, $db_user, $db_pass);
}
catch (Exception $e)
{
	die("Internal Error");
}
$db->exec("INSERT INTO ip (ip) VALUES('".$_SERVER['REMOTE_ADDR']."')");
$secu = array('home', 'list', 'post', 'create', 'login', 'logout');
if (isset($_GET['page']))
{
	if (in_array($_GET['page'], $secu) === true)
		$page = $_GET['page'];
	else
		$page = '404';
}
else
	$page = 'home';
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']))
	require('app/'.$page.'.php');
require('app/skel.php');
?>