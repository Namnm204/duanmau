<?php
    function insert_taikhoan($email,$user,$pass){
        $sql = "insert into taikhoan(email,user,pass) values('$email','$user','$pass')";
        pdo_execute($sql);
    }
    function check_user($user, $pass){
        $sql = "select * from taikhoan where user='".$user."' AND pass='".$pass."'";
        $tk = pdo_query_one($sql);
        return $tk;
    }
    function checkemail($email){
        $sql = "select * from taikhoan where email='".$email."'";
        $tk = pdo_query_one($sql);
        return $tk;
    }
    function update_taikhoan($id, $user ,$pass, $email, $address, $tel){
        $sql = "update taikhoan set user='".$user."', pass='".$pass."', email='".$email."', address='".$address."', tel='".$tel."' where id=".$id;
        pdo_execute($sql);
    }
    function loadall_taikhoan(){
        $sql = "select * from taikhoan order by id desc";
        $listtaikhoan = pdo_query($sql);
        return $listtaikhoan;
    }
?>