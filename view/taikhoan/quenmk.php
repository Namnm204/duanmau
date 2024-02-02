<main class="catalog  mb ">

    <div class="boxleft">
        <div class="mb">
            <div class="box_title">ĐĂNG KÝ THÀNH VIÊN</div>
            <div class="box_content form_account">
               <form action="index.php?act=quenmk" method="post">
                    EMAIL: <input type="email" name="email">    
                    <input type="submit" name="quenmk" value="Gửi ">
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