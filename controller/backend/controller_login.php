<?php 
	class controller_login extends controller{
		public function __construct(){
			parent::__construct();
			//--------------
			if($_SERVER["REQUEST_METHOD"] == "POST"){
				//ham mysql_escape_string se chuyen ky tu ' thanh \'
				//hoac ham str_replace(search, replace, subject)
				$c_username = $_POST["c_username"];
				$c_password = $_POST["c_password"];
				//ham md5 la ham ma hoa 1 chieu
				$c_password = md5($c_password);
				//kiem tra dang nhap
				$check = $this->model->fetch_one("select c_username,c_password from tbl_user where c_username='$c_username'");
				if($check["c_username"] != ""){
					//kiem tra password
					if($check["c_password"] == $c_password){
						//dang nhap thanh cong
						$_SESSION["c_username"] = $c_username;
					}
				}
				header("location:admin.php");
			}
			//--------------
			include "view/backend/view_login.php";
		}
	}
	new controller_login();
 ?>