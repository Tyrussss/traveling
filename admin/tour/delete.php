<?php
	include '../../config.php';
	include ROOT.'/function.php';
	spl_autoload_register("loadClass");

	$idtour = get('idtour');
	$tour = new Tour;
	$tour -> deleteTour($idtour);
	header('location: ../tour_table.php');
	exit;
?>