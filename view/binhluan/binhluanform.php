<?php
session_start();
include "../../model/pdo.php";
include "../../model/binhluan.php";
$idpro = $_REQUEST['idpro'];
$dsbl = loadall_binhluan($idpro);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/css.css">
    <style>
        .blsp {
            width: 90%;

        }
        .blsp:nth-child(1){
            width: 50%;
        }
        .blsp:nth-child(2){
            width: 20%;
        }
        .blsp:nth-child(3){
            width: 30%;
        }
    </style>
</head>

<body>
    <div class="mb">
        <div class="box_title">BÌNH LUẬN</div>

        <div class="box_content2 product_portfolio">

            <table class="blsp">
                <?php
                foreach ($dsbl as $bl) {
                    extract($bl);
                    echo '<tr><td>' . $noidung . '</td>';
                    echo '<td>' . $iduser . '</td>';
                    echo '<td>' . date('d/m/Y H:i:s', strtotime($ngaybinhluan)) . '</td> </tr>';
                }
                ?>
            </table>

        </div>

            <?php
                if(isset($_SESSION['user'])){
                    extract($_SESSION['user']);
                    
                    echo '
                    <form action="'.$_SERVER['PHP_SELF'].'" method="POST">
                        <input type="hidden" name="idpro" value="'.$idpro.'">

                        <input type="text" name="noidung" placeholder="Nội dung bình luận">
                        <input type="submit" name="guibinhluan" value="Gửi bình luận">
                    </form>';
                }else{
                    echo '<h1>Bạn cần đăng nhập</h1>';
                }
            ?>
                
            
        <?php

        if ((isset($_POST['guibinhluan'])) && ($_POST['guibinhluan'])) {
            $noidung = $_POST['noidung'];
            $idpro = $_POST['idpro'];
            $iduser = $_SESSION['user']['id'];
            $ngaybinhluan = date('d/m/Y H:i:s');

            insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan);
            header("location: " . $_SERVER['HTTP_REFERER']);
        }

        ?>
    </div>
</body>

</html>