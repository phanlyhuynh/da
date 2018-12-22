<?php 
	class controller_hotnews extends controller{
		public function __construct(){
			parent::__construct();
			//lay cac ban ghi co c_hotnews=1 trong tbl_news
			$arr = $this->model->fetch("select * from tbl_news where c_hotnews = 1");
			//load view
			include "view/frontend/view_hotnews.php";
		}
	}
	new controller_hotnews();
 ?>