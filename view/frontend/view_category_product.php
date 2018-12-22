<!-- category product -->
    <div class="slideshow">
      <div class="row">
        
        <div class="col-md-9 col-xs-12 col-sm-12">
          <div class="owl-slider">
            <div class="item"> 
              <!-- ============================ -->
              <div id="myCarousel" class="carousel slide" data-ride="carousel"> 
                <!-- Indicators -->

                <ol class="carousel-indicators">
                  <li data-target="#myCarouse0" data-slide-to="0"></li>
                  <li data-target="#myCarouse1" data-slide-to="1"></li>
                  <li data-target="#myCarouse2" data-slide-to="2"></li>
                  <li data-target="#myCarouse3" data-slide-to="3"></li>
                </ol>
                
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                  <div class="item active"> <img src="public/frontend/images/la.jpg" alt="slide 1"> </div>
                  <div class="item "> <img src="public/frontend/images/slideshow1221b.jpg" alt="Slide 2"> </div>
                  <div class="item "> <img src="public/frontend/images/chicago.jpg" alt="Slide 3"> </div>
                  <div class="item "> <img src="public/frontend/images/ny.jpg" alt="Slide 4"> </div>
                </div>
                
                <!-- Left and right controls --> 
              </div>
              <!-- ============================ --> 
            </div>
          </div>
        </div>
        <div class="col-md-3 col-xs-12 hidden-xs hidden-sm">
          <aside class="aside-category">
            <h3><i class="fa fa-bars"></i>&nbsp;&nbsp; Danh mục sản phẩm</h3>
            <ul class="list-unstyled">
            <?php 
              foreach($arr as $rows)
              {
             ?>
              <li><a href="index.php?controller=product&id=<?php echo $rows["pk_category_product_id"]; ?>"><?php echo $rows["c_name"]; ?></a></li>
              <?php } ?>
            </ul>
          </aside>
        </div>
      </div>
    </div>
    <!-- end category product -->