<!DOCTYPE html>
<html>
<head>
	<title>Admin page</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="public/backend/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="public/backend/ckeditor/ckeditor.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="admin.php?controller=stat" class="active">Home</a></li>
            <li class="active"><a href="admin.php?controller=category_product">Danh mục sản phẩm</a></li>
            <li class="active"><a href="admin.php?controller=product">Danh sách sản phẩm</a></li>
            <li class="active"><a href="admin.php?controller=order">Danh sách đơn hàng</a></li>
            <li class="active"><a href="admin.php?controller=news">Tin tức</a></li>
            <li class="active"><a href="admin.php?controller=user">User</a></li>
            <li class="active"><a href="admin.php?controller=logout">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container" style="margin-top: 70px;">
    	<?php 
    		//load controller
    		if(file_exists($controller))
    			include $controller;
    	 ?>
    </div>
</body>
</html>