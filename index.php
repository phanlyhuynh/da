<?php 
	session_start();
	//load file config
	include "config.php";
	//load file model
	include "application/model.php";
	//load file controller
	include "application/controller.php";
	//lấy biến controller truyền từ url
		$controller = isset($_GET["controller"])?$_GET["controller"]:"home";
	if($controller!= "")
		//thuc hien viec ghep chuoi de ra duong dan vat ly
		$controller = "controller/frontend/controller_".$controller.".php";
	include "view/frontend/view_layout.php";
 ?>