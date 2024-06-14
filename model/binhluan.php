<?php
function loatAll_binhluan($idpro){
    // $sql = "select idcmt,img,name_pro,user,avatar,noidung,ngaybinhluan from sanpham join binhluan on sanpham.idpro = binhluan.idpro join taikhoan on binhluan.iduser=taikhoan.iduser where 1 and binhluan.deleted=0";
    $sql="select binhluan.id, sanpham.name, noidung,iduser, sanpham.img, ngaybinhluan from sanpham join binhluan on sanpham.id = binhluan.idpro  where 1 ";
    if($idpro>0) 
    $sql.= "and idpro='".$idpro."'";
    $sql.="order by id desc";
    $listbl = pdo_query($sql);
    return $listbl;
}

function insert_binhluan($noidung,$iduser,$idpro,$ngaybinhluan) {
    $sql = "insert into binhluan(noidung,iduser,idpro,ngaybinhluan) values('$noidung','$iduser','$idpro','$ngaybinhluan')";
    pdo_execute($sql);
}
 ?>