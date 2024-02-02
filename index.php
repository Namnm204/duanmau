<?php
    session_start();
    include "model/pdo.php";
    include "model/sanpham.php";
    include "model/danhmuc.php";
    include "model/taikhoan.php";
    include "model/cart.php";
    include "view/header.php";
    include "global.php";

    if(isset($_SESSION['mycart'])) $_SESSION['mycart']=[];

    $spnew = loadall_sanpham_home();
    $dsdm=loadall_danhmuc();
    $dstop10=loadall_sanpham_top10();

    if(isset($_GET['act']) && $_GET['act']!=""){
        $act = $_GET['act'];
        switch ($act) {
            case 'gioithieu':
                include "view/gioithieu.php";
                break;
            case 'lienhe':
                include "view/lienhe.php";
                break;
            case 'sanphamct':
                if(isset($_GET['idsp'])&& ($_GET['idsp']>0)){
                    $id=$_GET['idsp'];
                    $onesp=loadone_sanpham($id);
                    extract($onesp);
                    $sp_cung_loai = load_sanpham_cungloai($id, $iddm);
                    include "view/sanphamct.php";
                }else{
                    include "view/home.php";
                }
                
                break;
            case 'sanpham':
                if(isset($_POST['kyw'])&& ($_POST['kyw']>0)){
                    $kyw = $_POST['kyw'];
                }else{
                    $kyw="";
                }
                if(isset($_GET['iddm'])&& ($_GET['iddm']>0)){
                    $iddm=$_GET['iddm'];
                    
                }else{
                    $iddm=0;
                }
                $dssp = loadall_sanpham($kyw,$iddm);
                $tendm=load_ten_dm($iddm);
                include "view/sanpham.php";
                break;
            
                case 'dangky':
                    if(isset($_POST['dangky'])&& ($_POST['dangky'])){
                        $email = $_POST['email'];
                        $user = $_POST['user'];
                        $pass = $_POST['pass'];
                        insert_taikhoan($email,$user,$pass);
                        $thongbao = "dang ky thanh cong, vui long dang nhap";
                    }
                    include "view/taikhoan/dangky.php";
                    break;
                case 'dangnhap':
                    if(isset($_POST['dangnhap'])&& ($_POST['dangnhap'])){
                        $user = $_POST['user'];
                        $pass = $_POST['pass'];
                        $checkuser=check_user($user, $pass);
                        if(is_array($checkuser)){
                            $_SESSION['user']= $checkuser;
                            // $thongbao = "dang nhap thanh cong";
                            header("Location: index.php");
                        }else{
                            $thongbao = "tai khoan khong ton tai";
                        } 
                    }
                    include "view/taikhoan/dangky.php";
                    break;
                case 'edit_taikhoan':
                    if(isset($_POST['capnhat'])&& ($_POST['capnhat'])){
                        $id = $_POST['id'];
                        $email = $_POST['email'];
                        $address = $_POST['address'];
                        $tel = $_POST['tel'];
                        $user = $_POST['user'];
                        $pass = $_POST['pass'];

                        update_taikhoan($id, $user ,$pass, $email, $address, $tel);
                        $_SESSION['user'] = check_user($user, $pass);
                        header("Location: index.php?act=edit_taikhoan");
                    }
                    include "view/taikhoan/edit_taikhoan.php";
                    break;

                    case 'quenmk':
                        if(isset($_POST['quenmk'])&& ($_POST['quenmk'])){
                            $email = $_POST['email'];
                            $checkemail=checkemail($email);
                            if(is_array($checkemail)){
                                $thongbao = "mat khau cua ban la: ".$checkemail['pass'];
                            }else{
                                $thongbao = "email nay khong ton tai!";
                            }
                        }
                        include "view/taikhoan/quenmk.php";
                        break;
                    case 'thoat':
                        session_unset();
                        header("Location: index.php");
                        break;
                    case 'addtocart':
                        // if(isset($_POST['addtocart'])&& ($_POST['addtocart'])){
                        //     $id=$_POST['id'];
                        //     $name=$_POST['name'];
                        //     $img=$_POST['img'];
                        //     $price=$_POST['price'];
                        //     $soluong=1;
                        //     $ttien= $soluong * $price;
                        //     $spadd=[$id,$name,$price,$soluong,$ttien];
                        //     array_push($_SESSION['mycart'],$spadd);
                        // }
                        include "view/cart/viewcart.php";
                        break;
                    
            
            default:
                include "view/home.php";
                break;

        }

    }else{
        include "view/home.php";
    }
    include "view/footer.php";
?>