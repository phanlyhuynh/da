<div class="col-md-10 col-xs-offset-1">	
	<div class="panel panel-primary">
		<div class="panel-heading">User</div>
		<div class="panel-body">
			<table class="table table-bordered table-hover">
				<tr style="background-color: black; color:white">
					<th>Tên khách hàng</th>
					<th>Ngày mua</th>
					<th>Đơn giá</th>
					<th style="width: 150px;">Trạng thái</th>
					<th style="width: 200px">Quản lý</th>
				</tr>
				<?php 
					foreach($arr as $rows)
					{
				 ?>
				<tr>
					<td><?php echo $rows["hovaten"]; ?></td>
					<td style="text-align: center;">
					<?php 
						$date = date_create($rows["ngaymua"]);
						echo date_format($date,"d/m/Y"); 
					?></td>
					<td style="text-align: center;"><?php echo $rows["gia"]; ?></td>
					<td style="text-align: center;">
						<?php echo $rows["trangthai"]==1?"Đã giao hàng":"<span style='color:red;'>Chưa giao hàng</span>" ?>
					</td>
					<td style="text-align: center;">
					<a href="admin.php?controller=order_detail&order_id=<?php echo $rows["order_id"]; ?>">Chi tiết</a>
					&nbsp;&nbsp;
						<a onclick="return window.confirm('Are you sure?');" href="admin.php?controller=order&act=delete&id=<?php echo $rows["order_id"]; ?>">Delete</a>
						
					</td>
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
				<li <?php echo isset($_GET["p"])&&$_GET["p"]==$i ? "class='active'":""; ?> ><a href="admin.php?controller=order&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>