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
			//load view
			include "view/backend/view_stat.php";
		}
	}
	new controller_stat();
 ?>