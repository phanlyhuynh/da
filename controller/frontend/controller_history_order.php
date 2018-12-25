<?php
class controller_history_order extends controller
{
    public function __construct(){
        parent::__construct();
        $this->getInformationHistoryOrder();
    }
    private function getInformationHistoryOrder ()
    {
        if (isset($_GET['cid']) && $_GET['cid'] != '' ) {
            $sql = "select * from tbl_order where customer_id =" . $_GET['cid'];
            $order_ids = $this->model->fetch($sql);
            $array_order_ids = [];
            $array_orders = [];
            if ($order_ids) {
                foreach ($order_ids as $order_id) {
                    $array_order_ids[] = $order_id['order_id'];
					$array_orders[$order_id['order_id']] = $order_id;
                 }
                if ($array_order_ids) {
                    $value = implode(', ', $array_order_ids );
                    $sql = "select * from tbl_order_detail where order_id in (" . $value .")";

                    $order_details = $this->model->fetch($sql);
                    $o_id = null;
                    $product_id = null;
                    $listOrders = [];
                    foreach ($order_details as $order_detail) {
                    	if ($order_detail['order_id'] != $o_id) {
							$listOrders[$order_detail['order_id']] = [$order_detail['fk_product_id']];

						}
                    	else {
                    		array_push($listOrders[$order_detail['order_id']], $order_detail['fk_product_id']);
						}
						$o_id = $order_detail['order_id'];
					}
                    $list = [];
                    foreach ($listOrders as $key => $value) {
                    	if (array_key_exists($key, $array_orders)) {
							$list[] = [
								'order_id' => $array_orders[$key]['order_id'],
								'date' => $array_orders[$key]['date'],
								'status' => $array_orders[$key]['status'],
								'address_c' => $array_orders[$key]['address_c'],
								'mobile_c' => $array_orders[$key]['date'],
								'name_c' => $array_orders[$key]['name_c'],
								'product' => $this->getProductByIds($value, $array_orders[$key]['order_id']),
							];
						}
					}

					echo '<pre>';
					print_r($list);
					/*print_r($array_orders);*/
					echo '</pre>';

                  /*if ($order_details) {
                        $detail_orders= [];
                        foreach ($order_details as $order_detail) {
                            $getInforProduct = $this->model->fetch("select * from tbl_product where pk_product_id =" . $order_detail['fk_product_id']);
                            $detail_orders[] = [
                                'order_id' => $order_detail['order_id'],
                                'product' => $getInforProduct
                            ];
                        }
                  }*/
                }
                //include "view/frontend/view_history_order.php";
            }

        }
    }

    public function getProductByIds ($ids, $orderId) {
		$value = implode(', ', $ids );
		$sql = "select pk_product_id, c_name, c_img from tbl_product where pk_product_id in (" . $value .")";
		$products = $this->model->fetch($sql);
		$listProducts = [];
		foreach ($products as $product) {
			$lists = $this->model->fetch_one("select c_number, c_price from tbl_order_detail where fk_product_id=" . $product['pk_product_id'] . ' and order_id=' . $orderId);
			$listProducts[] = [
				'product_id' => $product['pk_product_id'],
				'product_name' => $product['c_name'],
				'product_img' => $product['c_img'],
				'product_price' => $lists['c_price'],
				'product_number' => $lists['c_number'],
			];

		}
		/*foreach ($price_numbers[$orderId] as $price_number) {
			echo '<pre>';
			print_r($price_number);
			echo '</pre>';*/
			/*foreach ($price_number as $item) {
				foreach ($products as $product) {
					if ($item['product_id'] == $product['pk_product_id']) {
						/*if ($listProducts) {
							foreach ($listProducts as $listProduct) {
								if ($listProduct['product_id'] != $product['pk_product_id'])  {
									$listProducts[] = [
										'product_id' => $product['pk_product_id'],
										'product_name' => $product['c_name'],
										'product_img' => $product['c_img'],
										'product_price' => $item['c_price'],
										'product_number' => $item['c_number'],
									];
								}
							}
						} else {
							$listProducts[] = [
								'product_id' => $product['pk_product_id'],
								'product_name' => $product['c_name'],
								'product_img' => $product['c_img'],
								'product_price' => $item['c_price'],
								'product_number' => $item['c_number'],
							];
						}
					}
				}
			}*/

		//}


		return $listProducts;
	}

}
new controller_history_order();
?>