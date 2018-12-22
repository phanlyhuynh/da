<?php 
	class controller_checkout extends controller{
		public function __construct(){
			parent::__construct();
			//kiem tra, neu user chua dang nhap thi yeu cau dang nhap moi duoc mua hang
//            print_r($_POST["tennguoinhan"]);
//            die();
			if(isset($_SESSION["email"]) == false)
				echo("<script>location.href = 'index.php?controller=login';</script>");
			else{
				//duyet cac san pham trong gia hang de lay muc gia
				$gia = 0;
                $tennguoinhan = $_POST["tennguoinhan"];
                $diachinhan =  $_POST["diachinhan"];
                $sodienthoai = $_POST["sodienthoai"];

                foreach($_SESSION["cart"] as $rows){
					$gia = $gia + ($rows["c_price"]*$rows["number"]);
				}
				//insert thong tin vao bang tbl_order, sau do lay id vua insert
				$customer_id = $_SESSION["customer_id"];
				$order_id = $this->model->execute("insert into tbl_order(customer_id,ngaymua,gia) values($customer_id,now(),$gia)");


				//insert thong tin vao bao tbl_order_detail
				//duyet cac san pham, sau do insert vao bao tbl_order_detail

				foreach($_SESSION["cart"] as $product){
					$fk_product_id = $product["pk_product_id"];
					$c_number = $product["number"];
					$this->model->execute("insert into tbl_order_detail(order_id,fk_product_id,c_number) values($order_id,$fk_product_id,$c_number)");
				}
				//xoa gio hang
				$_SESSION['cart'] = array();
				
				echo("<script>location.href = 'index.php?controller=cart&alert=success';</script>");
			}				
		}		
	}
	new controller_checkout();
 ?>