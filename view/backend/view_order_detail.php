<div class="col-md-10 col-xs-offset-1">
	<div style="margin-bottom: 5px;">
	<?php 
		//kiem tra, neu don hang chua giao thi hien thi button giao hang
		$check = $this->model->fetch_one("select customer_id,trangthai from tbl_order where order_id=$order_id");
		if($check["trangthai"] == 0)
		{
	 ?>
		<a href="admin.php?controller=order_detail&act=sent&order_id=<?php echo $order_id; ?>" class="btn btn-primary">Giao hàng</a>&nbsp;
		<?php } ?>
		<a href="admin.php?controller=order" class="btn btn-danger">Quay lại</a>&nbsp;
	</div>
	<?php 
		$customer = $this->model->fetch_one("select * from tbl_customer where customer_id=".$check["customer_id"]);
	 ?>
	<div style="margin:bottom:5px;">Họ tên: <?php echo $customer["hovaten"]; ?></div>
	<div style="margin:bottom:5px;">Địa chỉ: <?php echo $customer["diachi"]; ?></div>
	<div style="margin:bottom:5px;">Điện thoại: <?php echo $customer["dienthoai"]; ?></div>
	
	<div class="panel panel-primary">
		<div class="panel-heading">Chi tiết hoá đơn</div>
		<div class="panel-body">
			<table class="table table-bordered table-hover">
				<tr style="background-color: black; color:white">
					<th style="width: 100px;">Ảnh</th>
					<th>Tên sản phẩm</th>
					<th style="width: 100px;">Giá</th>
					<th style="width: 100px;">Số lượng</th>
				</tr>
				<?php 
					foreach($arr as $rows)
					{
						//lay thong tin san pham
						$product = $this->model->fetch_one("select * from tbl_product where pk_product_id=".$rows["fk_product_id"]);
				 ?>				 
				<tr>
					<td style="text-align: center;"><img src="public/upload/product/<?php echo $product["c_img"]; ?>" style="width:100px;"></td>
					<td><?php echo $product["c_name"]; ?></td>
					<td style="text-align: center;"><?php echo number_format($product["c_price"]); ?>đ</td>
					<td style="text-align: center;"><?php echo $rows["c_number"] ?></td>
				</tr>
				<?php } ?>
			</table>
			<style type="text/css">
				.pagination{padding: 0px; margin:0px;}
			</style>
			<ul class="pagination pull-right">
				<li><a href="#">Trang</a></li>
				<?php 
					for($i = 1; $i<=$num_page; $i++)
					{
				 ?>
				<li <?php echo isset($_GET["p"])&&$_GET["p"]==$i ? "class='active'":""; ?> ><a href="admin.php?controller=user&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>