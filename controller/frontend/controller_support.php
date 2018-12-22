<?php 
	class controller_support extends controller{
		public function __construct(){
			parent::__construct();
			//lay cac ban ghi trong tbl_support
			$data["arr"] = $this->model->fetch("select * from tbl_support");
			//load view
			//include "view/frontend/view_support.php";
			//load view
			$this->view("view/frontend/view_support.php",$data);
		}
	}
	new controller_support();
 ?>