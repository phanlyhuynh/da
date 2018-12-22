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
            $sql = "select order_id from tbl_order where customer_id =" . $_GET['cid'];
            $order_ids = $this->model->fetch($sql);
            $array_order_ids = [];
            if ($order_ids) {
                foreach ($order_ids as $order_id) {
                    $array_order_ids[] = $order_id['order_id'];
                }
                if ($array_order_ids) {
                    $value = implode(', ', $array_order_ids );
                    $sql = "select * from tbl_order_detail where order_id in (" . $value .")";
                    $order_details = $this->model->fetch($sql);
                    if ($order_details) {
                        $detail_orders= [];
                        foreach ($order_details as $order_detail) {
                            $getInforProduct = $this->model->fetch("select * from tbl_product where pk_product_id =" . $order_detail['fk_product_id']);
                            $detail_orders[] = [
                                'order_id' => $order_detail['order_id'],
                                'product' => $getInforProduct
                            ];
                        }
                    }
                }
                include "view/frontend/view_history_order.php";
            }

        }
    }

}
new controller_history_order();
?>