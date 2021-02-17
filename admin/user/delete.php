<?php
	include '../../config.php';
	include ROOT.'/function.php';
	spl_autoload_register("loadClass");

	$username = get('username');
	$user = new User;
	$user -> deleteUser($username);
	header('location: ../user_table.php');
	exit;
?>