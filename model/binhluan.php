<?php

function insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan){
    $sql = "insert into binhluan(noidung, iduser, idpro, ngaybinhluan) values('$noidung', '$iduser', '$idpro', '$ngaybinhluan')";
    pdo_execute($sql);
}
function delete_binhluan($id){
    $sql = "delete from binhluan where id=". $id;
    pdo_query($sql);
}
function loadall_binhluan($idpro){
    $sql = "select * from binhluan where 1";
    if ($idpro>0) $sql.= " AND idpro='".$idpro."'";
        $sql.= " order by id desc";
    $listbl = pdo_query($sql);
    return $listbl;    
}
function loadall_thongke(){
    $sql = "select danhmuc.id as madm, danhmuc.name as tendm, count(sanpham.id) as countsp, min(sanpham.price) as minprice, max(sanpham.price) as maxprice, avg(sanpham.price) as avgprice";
    $sql.= " from sanpham left join danhmuc on danhmuc.id = sanpham.iddm";
    $sql.= " group by danhmuc.id order by danhmuc.id desc";
    $listtk = pdo_query($sql);
    return $listtk;
}

?>