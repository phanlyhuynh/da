<div class="template-cart">
<?php if(isset($_GET["do"])&&$_GET["do"]=="success"){ ?>
<div class="alert alert-danger" style="margin-top: 10px;">Sản phẩm đã được thêm vào giỏ hàng</div>
<?php } ?>
          <form action="index.php?controller=cart&act=update" method="post">
            <div class="table-responsive">
              <table class="table table-cart">
                <thead>
                  <tr>
                    <th class="image">Ảnh sản phẩm</th>
                    <th class="name">Tên sản phẩm</th>
                    <th class="price">Giá bán lẻ</th>
                    <th class="quantity">Số lượng</th>
                    <th class="price">Thành tiền</th>
                    <th>Xóa</th>
                  </tr>
                </thead>
                <tbody>
                <script type="text/javascript">
                  function ajax_capnhat(product_id,soluong){
                    //alert(product_id);
                    //goi ham ajax de truyen tham so, update lai so luong trong csdl
                  }
                </script>
                <?php 
                  foreach($_SESSION["cart"] as $product)
                  {
                 ?>
                  <tr>
                    <td><img src="public/upload/product/<?php echo $product["c_img"]; ?>" class="img-responsive" /></td>
                    <td><a href="index.php?controller=product_detail&id=<?php echo $product["pk_product_id"]; ?>"><?php echo $product["c_name"]; ?></a></td>
                    <td> <?php echo number_format($product["c_price"]); ?>₫ </td>
                    <td><input type="number" id="qty" min="1" class="input-control" value="<?php echo $product["number"]; ?>" name="product_<?php echo $product["pk_product_id"]; ?>" required="Không thể để trống" onchange="ajax_capnhat(<?php echo $product["pk_product_id"]; ?>,this.value);"></td>
                    <td><p><b><?php echo number_format($product["number"]*$product["c_price"]); ?>₫</b></p></td>
                    <td><a href="index.php?controller=cart&act=delete&id=<?php echo $product["pk_product_id"]; ?>" data-id="2479395"><i class="fa fa-trash"></i></a></td>
                  </tr>
                <?php } ?>  
                </tbody>
                <tfoot>
                <?php if($this->cart_number() > 0){ ?>
                  <tr>
                    <td colspan="6"><a href="index.php?controller=cart&act=destroy" class="button pull-left">Xóa toàn bộ</a> <a href="index.php" class="button pull-right black">Tiếp tục mua hàng</a>
                      <input type="submit" class="button pull-right" value="Cập nhật"></td>
                  </tr>
                  <?php } ?>
                </tfoot>
              </table>
            </div>
          </form>
          <?php if($this->cart_number() > 0){ ?>
          <div class="total-cart"> Tổng tiền thanh toán: 
            <?php echo number_format($this->cart_total()) ?>₫ <br>
              <form action="index.php?controller=checkout" method="post">
                  <input type="hidden" name="token" value="{{ form_token() }}" />
                  <input name="tennguoinhan" placeholder="Ten nguoi nhan"/>
                  <input name="sodienthoai" placeholder="sodienthoai" />
                  <input name="diachinhan" placeholder="diachinhan" />
                  <button type="submit">Thanh toan</button>
              </form>
<!--            <a href="index.php?controller=checkout" class="button black">Thanh toán</a> </div>-->
            <?php } ?>
        </div>