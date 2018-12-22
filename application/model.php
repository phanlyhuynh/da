<?php 
/*
	file model.php
	mo ta: bao gom cac ham de thuc hien vao, ra, truy van du lieu
*/
	class model{
		//ham tra ve cac ban ghi
		public function fetch($sql){
			global $conn;
			$query = mysqli_query($conn,$sql);
			$arr = array();
			while($rows = mysqli_fetch_array($query))
				$arr[] = $rows;
			return $arr;
		}
		//ham tra ve mot ban ghi
		public function fetch_one($sql){
			global $conn;
			$query = mysqli_query($conn,$sql);
			$rows = mysqli_fetch_array($query);
			return $rows;
		}
		//truy van va tra ve id cua ban ghi
		public function execute($sql){
			global $conn;
			$get_insert_id = 0;
			if(mysqli_query($conn,$sql)==true)
				$get_insert_id = mysqli_insert_id($conn);
			return $get_insert_id;
		}
		//dem so ban ghi
		public function num_rows($sql){
			global $conn;
			$query = mysqli_query($conn,$sql);
			return mysqli_num_rows($query);
		}
	}
 ?>