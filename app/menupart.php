<?php
if (isset($_SESSION['id']))
	require('views/menuadmin.html');
else
	require('views/menulogin.html');
?>
