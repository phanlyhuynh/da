<h1>Tin tức</h1>
        <div class="wrapper-blog"> 
          <!-- list news -->
          <div class="row">
          <?php 
            foreach($arr as $rows)
            {
           ?>
            <div class="col-md-6 article" style="height: 370px; overflow: hidden;"> <a href="index.php?controller=news_detail&id=<?php echo $rows["pk_news_id"]; ?>" class="image"> <img src="public/upload/news/<?php echo $rows["c_img"]; ?>" alt="<?php echo $rows["c_name"]; ?>" title="<?php echo $rows["c_name"]; ?>" class="img-responsive"> </a>
              <h3><a href="index.php?controller=news_detail&id=<?php echo $rows["pk_news_id"]; ?>"><?php echo $rows["c_name"]; ?></a></h3>
              <p class="desc"><?php echo $rows["c_description"]; ?></p>
            </div>
            <?php } ?>
            



          </div>
          <!-- end list news --> 
          
          <ul class="pagination pull-right" style="margin-top: 0px !important">
            <li><a href="#">Trang</a></li>
            <?php 
              for($i=1;$i<=$num_page;$i++)
              {
             ?>
            <li><a href="index.php?controller=news&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php } ?>
          </ul>
        </div>