<?php
function loatAll_khachhang(){
    $sql="select * from taikhoan order by id ";
    $listkhachhang = pdo_query($sql);
    return $listkhachhang;
}
function loadall_user(){
    $sql="select * from taikhoan where deleted=0 order by id asc ";
    $listkhachhang=pdo_query($sql);
    return  $listkhachhang;
}
function ban($id){
    $sql="update taikhoan set deleted =1 where id=".$id;
    pdo_execute($sql);
}
function un_ban($id){
    $sql="update taikhoan set deleted =0 where id=".$id;
    pdo_execute($sql);
}
function loadall_ban(){
    $sql="select * from taikhoan where deleted = 1 order by id asc ";
    $listkhachhang=pdo_query($sql);
    return  $listkhachhang;
}
function soluong_sp(){
    $sql="SELECT COUNT(*) AS idpro
    FROM sanpham";
    $soluong = pdo_query_one($sql);
    return $soluong;
}
 ?>