<?php 
	class controller_news extends controller{
		public function __construct(){
			parent::__construct();
			//--------
			$act = isset($_GET["act"])?$_GET["act"]:"";
			switch($act){
				case "delete":
					$id = isset($_GET["id"])?$_GET["id"]:0;
					//---------
					//xoa anh cu
					$arr_old_img = $this->model->fetch_one("select * from tbl_news where pk_news_id=$id");
					$old_img = $arr_old_img["c_img"]!=""?$arr_old_img["c_img"]:"";
					if(file_exists("public/upload/news/".$old_img)&&$old_img!= "")
						unlink($old_img);
					//---------
					//xoa ban ghi co id truyen vao
					$this->model->execute("delete from tbl_news where pk_news_id=$id");
					header("location:admin.php?controller=news");
				break;
			}
			//--------
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
			include "view/backend/view_news.php";
		}
	}
	new controller_news();
 ?>