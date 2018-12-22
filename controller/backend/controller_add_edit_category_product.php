<?php 
	class controller_add_edit_category_product extends controller{
		public function __construct(){
			parent::__construct();
			$act = isset($_GET["act"])?$_GET["act"]:"";
			switch($act){
				case "edit":
					$id = isset($_GET["id"])?$_GET["id"]:0;
					$form_action = "admin.php?controller=add_edit_category_product&act=do_edit&id=$id";
					//lay ban ghi co id truyen vao
					$arr = $this->model->fetch_one("select * from tbl_category_product where pk_category_product_id=$id");
					include "view/backend/view_add_edit_category_product.php";
				break;
				case "do_edit":
					$id = isset($_GET["id"])?$_GET["id"]:0;
					$c_name = $_POST["c_name"];
					$c_home = isset($_POST["c_home"])?1:0;
					//update ban ghi
					$this->model->execute("update tbl_category_product set c_name='$c_name',c_home=$c_home where pk_category_product_id=$id");
					header("location:admin.php?controller=category_product");
				break;
				default:
					$form_action = "admin.php?controller=add_edit_category_product&act=do_add";
					include "view/backend/view_add_edit_category_product.php";
				break;
				case "do_add":
					$c_name = $_POST["c_name"];
					$c_home = isset($_POST["c_home"])?1:0;
					$this->model->execute("insert into tbl_category_product(c_name,c_home) values('$c_name',$c_home)");
					header("location:admin.php?controller=category_product");
				break;
			}
		}
	}
	new controller_add_edit_category_product();
 ?>