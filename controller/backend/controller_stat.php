<?php 
	class controller_stat extends controller{
		public function __construct(){
			parent::__construct();
			//thong ke so user
			$users = $this->model->fetch("select * from tbl_user");
			$usercount=0;
			foreach ($users as $key => $value) {
				$usercount++;
			}
			//thong ke so hoa don
			$orders = $this->model->fetch("select * from tbl_order");
			$ordercount=0;			
			$chuagiaohang=0;
			$dagiaohang=0;
			foreach ($orders as $key => $value) {
				$ordercount++;
				if($value['status']==0) {
					$chuagiaohang++;
				} else {
					$dagiaohang++;
				}
			}
			//thong ke san pham
			$products = $this->model->fetch("select * from tbl_product");
			$productcount=0;
			foreach ($products as $key => $value) {
				$productcount++;
			}
			$prod = $this->model->fetch("SELECT x.c_name as name, MAX(x.count) as count FROM ( SELECT c_name, count(*) as count FROM tbl_order_detail INNER JOIN tbl_product ON tbl_order_detail.fk_product_id=tbl_product.pk_product_id GROUP BY tbl_product.pk_product_id ) x");
			foreach ($prod as $key => $value) {
				$nameproduct = $value["name"];
				$countproduct = $value["count"];
			}
			//load view
			include "view/backend/view_stat.php";
		}
	}
	new controller_stat();
 ?>