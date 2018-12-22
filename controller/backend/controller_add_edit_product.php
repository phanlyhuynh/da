<?php 
	class controller_add_edit_product extends controller{
		public function __construct(){
			parent::__construct();
			$act = isset($_GET["act"])?$_GET["act"]:"";
			switch($act){
				case "edit":
					$id = isset($_GET["id"])?$_GET["id"]:0;
					//lay ban ghi co id truyen
					$arr = $this->model->fetch_one("select * from tbl_product where pk_product_id=$id");
					$form_action = "admin.php?controller=add_edit_product&act=do_edit&id=$id";
					//load view
					include "view/backend/view_add_edit_product.php";
				break;
				case "do_edit":
					$id = isset($_GET["id"])?$_GET["id"]:0;
					$c_name = $_POST["c_name"];
					$c_hotproduct = isset($_POST["c_hotproduct"])?1:0;
					$c_description = $_POST["c_description"];
					$c_content = $_POST["c_content"];
					$fk_category_product_id=$_POST["fk_category_product_id"];
					$this->model->execute("update tbl_product set c_name='$c_name',c_description='$c_description',c_content='$c_content',c_hotproduct=$c_hotproduct,fk_category_product_id=$fk_category_product_id where pk_product_id=$id");
					$c_img = "";
					//--------------
					if($_FILES["c_img"]["name"] != ""){
						//---------
						//xoa anh cu
						$arr_old_img = $this->model->fetch_one("select * from tbl_product where pk_product_id=$id");
						$old_img = $arr_old_img["c_img"]!=""?$arr_old_img["c_img"]:"";
						if(file_exists("public/upload/product/".$old_img)&&$old_img!= "")
							unlink($old_img);
						//---------
						//thuc hien upload file
						$c_img = time().$_FILES["c_img"]["name"];
						move_uploaded_file($_FILES["c_img"]["tmp_name"], "public/upload/product/$c_img");
						//update c_img cua ban ghi co id truyen vao
						$this->model->execute("update tbl_product set c_img='$c_img' where pk_product_id=$id");
					}
					//--------------
					header("location:admin.php?controller=product");
				break;
				default:
					$form_action = "admin.php?controller=add_edit_product&act=do_add";
					include "view/backend/view_add_edit_product.php";
				break;
				case "do_add":
					$c_name = $_POST["c_name"];
					$c_hotproduct = isset($_POST["c_hotproduct"])?1:0;
					$c_description = $_POST["c_description"];
					$c_content = $_POST["c_content"];
					$fk_category_product_id=$_POST["fk_category_product_id"];
					$c_img = "";
					if($_FILES["c_img"]["name"] != ""){
						//thuc hien upload file
						$c_img = time().$_FILES["c_img"]["name"];
						move_uploaded_file($_FILES["c_img"]["tmp_name"], "public/upload/product/$c_img");
					}
					//insert ban ghi vao csdl
					$this->model->execute("insert into tbl_product(c_name,c_description,c_content,c_img,c_hotproduct,fk_category_product_id) values('$c_name','$c_description','$c_content','$c_img',$c_hotproduct,$fk_category_product_id)");
					header("location:admin.php?controller=product");
				break;
			}
		}
	}
	new controller_add_edit_product();
 ?>