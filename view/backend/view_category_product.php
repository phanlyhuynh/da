<div class="col-md-8 col-xs-offset-2">
	<div style="margin-bottom: 5px;">
		<a href="admin.php?controller=add_edit_category_product&act=add" class="btn btn-primary">Add</a>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">List Category product</div>
		<div class="panel-body">
			<table class="table table-hover table-bordered" style="padding:0px; margin:0px;">
				<tr>
					<th>Tên danh mục</th>
					<th style="width: 100px;">Trang chủ</th>
					<th style="width: 100px;"></th>
				</tr>
			<?php 
				foreach($arr as $rows)
				{
			 ?>
				<tr>
					<td><?php echo $rows["c_name"]; ?></td>
					<td style="text-align: center;">
						<?php if($rows["c_home"] == 1){ ?>
						<span class="glyphicon glyphicon-check"></span>
						<?php } ?>
					</td>
					<td style="text-align: center;">
						<a href="admin.php?controller=add_edit_category_product&act=edit&id=<?php echo $rows["pk_category_product_id"]; ?>">Edit</a>
						&nbsp;&nbsp;
						<a href="admin.php?controller=category_product&act=delete&id=<?php echo $rows["pk_category_product_id"]; ?>">Delete</a>
					</td>
				</tr>
			<?php } ?>
			</table>
		</div>
		<div class="panel-footer">
			<style type="text/css">
				.pagination{padding:0px; margin:0px;}
			</style>
			<ul class="pagination">
			<?php for($i = 1; $i <= $num_page; $i++){ ?>
				<li><a href="admin.php?controller=category_product&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
			<?php } ?>
			</ul>
		</div>
	</div>
</div>