<?php 
class Sach extends Db 
{
	function getAll()
	{
		return $this->querySelect("select * from sach");
	}

	function searchByName($name)
	{
		$sql="select * from sach where tensach like ? ";
		$arr =["%$name%"];
		return $this->querySelect($sql, $arr);
	}

	function Them()
	{
		$a =[];
		$a[]= post('masach');
		$a[]= post('tensach');
		$a[]= post('mota');
		$a[]= post('gia');
		$a[]= 'hinh';
		$a[]= post('manxb');
		$a[]= post('maloai');
		$sql="insert into sach(masach, tensach, mota, gia, hinh, manxb, maloai) values(?,?,?,?,?,?,?)";
		return $this->queryUpdate( $sql, $a);
	}

	function SearchByMasach($masach)
	{
		$sql="select * from sach where masach =? ";
		$data = $this->querySelect($sql, [$masach]);

		return $data[0];
	}

	function updateSach()
	{
		$masach = post('masach');
		$tensach = post('tensach');
		$mota=post('mota');
		$gia = post('gia');
		$maloai = post('maloai');
		$manxb = post('manxb');
		if ($_FILES['hinh']['error']>0) //kg cap nhat hinh
		{
			$sql="update sach set tensach=?, gia=?, mota=?, maloai=?, manxb=? where masach=?";
			$arr = [$tensach, $gia, $mota, $maloai, $manxb, $masach];
			
		}
		else 
		{
			$hinh =time().'-'. $_FILES['hinh']['name'];
			$sql="update sach set tensach=?, gia=?, mota=?, maloai=?, manxb=?, hinh=? where masach=?";
			$arr = [$tensach, $gia, $mota, $maloai, $manxb, $hinh, $masach];

			move_uploaded_file($_FILES['hinh']['tmp_name'], "image_data/$hinh");
		}
		echo $sql;
		print_r($arr);
		return $this->queryUpdate($sql, $arr);
	}
//---------Nha xb
	function getAllNhaxb()
	{
		return $this->querySelect('select * from nhaxb');
	}


//-------Loai
	function getAllLoai()
	{
		return $this->querySelect('select * from loai');
	}
}