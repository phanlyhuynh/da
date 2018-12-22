<?php 
	class controller_news extends controller{
		public function __construct(){
			parent::__construct();			
			//so ban ghi tren mot trang
			$recorde_perpage = 10;
			//tong so ban ghi
			$total_record = $this->model->num_rows("select * from tbl_news");
			//tinh so trang = tongsobanghi/sobanghitrentrang
			$num_page = ceil($total_record/$recorde_perpage);
			//xac dinh trang hien tai
			$cur_page= isset($_GET["p"])&&$_GET["p"] > 0?$_GET["p"]-1:0;
			//xac dinh tu ban ghi nao den ban ghi nao
			$from = $recorde_perpage*$cur_page;
			//--------
			//lay toan bo ban ghi cua tbl_news
			$arr = $this->model->fetch("select * from tbl_news order by pk_news_id desc limit $from,$recorde_perpage");
			//load view
			include "view/frontend/view_news.php";
		}
	}
	new controller_news();
 ?>