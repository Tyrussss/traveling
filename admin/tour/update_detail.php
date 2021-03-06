<?php
	include '../../config.php';
	include ROOT.'/function.php';
	spl_autoload_register("loadClass");
	if (!isset($_SESSION)) session_start();

	$idtour = post('idtour');
	$detail = post('detail');

	$sql = "update tourdetail set detail = ? where idtour= ?";
	$arr = [$detail, $idtour];

	$tour = new Tour;
	$tour -> updateDetail($sql, $arr);	
	header('location: ../tour_table.php');
	exit;
?>