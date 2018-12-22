<div class="col-md-12">
	<div style="margin-bottom: 5px;">
		<a href="admin.php?controller=add_edit_product" class="btn btn-primary">Add</a>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">List product</div>
		<div class="panel-body">
			<table class="table table-bordered border-hover" style="padding:0px; margin:0px;">
				<tr>
					<th style="width: 100px;">Ảnh</th>
					<th>Tiêu đề</th>
					<th style="width: 150px;">Thuộc danh mục</th>
					<th style="width: 100px; text-align: center;">Sản phẩm nổi bật</th>
					<th style="width: 100px;"></th>
				</tr>
			<?php 
				foreach($arr as $rows)
				{
			 ?>
				<tr>
					<td style="text-align: center;">
						<?php if(file_exists("public/upload/product/".$rows["c_img"])){ ?>
						<img src="public/upload/product/<?php echo $rows["c_img"]; ?>" style="width:100px;">
						<?php } ?>
					</td>
					<td><?php echo $rows["c_name"]; ?></td>
					<td style="text-align: center;">
						<?php 
							$category = $this->model->fetch_one("select c_name from tbl_category_product where pk_category_product_id=".$rows["fk_category_product_id"]);
							echo $category["c_name"];
						 ?>
					</td>
					<td style="text-align: center;">
						<?php if($rows["c_hotproduct"] == 1){ ?>
						<span class="glyphicon glyphicon-check"></span>
						<?php } ?>
					</td>
					<td style="text-align: center;">
						<a href="admin.php?controller=add_edit_product&act=edit&id=<?php echo $rows["pk_product_id"]; ?>">Edit</a>
						&nbsp;&nbsp;
						<a href="admin.php?controller=product&act=delete&id=<?php echo $rows["pk_product_id"]; ?>">Delete</a>
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
				<li><a href="admin.php?controller=product&p=<?php echo $i; ?>"><?php echo $i; ?></li>
			<?php } ?>
			</ul>
		</div>
	</div>
</div>