<div class="special-collection">
          <div class="tabs-container">
            <div class="clearfix">
              <h2>Sản phẩm nổi bật</h2>
            </div>
          </div>
          <div class="tabs-content row">
            <div id="content-tabb1" class="content-tab content-tab-proindex" style="display:none">
              <div class="clearfix"> 
                <?php 
                  //hien thi cac san pham noi bat (c_hoproduct=1)
                  $arr_hotproduct = $this->model->fetch("select * from tbl_product where c_hotproduct=1 order by pk_product_id desc limit 0,8");
                 ?>
                <?php foreach($arr_hotproduct as $rows_hotproduct){ ?>
                <!-- box product -->
                <div class="col-xs-6 col-md-3 col-sm-6 ">
                  <div class="product-grid" id="product-1168979">
                    <div class="image"> <a href="index.php?controller=product_detail&id=<?php echo $rows_hotproduct["pk_product_id"]; ?>"><img src="public/upload/product/<?php echo $rows_hotproduct["c_img"]; ?>" title="<?php echo $rows_hotproduct["c_name"]; ?>" alt="<?php echo $rows_hotproduct["c_name"]; ?>" class="img-responsive"></a> </div>
                    <div class="info">
                      <h3 class="name"><a href="index.php?controller=product_detail&id=<?php echo $rows_hotproduct["pk_product_id"]; ?>"><?php echo $rows_hotproduct["c_name"]; ?></a></h3>
                      <p class="price-box"> <span class="special-price"> <span class="price product-price"> <?php echo number_format($rows_hotproduct["c_price"]); ?> </span> </span> </p>
                      <div class="action-btn">
                        <form action="cart/add" method="post" enctype="multipart/form-data" id="product-actions-1168979">
                          <a href="index.php?controller=cart&act=add&id=<?php echo $rows_hotproduct["pk_product_id"]; ?>" class="button">Chọn sản phẩm</a>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end box product --> 
                <?php } ?>
                 
                
              </div>
            </div>
          </div>
        </div>

<?php 
  //hien thi cac danh muc duoc cau hinh la hien thi o trang chu (c_home = 1)
$arr = $this->model->fetch("select * from tbl_category_product where c_home=1 order by pk_category_product_id desc limit 0,4");
 ?>
 <?php 
    foreach($arr as $rows)
    {
      //kiem tra xem co san pham nao trong danh muc do khong, neu khong co san pham nao thi khong cho xuat hien danh muc do
      //neu $check > 0 co nghia la co san pham thuoc danh muc do
      $check = $this->model->num_rows("select pk_product_id from tbl_product where fk_category_product_id=".$rows["pk_category_product_id"]);
  ?>
  <?php if($check > 0){ ?>

        <div class="wrapper-tab-collections" style="margin-top:0px;">
          <div class="tabs-container">
            <ul class="list-unstyled">
              <li><a href="#content-taba1" class="head-tabs head-tab1" data-src=".head-tab1">
                <h2><?php echo $rows["c_name"]; ?></h2>
                </a></li>
            </ul>
          </div>
          <div class="tabs-content row">
            <div id="content-taba4" class="content-tab content-tab-proindex"> 
            <?php
              //hien thi cac san pham thuoc danh muc nay
              $arr_product = $this->model->fetch("select * from tbl_product where fk_category_product_id=".$rows["pk_category_product_id"]." order by pk_product_id desc limit 0,4");
             ?>
             <?php foreach($arr_product as $rows_product){ ?>
              <!-- box product -->
                <div class="col-xs-6 col-md-3 col-sm-6 ">
                  <div class="product-grid" id="product-1168979">
                    <div class="image"> <a href="index.php?controller=product_detail&id=<?php echo $rows_product["pk_product_id"]; ?>"><img src="public/upload/product/<?php echo $rows_product["c_img"]; ?>" title="<?php echo $rows_product["c_name"]; ?>" alt="<?php echo $rows_product["c_name"]; ?>" class="img-responsive"></a> </div>
                    <div class="info">
                      <h3 class="name"><a href="index.php?controller=product_detail&id=<?php echo $rows_product["pk_product_id"]; ?>"><?php echo $rows_product["c_name"]; ?></a></h3>
                      <p class="price-box"> <span class="special-price"> <span class="price product-price"> <?php echo number_format($rows_product["c_price"]); ?> </span> </span> </p>
                      <div class="action-btn">
                        <form action="cart/add" method="post" enctype="multipart/form-data" id="product-actions-1168979">
                          <a href="index.php?controller=cart&act=add&id=<?php echo $rows_product["pk_product_id"]; ?>" class="button">Chọn sản phẩm</a>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end box product --> 
                <?php }//end foreach ?>
              
            </div>
          </div>
        </div>
    <?php }//end if ?>
<?php }//end foreach ?>