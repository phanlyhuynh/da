<div class="template-customer">
          <h1>Đăng ký tài khoản</h1>
          <?php 
            if(isset($_GET["act"])&&$_GET["act"]=="added")
            {
           ?>
          <p>Đã đăng ký tài khoản thành công</p>
          <?php } ?>
          <div class="row" style="margin-top:50px;">
            <div class="col-md-6">
              <div class="wrapper-form">
                <form method='post' action="">
                  <p class="title"><span>Đăng ký tài khoản</span></p>
                  <div class="form-group">
                    <label>Họ và tên:</label>
                    <input type="text" name="hovaten" class="input-control">
                  </div>
                  <div class="form-group">
                    <label>Email:<b id="req">*</b></label>
                    <input type="text" name="email" class="input-control" required>
                  </div>
                  <div class="form-group">
                    <label>Địa chỉ:</label>
                    <input type="text" name="diachi" class="input-control">
                  </div>
                  <div class="form-group">
                    <label>Điện thoại:</label>
                    <input type="text" name="dienthoai" class="input-control">
                  </div>
                  <div class="form-group">
                    <label>Mật khẩu:<b id="req">*</b></label>
                    <input type="password" name="password" class="input-control" required="">
                  </div>
                  <div class="form-group">
                    <input type="submit" class="button" value="Đăng ký">
                  </div>
                </form>
              </div>
            </div>
            <div class="col-md-6">
              <div class="wrapper-form">
                <p class="title"><span>Đăng nhập</span></p>
                <p>Đăng nhập tài khoản nếu bạn đã có tài khoản. Đăng nhập tài khoản để theo dõi đơn đặt hàng, vận chuyển và đặt hàng được thuận lợi.</p>
                <a href="index.php?controller=login" class="button">Đăng nhập</a> </div>
            </div>
          </div>
        </div>