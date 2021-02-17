<?php 
class Db{
	protected $conn;
	function __construct()
	{
		$this->conn = new PDO("mysql:host=".HOST.";dbname=".DB, USER, PW);
		$this->conn->query("set names utf8");
	}
	/**
	 * [querySelect Ham tra ve ket qua mang cua truy van sql]
	 * @param  [type] $sql [chuoi truy van select co chua cac tham so ?. $sql="select * from sach where gia> ?"]
	 * @param  array  $arr [Mang tham so truyen vao cho sql: $arr=[50000]]
	 * @return [type]      [array ket qua hoac null neu kg co]
	 */
	protected function querySelect($sql, $arr=[])
	{
		$stm = $this->conn->prepare($sql);
		$stm->execute($arr);
		return $stm->fetchAll();
	}

	protected function querySelectFetch($sql, $arr=[])
	{
		$stm = $this->conn->prepare($sql);
		$stm->execute($arr);
		return $stm->fetch();
	}
/**
 * [queryUpdate xu ly cac truy van update-delete-insert]
 * @param  [type] $sql [description]
 * @param  array  $arr [description]
 * @return [type]      [so ket qua thuc thi]
 */
	protected function queryUpdate($sql, $arr=[])
	{
		$stm = $this->conn->prepare($sql);
		$stm->execute($arr);
		return $stm->rowCount();
	}

}
