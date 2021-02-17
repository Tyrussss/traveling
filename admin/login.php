<?php
	if (!isset($_SESSION)) session_start();

	include '../config.php';
	include '../function.php';
	spl_autoload_register("loadClass");

	$username = post('user');
	$password = post('pass');
	$password = md5($password);

	$user = new User;
	$login = $user -> login($username, $password);
	if ($login > 0) {
		$data = $user -> getUser($username);
		$_SESSION['admin'] = $data;
		header('location: index.php');
	} else {
		header('location: login.html');
		exit;
	}
?>