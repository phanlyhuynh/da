<div class="col-md-8 col-xs-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading">Add edit category product</div>
		<div class="panel-body">
			<form method="post" action="<?php echo $form_action; ?>">
				<!-- row -->
				<div class="row" style="margin-top:5px;">
					<div class="col-md-2">Tên danh mục</div>
					<div class="col-md-10"><input value="<?php echo isset($arr["c_name"])?$arr["c_name"]:""; ?>" type="text" name="c_name" required class="form-control"></div>
				</div>
				<!-- end row -->
				<!-- row -->
				<div class="row" style="margin-top:5px;">
					<div class="col-md-2"></div>
					<div class="col-md-10">
						<input type="checkbox" <?php echo isset($arr["c_home"])&&$arr["c_home"]==1?"checked":""; ?> name="c_home"> Hiển thị trang chủ
					</div>
				</div>
				<!-- end row -->
				<!-- row -->
				<div class="row" style="margin-top:5px;">
					<div class="col-md-2"></div>
					<div class="col-md-10"><input type="submit" class="btn btn-primary" value="Process"> <input type="reset" class="btn btn-danger" value="Reset"></div>
				</div>
				<!-- end row -->
			</form>
		</div>
	</div>
</div>