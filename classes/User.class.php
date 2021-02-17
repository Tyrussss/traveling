<?php
	class User extends Db {
		function login($username, $password) {
			$sql = "select username, password from user where username = ? and password = ?";
			$arr = [$username, $password];
			return $this->queryUpdate($sql, $arr);
		}

		function getUser($username) {
			$sql = "select * from user where username = ?";
			$arr = [$username];
			return $this->querySelectFetch($sql, $arr);
		}

		function updateUser($sql, $arr) {
			return $this->queryUpdate($sql, $arr);
		}

		function getAllUser() {
			$sql = "select * from user";
			return $this->querySelect($sql);
		}

		function deleteUser($username) {
			$sql = "delete from user where username = ?";
			$arr = [$username];
			return $this->queryUpdate($sql, $arr);
		}

		function insertUser($sql, $arr) {
			return $this->queryUpdate($sql, $arr);
		}
	}
?>