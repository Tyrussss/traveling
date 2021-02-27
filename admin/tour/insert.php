<?php
	include '../../config.php';
	include ROOT.'/function.php';
	spl_autoload_register("loadClass");
	if (!isset($_SESSION)) session_start();

	$name = post('name');
	$price = post('price');
	$time = post('time');
	$place = post('place');
	$image = $_FILES['image']['name'];
	move_uploaded_file($_FILES['image']['tmp_name'], "../../img/imgtour/$image");
	$traveltype = post('traveltype');
	$zone = post('zone');
	$author = post('author');

	$sql = "insert into tours (name, price, time, place, author, traveltype, image, zone) 
	values (?,?,?,?,?,?,?,?)";
	$arr = [$name, $price, $time, $place, $author, $traveltype, $image, $zone];

	$user = new Tour;
	$user -> insertTour($sql, $arr);

	header('location: ../tour_table.php');
	exit;
?>