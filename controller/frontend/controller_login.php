<?php 
	class controller_login extends controller{
		public function __construct(){
			parent::__construct();
			//--------------
			$act = isset($_GET["act"])?$_GET["act"]:"";
			switch($act){
				case "logout":
					unset($_SESSION["email"]);
					echo "<script language='javascript'>location.href='index.php?controller=login';</script>";
				break;
			}
			//--------------
			if($_SERVER["REQUEST_METHOD"] == "POST"){
				//ham mysql_escape_string se chuyen ky tu ' thanh \'
				//hoac ham str_replace(search, replace, subject)
				$email = $_POST["email"];
				$password = $_POST["password"];
				//ham md5 la ham ma hoa 1 chieu
				$password = md5($password);
				//kiem tra dang nhap
				$check = $this->model->fetch_one("select email,password,customer_id from tbl_customer where email='$email'");
				if($check["email"] != ""){
					//kiem tra password
					if($check["password"] == $password){
						//dang nhap thanh cong
						$_SESSION["email"] = $email;
						$_SESSION["customer_id"] = $check["customer_id"];
					}
				}
				echo "<script language='javascript'>location.href='index.php';</script>";
			}
			//--------------
			include "view/frontend/view_login.php";
		}
	}
	new controller_login();
 ?>