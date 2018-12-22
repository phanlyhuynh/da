<?php 
	session_start();
	//load file config
	include "config.php";
	//load file model
	include "application/model.php";
	//load file controller
	include "application/controller.php";
	//kiem tra, neu user chua dang nhap thi yeu cau phai dang nhap truoc khi vao trang admin
	if(isset($_SESSION["c_username"]) == false){
		include "controller/backend/controller_login.php";
	}else{
		//user da dang nhap
		$controller = isset($_GET["controller"])?$_GET["controller"]:"";
		if($controller!= "")
			//thuc hien viec ghep chuoi de ra duong dan vat ly
			$controller = "controller/backend/controller_".$controller.".php";
		include "view/backend/view_layout.php";
	}
 ?>