<div style="display: flex; flex-wrap: nowrap; justify-content: center;">
	<div style="width: 200px; height: 200px; border: 1px solid blue; text-align: center; margin: 10px;">
		<p style="line-height: 184px; color:blue;"><i class="fa fa-user" style="margin-right: 3px;"></i><?php echo $usercount; ?> Người dùng</p>
	</div>

	<div style="width: 200px; height: 200px; border: 1px solid blue; text-align: center; margin: 10px">
		<div style="margin-top: 60px;">
			<span style="color:blue;"><i class="fa fa-cloud" style="margin-right: 3px;"></i>Tổng <?php echo $ordercount; ?> Hóa đơn</span>
			<br>
			<span style="color:blue;"><i class="fa fa-plus" style="margin-right: 3px;"></i><?php echo $chuagiaohang; ?> Chưa giao hàng</span>
			<br>
			<span style="color:blue;"><i class="fa fa-plus" style="margin-right: 3px;"></i><?php echo $dagiaohang; ?> Đã giao hàng</span>
		</div>
	</div>

	<div style="width: 200px; height: 200px; border: 1px solid blue; text-align: center; margin: 10px">
		<div style="margin-top: 60px;">
			<span style="color:blue;"><i class="fa fa-print" style="margin-right: 3px;"></i>Tổng <?php echo $productcount; ?> Sản phẩm</span>
			<br>
			<span style="color:blue;"><i class="fa fa-plus" style="margin-right: 3px;"></i>Sản phẩm được đặt mua nhiều nhất: <?php echo $nameproduct;?></span>
			<br>
			<span style="color:blue;"><i class="fa" style="margin-right: 3px;"></i>
				<?php echo $countproduct;?> Sản phẩm
			</span>
		</div>
	</div>
</div>