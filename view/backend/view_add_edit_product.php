<div class="col-md-8 col-xs-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading">Add edit product</div>
		<div class="panel-body">
			<form method="post" enctype="multipart/form-data" action="<?php echo $form_action; ?>">
				<!-- row -->
				<div class="row" style="margin-top: 5px;">
					<div class="col-md-2">Tiêu đề</div>
					<div class="col-md-10"><input type="text" name="c_name" value="<?php echo isset($arr["c_name"])?$arr["c_name"]:""; ?>" class="form-control" required></div>
				</div>
				<!-- end row -->
				<!-- row -->
				<div class="row" style="margin-top: 5px;">
					<div class="col-md-2">Danh mục</div>
					<div class="col-md-10">
						<select name="fk_category_product_id">
						<?php 
							$category = $this->model->fetch("select * from tbl_category_product");
							foreach($category as $rows)
							{
						 ?>
<option <?php echo isset($arr["fk_category_product_id"])&&$arr["fk_category_product_id"]==$rows["pk_category_product_id"]?"selected":""; ?> value="<?php echo $rows["pk_category_product_id"]; ?>"><?php echo $rows["c_name"]; ?></option>
						<?php } ?>
						</select>
					</div>
				</div>
				<!-- end row -->
				<!-- row -->
				<div class="row" style="margin-top: 5px;">
					<div class="col-md-2"></div>
					<div class="col-md-10"><input type="checkbox" name="c_hotproduct" <?php echo isset($arr["c_hotproduct"])&&$arr["c_hotproduct"]==1?"checked":""; ?>> Tin nổi bật</div>
				</div>
				<!-- end row -->
				<!-- row -->
				<div class="row" style="margin-top: 5px;">
					<div class="col-md-2">Giới thiệu</div>
					<div class="col-md-10">
						<textarea name="c_description">
							<?php echo isset($arr["c_description"])?$arr["c_description"]:""; ?>
						</textarea>
						<script type="text/javascript">
							CKEDITOR.replace('c_description');
						</script>
					</div>
				</div>
				<!-- end row -->
				<!-- row -->
				<div class="row" style="margin-top: 5px;">
					<div class="col-md-2">Chi tiết</div>
					<div class="col-md-10">
						<textarea name="c_content">
							<?php echo isset($arr["c_content"])?$arr["c_content"]:""; ?>
						</textarea>
						<script type="text/javascript">
							CKEDITOR.replace('c_content');
						</script>
					</div>
				</div>
				<!-- end row -->
				<!-- row -->
				<div class="row" style="margin-top: 5px;">
					<div class="col-md-2">Ảnh</div>
					<div class="col-md-10">
						<input type="file" name="c_img">
					</div>
				</div>
				<!-- end row -->
				<!-- row -->
				<div class="row" style="margin-top: 5px;">
					<div class="col-md-2"></div>
					<div class="col-md-10">
						<input type="submit" value="Process" class="btn btn-primary">
					</div>
				</div>
				<!-- end row -->
			</form>
		</div>
	</div>
</div>