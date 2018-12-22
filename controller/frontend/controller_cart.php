<?php
	class controller_cart extends controller{
		public function __construct(){
			parent::__construct();
			//khởi tạo giỏ hàng
			if(!isset($_SESSION['cart'])) $_SESSION['cart'] = array();
			//===========	
			$act = isset($_GET["act"])?$_GET["act"]:"";
			switch($act){
				case "add":
					$id = isset($_GET["id"])?$_GET["id"]:0;
					//them san pham vao gio hang, goi ham cart_add(id san pham)
					$this->cart_add($id);
					echo "<script language='javascript'>location.href='index.php?controller=cart&do=success';</script>";
				break;
				case "delete":
					$id = isset($_GET["id"])?$_GET["id"]:0;
					//xoa san pham khoi gio hang bang cach goi ham cart_delete(id)
					$this->cart_delete($id);
					echo "<script language='javascript'>location.href='index.php?controller=cart';</script>";
				break;
				case "destroy":
					//xoa toan bo sang pham trong gio hang bang cach goi ham cart_destroy
					$this->cart_destroy();
					echo "<script language='javascript'>location.href='index.php?controller=cart';</script>";
				break;
				case "update":
					//duyet qua cac phan tu cua sesson array, update lai so luong san pham
					foreach($_SESSION["cart"] as $value){
						$soluong = $_POST["product_".$value["pk_product_id"]];
						//update lai so luong bang cach goi ham cart_update(id,soluong)
						$this->cart_update($value["pk_product_id"],$soluong);
						echo "<script language='javascript'>location.href='index.php?controller=cart';</script>";
					}
				break;
			}
			//===========
			//load view
			include "view/frontend/view_cart.php";
			//=================
		}

		public function cart_add($pk_product_id){
		    if(isset($_SESSION['cart'][$pk_product_id])){
		        //nếu đã có sp trong giỏ hàng thì số lượng lên 1
		        $_SESSION['cart'][$pk_product_id]['number']++;
		    } else {
		        //lấy thông tin sản phẩm từ CSDL và lưu vào giỏ hàng
		        $product = $this->model->fetch_one("select * from tbl_product where pk_product_id=$pk_product_id");
		        
		        $_SESSION['cart'][$pk_product_id] = array(
		            'pk_product_id' => $pk_product_id,
		            'c_name' => $product['c_name'],
		            'c_img' => $product['c_img'],
		            'number' => 1,
		            'c_price' => $product['c_price']
		        );
		    }
		}
		/**
		 * Cập nhật số lượng sản phẩm
		 * @param int
		 * @param int
		 */
		public function cart_update($pk_product_id, $number){
		    if($number==0){
		        //xóa sp ra khỏi giỏ hàng
		        unset($_SESSION['cart'][$pk_product_id]);
		    } else {
		        $_SESSION['cart'][$pk_product_id]['number'] = $number;
		    }
		}
		/**
		 * Xóa sản phẩm ra khỏi giỏ hàng
		 * @param int
		 */
		public function cart_delete($pk_product_id){
		    unset($_SESSION['cart'][$pk_product_id]);
		}
		/**
		 * Tổng giá trị giỏ hàng
		 */
		public function cart_total(){
		    $total = 0;
		    foreach($_SESSION['cart'] as $product){
		        $total += $product['c_price'] * $product['number'];
		    }
		    return $total;
		}
		/**
		 * Số sản phẩm có trong giỏ hàng
		 */
		public function cart_number(){
		    $number = 0;
		    foreach($_SESSION['cart'] as $product){
		        $number += $product['number'];
		    }
		    return $number;
		}
		/**
		 * Danh sách sản phẩm trong giỏ hàng
		 */
		public function cart_list(){
		    return $_SESSION['cart'];
		}
		/**
		 * Xóa giỏ hàng
		 */
		public function cart_destroy(){
		    $_SESSION['cart'] = array();
		}

	}
	new controller_cart();
?>