<?php 
	class controller_user extends controller{
		public function __construct(){
			parent::__construct();
			$act = isset($_GET["act"])?$_GET["act"]:"";
			switch($act){
				case "edit":
					$id = isset($_GET["id"])?$_GET["id"]:0;
					$form_action = "admin.php?controller=add_edit_user&act=do_edit&id=$id";
					//lay ban ghi co id truyen vao
					$arr = $this->model->fetch_one("select * from tbl_user where pk_user_id=$id");
					//load view
					include "view/backend/view_add_edit_user.php";
				break;
				case "do_edit":
					$id = isset($_GET["id"])?$_GET["id"]:0;
					//$c_fullname = mysql_escape_string($_POST["c_fullname"]);
					$c_fullname = str_replace("'", "\'", $_POST["c_fullname"]);
					$c_password = $_POST["c_password"];
					//ham mysql_escape_string(chuoi) se replace ky tu ' thanh \'
					//update c_fullname
					$this->model->execute("update tbl_user set c_fullname='$c_fullname' where pk_user_id=$id");
					//kiem tra, neu password != "" thi update password
					if($password != "")
						$this->model->execute("update password set c_password='$c_password' where pk_user_id=$id");
					header("location:admin.php?controller=user");
				break;
				case "add":
					$form_action = "admin.php?controller=add_edit_user&act=do_add";
					//load view
					include "view/backend/view_add_edit_user.php";
				break;
				case "do_add":
					$c_fullname = str_replace("'", "\'", $_POST["c_fullname"]);
					$c_username = str_replace("'", "\'", $_POST["c_username"]);
					$c_password = str_replace("'", "\'", $_POST["c_password"]);
					$this->model->execute("insert into tbl_user(c_fullname,c_username,c_password) values('$c_fullname','$c_username','$c_password')");
					header("location:admin.php?controller=user");
				break;
			}
		}
	}
	new controller_user();
 ?>