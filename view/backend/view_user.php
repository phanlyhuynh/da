<div class="col-md-8 col-md-offset-2">
	<div style="margin-bottom: 5px">
		<a class="btn btn-primary" href="admin.php?controller=add_edit_user&act=add">Add</a>		
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">List User</div>
				<div class="panel-body">
					<table class="table table-hover table-bordered" style="padding: 0px; margin:0px;">
						<tr>
							<th>Họ tên</th>
							<th>Username</th>
							<th style="width: 100px;"></th>
						</tr>
						<?php 
							foreach($arr as $rows)
							{
						 ?>
						<tr>
							<td><?php echo $rows["c_fullname"]; ?></td>
							<td><?php echo $rows["c_username"]; ?></td>
							<td style="text-align: center;">
								<a href="admin.php?controller=add_edit_user&act=edit&id=<?php echo $rows["pk_user_id"]; ?>">Edit</a>&nbsp;&nbsp;
								<a href="admin.php?controller=user&act=delete&id=<?php echo $rows["pk_user_id"]; ?>">Delete</a>
							</td>
						</tr>
						<?php } ?>
					</table>
				</div>
				<style type="text/css">
					.pagination{padding:0px; margin:0px;}
				</style>
				<div class="panel-footer">
					<ul class="pagination">
					<?php 
						for($i = 1; $i<= $num_page; $i++)
						{
					 ?>
						<li><a href="admin.php?controller=user&p=<?php echo $i; ?>"><?php echo $i; ?>
						</a>
						</li>
					<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>