<div class="mb">
         <div class="box_title">TÀI KHOẢN</div>
         <div class="box_content form_account">
            <?php
               if(isset($_SESSION['user'])){
                  extract($_SESSION['user']);
            ?>
               <h4>Xin Chào</h4><br>
               <?=$user?>
               <li class="form_li"><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
               <li class="form_li"><a href="index.php?act=viewcard">Đơn hàng của tôi</a></li>
               <li class="form_li"><a href="index.php?act=edit_taikhoan">Cập Nhật Tài Khoản</a></li>
               <?php if($role ==1){?>
               <li class="form_li"><a href="admin/index.php">Đăng nhập Admin</a></li>
               <?php }?>
               <li class="form_li"><a href="index.php?act=thoat">Thoát</a></li>
            <?php
               }else{
            ?>
            <form action="index.php?act=dangnhap" method="POST">
            <h4>Tên đăng nhập</h4><br>
            <input type="text" name="user" id="">
            <h4>Mật khẩu</h4><br>
            <input type="password" name="pass" id=""><br>
            <input type="checkbox" name="" id="">Ghi nhớ tài khoản?
            <br><input type="submit" name="dangnhap" value="Đăng nhập">
            </form>
            <li class="form_li"><a href="#">Quên mật khẩu</a></li>
            <li class="form_li"><a href="index.php?act=dangky">Đăng kí thành viên</a></li>
            <?php } ?>
         </div>
      </div>
      <div class="mb">
         <div class="box_title">DANH MỤC</div>
         <div class="box_content2 product_portfolio">
         <?php
         foreach ($dsdm as $dm) {
            extract($dm);
            $linkdm="index.php?act=sanpham&iddm=".$id;
            echo '
               <ul><li><a href="'.$linkdm.'">'.$name.'</a></li></ul>
            ';
            
         }
         ?>
            
               
            
         </div>
         <div class="box_search">
            <form action="index.php?act=sanpham" method="POST">
               <input type="text" name="kyw" id="" placeholder="Từ khóa tìm kiếm">
               <input type="submit" name="timkiem" value="tim kiem">
            </form>
         </div>
      </div>
      <!-- DANH MỤC SẢN PHẨM BÁN CHẠY -->
      <div class="mb">
         <div class="box_title">SẢN PHẨM BÁN CHẠY</div>
         <div class="box_content">
            <?php
               foreach ($dstop10 as $sp) {
                  extract($sp);
                  $linksp="index.php?act=sanphamct&idsp=".$id;
                  $img=$img_part.$img;
                  echo '
                     <div class="selling_products" style="width:100%;">
                        <a href="'.$linksp.'"><img src="'.$img.'" alt="anh"></a>
                        <a href="'.$linksp.'">'.$name.'</a>
                     </div>
                  ';

               }
            ?>
         </div>
      </div>