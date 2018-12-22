<?php 
	class controller_user extends controller{
		public function __construct(){
			
			parent::__construct();
			//--------
			$act = isset($_GET["act"])?$_GET["act"]:"";
			switch($act){
				case "delete":
					$id = isset($_GET["id"])?$_GET["id"]:0;
					//xoa ban ghi co id truyen vao
					$this->model->execute("delete from tbl_user where pk_user_id=$id");
					header("location:admin.php?controller=user");
				break;
			}
			//--------
			//so ban ghi tren mot trang
			$recorde_perpage = 4;
			//tong so ban ghi
			$total_record = $this->model->num_rows("select * from tbl_user");
			//tinh so trang = tongsobanghi/sobanghitrentrang
			$num_page = ceil($total_record/$recorde_perpage);
			//xac dinh trang hien tai
			$cur_page= isset($_GET["p"])&&$_GET["p"] > 0?$_GET["p"]-1:0;
			//xac dinh tu ban ghi nao den ban ghi nao
			$from = $recorde_perpage*$cur_page;
			//--------
			//lay toan bo ban ghi cua tbl_user
			$arr = $this->model->fetch("select * from tbl_user order by pk_user_id desc limit $from,$recorde_perpage");
			//load view
			include "view/backend/view_user.php";
		}
	}
	new controller_user();
 ?>