<div class="col-md-8 col-xs-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading">Add edit news</div>
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
					<div class="col-md-2"></div>
					<div class="col-md-10"><input type="checkbox" name="c_hotnews" <?php echo isset($arr["c_hotnews"])&&$arr["c_hotnews"]==1?"checked":""; ?>> Tin nổi bật</div>
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