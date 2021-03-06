<?php 
	class Tour extends Db {
		function getAllTour() {
			$sql = 'select idtour, tours.name, price, time, place, author, traveltype.name as "traveltype", image, zone.name as "zone" from tours inner join traveltype on tours.traveltype = traveltype.id inner join zone on tours.zone = zone.id';
			return $this->querySelect($sql);
		}

		function deleteTour($idtour) {
			$sql = "delete from tours where idtour = ?";
			$arr = [$idtour];
			return $this->queryUpdate($sql, $arr);
		}

		function getIdTour() {
			$sql = "select * from `tours` order by idtour desc limit 1";
			return $this->querySelectFetch($sql);
		}

		function updateDetail($sql, $arr) {
			return $this->queryUpdate($sql, $arr);
		}

		function getDetail($idtour) {
			$sql = "select * from tourdetail where idtour=?";
			$arr = [$idtour];
			return $this->querySelectFetch($sql, $arr);
		}

		function insertTour($sql, $arr) {
			return $this->queryUpdate($sql, $arr);
		}

		function updateTour($sql, $arr) {
			return $this->queryUpdate($sql, $arr);
		}

		function getAllTravelType() {
			$sql = "select * from traveltype";
			return $this->querySelect($sql);
		}

		function getAllZone() {
			$sql = "select * from zone";
			return $this->querySelect($sql);
		}

		function getTour($idtour) {
			$sql = 'select idtour, tours.name, price, time, place, author, traveltype.name as "traveltype", image, zone.name as "zone" from tours inner join traveltype on tours.traveltype = traveltype.id inner join zone on tours.zone = zone.id where idtour = ?';
			$arr = [$idtour];
			return $this->querySelectFetch($sql, $arr);
		}
	}
?>