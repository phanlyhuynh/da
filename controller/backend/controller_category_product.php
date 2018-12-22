<?php 
	class controller_category_product extends controller{
		public function __construct(){
			parent::__construct();
			//--------
			$act = isset($_GET["act"])?$_GET["act"]:"";
			switch($act){
				case "delete":
					$id = isset($_GET["id"])?$_GET["id"]:0;
					//xoa ban ghi co id truyen vao
					$this->model->execute("delete from tbl_category_product where pk_category_product_id=$id");
					header("location:admin.php?controller=category_product");
				break;
			}
			//--------
			//so ban ghi tren mot trang
			$recorde_perpage = 10;
			//tong so ban ghi
			$total_record = $this->model->num_rows("select * from tbl_category_product");
			//tinh so trang = tongsobanghi/sobanghitrentrang
			$num_page = ceil($total_record/$recorde_perpage);
			//xac dinh trang hien tai
			$cur_page= isset($_GET["p"])&&$_GET["p"] > 0?$_GET["p"]-1:0;
			//xac dinh tu ban ghi nao den ban ghi nao
			$from = $recorde_perpage*$cur_page;
			//--------
			//lay toan bo ban ghi cua tbl_category_product
			$arr = $this->model->fetch("select * from tbl_category_product order by pk_category_product_id desc limit $from,$recorde_perpage");
			//load view
			include "view/backend/view_category_product.php";
		}
	}
	new controller_category_product();
 ?>