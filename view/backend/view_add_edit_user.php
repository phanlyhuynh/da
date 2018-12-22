<div class="col-md-8 col-md-offset-2">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">Add edit user</div>
				<div class="panel-body">
				<form method="post" action="<?php echo $form_action; ?>">
					<!-- row -->
					<div class="row" style="margin-top:5px;">
						<div class="col-md-2">Fullname</div
						>
						<div class="col-md-9"><input type="text" name="c_fullname" value="<?php echo isset($arr["c_fullname"])?$arr["c_fullname"]:""; ?>" required class="form-control"></div>
					</div>
					<!-- end row -->
					<!-- row -->
					<div class="row" style="margin-top:5px;">
						<div class="col-md-2">Username</div
						>
<div class="col-md-9"><input type="text" <?php echo isset($arr["c_username"])?"disabled":""; ?> name="c_username" value="<?php echo isset($arr["c_username"])?$arr["c_username"]:""; ?>" <?php echo isset($arr["c_username"])?"":"required"; ?> class="form-control"></div>
					</div>
					<!-- end row -->
					<!-- row -->
					<div class="row" style="margin-top:5px;">
						<div class="col-md-2">Password</div
						>
<div class="col-md-9"><input type="password" name="c_password" <?php echo isset($arr["c_username"])?"":"required"; ?> <?php echo isset($arr["c_username"])?"placeholder='Nếu muốn đổi password thì nhập password mới'":""; ?> class="form-control"></div>
					</div>
					<!-- end row -->
					<!-- row -->
					<div class="row" style="margin-top:5px;">
						<div class="col-md-2"></div
						>
						<div class="col-md-9">
							<input type="submit" value="Process" class="btn btn-primary">
						</div>
					</div>
					<!-- end row -->
				</form>
				</div>
			</div>
		</div>
	</div>
</div>