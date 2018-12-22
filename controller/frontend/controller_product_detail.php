<?php 
	class controller_product_detail extends controller{
		public function __construct(){
			parent::__construct();
			$id=isset($_GET["id"])?$_GET["id"]:0;
			$arr=$this->model->fetch_one("select * from tbl_product where pk_product_id=$id");
			include "view/frontend/view_product_detail.php";
		}
	}
	new controller_product_detail();
 ?>