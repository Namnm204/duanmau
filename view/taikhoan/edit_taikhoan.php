<main class="catalog  mb ">

    <div class="boxleft">
        <div class="mb">
            <div class="box_title">CẬP NHẬT TÀI KHOẢN</div>
            <div class="box_content form_account">
                <?php
                    if(isset($_SESSION['user'])&&(is_array($_SESSION['user']))){
                        extract($_SESSION['user']);
                    }
                ?>
               <form action="index.php?act=edit_taikhoan" method="post">
                    EMAIL: <input type="email" name="email" value="<?=$email?>">
                    USER: <input type="text" name="user" value="<?=$user?>">
                    PASSWORD: <input type="password" name="pass" value="<?=$pass?>">
                    ADDRESS: <input type="text" name="address" value="<?=$address?>">
                    TEL: <input type="text" name="tel" value="<?=$tel?>">
                    <input type="hidden" name="id" value="<?=$id?>">
                    <input type="submit" name="capnhat" value="Cập Nhật">
                    <input type="reset" value="Nhập Lại">
               </form>
               <h2 style="color: red;">
               <?php
                    if(isset($thongbao)&&($thongbao!="")){
                        echo $thongbao;
                    }
               ?>
               </h2>
            </div>
        </div>
    </div>
    <div class="boxright">
        <?php include "view/boxright.php"; ?>
    </div>

</main>