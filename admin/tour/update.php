<?php
	include '../../config.php';
	include ROOT.'/function.php';
	spl_autoload_register("loadClass");
	if (!isset($_SESSION)) session_start();

	$idtour = post('idtour');
	$name = post('name');
	$price = post('price');
	$time = post('time');
	$place = post('place');
	$traveltype = post('traveltype');
	$zone = post('zone');

	if ($_FILES['image']['error']>0) //kg cap nhat hinh 
	{
		$sql = "update tours set name = ?, price = ?, time = ?, place = ?, traveltype = ?, zone = ? where idtour = ?";
		$arr = [$name, $price, $time, $place, $traveltype, $zone, $idtour];
	} else {
		$image = $_FILES['image']['name'];
		$sql = "update tours set name = ?, price = ?, time = ?, place = ?, traveltype = ?, zone = ?, image = ? where idtour=?";
		$arr = [$name, $price, $time, $place, $traveltype, $zone, $image, $idtour];
		move_uploaded_file($_FILES['image']['tmp_name'], "../../img/imgtour/$image");
	}
	$tour = new Tour;
	$tour -> updateTour($sql, $arr);	
	header('location: ../tour_table.php');
	exit;
?>