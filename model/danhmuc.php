<?php 

function insert_danhmuc($tenloai) {
    $sql = "insert into danhmuc(name) values('$tenloai')";
    pdo_execute($sql);
}

function delete_danhmuc($id) {
    $sql="delete from danhmuc where id=".$id;
    pdo_execute($sql);
}

function loatAll_danhmuc(){
    $sql="select * from danhmuc where deleted = 0 order by id ";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}
function loatAll_tk(){
    $sql="select * from taikhoan ";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}

function loadone_danhmuc($id){
    $sql = "select * from danhmuc where id=".$id;
    $dm = pdo_query_one($sql);
    return $dm;
}

function update_danhmuc($id,$tenloai){
    $sql = "update danhmuc set name='$tenloai' where id=".$id;
    pdo_execute($sql);
}
function delete_mem($id){
    $sql="UPDATE `danhmuc` SET `deleted`=1 WHERE id =".$id;
    pdo_execute($sql);
}
function loadkho_danhmuc(){
    $sql="select * from danhmuc where deleted =1 order by id asc ";
    $listdanhmuc=pdo_query($sql);
    return  $listdanhmuc;
}
function khodm($id){
    $sql="UPDATE `danhmuc` SET `deleted`=0 WHERE id =".$id;
    pdo_execute($sql);
}

?>