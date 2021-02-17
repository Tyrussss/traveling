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

	if ($_FILES['avatar']['error']>0) //kg cap nhat hinh 
	{
		$sql = "update user set password = ?, fullname = ?, email = ?, phonenumber = ? where username = ?";
		$arr = [$password, $fullname, $email, $phonenumber, $username];
	} else {
		$avatar = $_FILES['avatar']['name'];
		$sql = "update user set avatar = ?, password = ?, fullname = ?, email = ?, phonenumber = ? where username = ?";
		$arr = [$avatar, $password, $fullname, $email, $phonenumber, $username];
		move_uploaded_file($_FILES['avatar']['tmp_name'], "../images/$avatar");
	}
	$user = new User;
	$user -> updateUser($sql, $arr);	
	header('location: ../user_table.php');
	exit;
?>