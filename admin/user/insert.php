<?php
	include '../../config.php';
	include ROOT.'/function.php';
	spl_autoload_register("loadClass");
	if (!isset($_SESSION)) session_start();

	$username = post('username');
	$password = md5(post('password'));
	$fullname = post('fullname');
	$email = post('email');
	$phonenumber = post('phonenumber');
	$avatar = $_FILES['avatar']['name'];
	move_uploaded_file($_FILES['avatar']['tmp_name'], "../images/$avatar");
	$permission = post('permission');

	$sql = "insert into user (username, password, fullname, email, phonenumber, avatar, permission) values (?,?,?,?,?,?,?)";
	$arr = [$username, $password, $fullname, $email, $phonenumber, $avatar, $permission];

	$user = new User;
	$user -> insertUser($sql, $arr);

	header('location: ../user_table.php');
	exit;
?>