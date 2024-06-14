<?php
session_start();
include "../model/pdo.php";
include "../model/cart.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "header.php";
include "../img/global.php";
include "../momo/thanhtoanmomo.php";

if (!isset($_SESSION['mycart'])) {
    $_SESSION['mycart'] = [];
}

$newsp = loatAll_sanpham_home();
$dsdm = loatAll_danhmuc();
$spyt = loatAll_sanpham_top10();

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case "sanphamct":
            if (isset($_GET['idsp']) && $_GET['idsp'] > 0) {
                $id = $_GET['idsp'];
                $sp_cung_loai = loadone_sanpham_cungloai($id);
                $onesp = loadone_sanpham($id);
                include "sanphamct.php";
            } else {
                include "home.php";
            }
            break;
        case "sanpham":
            if (isset($_POST['kyw']) && $_POST['kyw'] > 0) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['iddm']) && $_GET['iddm'] > 0) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }
            $dssp = loatAll_sanpham($kyw, $iddm);
            $tendm = load_ten_sanpham($iddm);
            include "sanpham.php";
            break;
        case "dangky":
            if (isset($_POST['dangky']) && $_POST['dangky']) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $role = $_POST['role'];
                dangky($user, $pass, $email, $address, $tel, $role);
                $thongbao = "Đăng ký thành công, hãy đăng nhập tài khoản";
            }
            include "taikhoan/dangky.php";
            break;
        case "dangnhap":
            if (isset($_POST['dangnhap']) && $_POST['dangnhap']) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $check = check($user, $pass);
                if (is_array($check)) {
                    $_SESSION['user'] = $check;
                    include "home.php";
                } else {
                    $thongbao = "Tài khoản không tồn tại";
                    include "home.php";
                }
            }
            break;
        case "edit_taikhoan":
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                $id = $_POST['id'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $role = $_POST['role'];
                update_taikhoan($id, $user, $pass, $email, $address, $tel, $role);
                $_SESSION['user'] = check($user, $pass);
                $thongbao = "Cập nhật thành công";
            }
            include "taikhoan/edit_taikhoan.php";
            break;
        case "xoa":
            unset($_SESSION['user']);
            header("location: index.php");
            break;
        case "quenmk":
            if (isset($_POST['gui']) && $_POST['gui']) {
                $email = $_POST['email'];
                $checkemail = checkemail($email);
                if (is_array($checkemail)) {
                    $thongbao = "Mật khẩu của bạn là " . $checkemail['pass'];
                } else {
                    $thongbao = "Email không tồn tại";
                }
            }
            include "taikhoan/quenmk.php";
            break;
        case "addtocart":
            if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $img = $_POST['img'];
                $price = $_POST['price'];
                $soluong = isset($_POST['soluong']) ? intval($_POST['soluong']) : 1;

                $found = false;
                foreach ($_SESSION['mycart'] as &$cartItem) {
                    if ($cartItem[0] == $id) {
                        $cartItem[4] += $soluong;
                        $cartItem[5] = $cartItem[4] * $cartItem[3];
                        $found = true;
                        break;
                    }
                }

                if (!$found) {
                    $thanhtien = $soluong * $price;
                    $spadd = [$id, $name, $img, $price, $soluong, $thanhtien];
                    $_SESSION['mycart'][] = $spadd;
                }
            }
            include "cart/viewcart.php";
            break;

        case 'delcart':
            if (isset($_GET['idcart'])) {
                array_splice($_SESSION['mycart'], $_GET['idcart'], 1);
            } else {
                $_SESSION['mycart'] = [];
            }
            include "cart/viewcart.php";
            break;

        case 'incqty':
            if (isset($_GET['idcart'])) {
                $idcart = $_GET['idcart'];

                if (isset($_SESSION['mycart'][$idcart])) {
                    $_SESSION['mycart'][$idcart]['4']++;
                    $_SESSION['mycart'][$idcart]['5'] = $_SESSION['mycart'][$idcart]['4'] * $_SESSION['mycart'][$idcart]['3'];
                }
            }
            include "cart/viewcart.php";
            break;

        case 'decqty':
            if (isset($_GET['idcart'])) {
                $idcart = $_GET['idcart'];

                if (isset($_SESSION['mycart'][$idcart]) && $_SESSION['mycart'][$idcart]['4'] > 1) {
                    $_SESSION['mycart'][$idcart]['4']--;
                    $_SESSION['mycart'][$idcart]['5'] = $_SESSION['mycart'][$idcart]['4'] * $_SESSION['mycart'][$idcart]['3'];
                }
            }
            include "cart/viewcart.php";
            break;

        case "bill":
            include "cart/bill.php";
            break;
        case "mybill":
            $hienthi = loadall_bill(0);
            include "cart/mybill.php";
            break;
        case "billcomfirm":
            if (isset($_POST['dongydathang']) && ($_POST['dongydathang'])) {
                $name = $_POST['name'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $tel = $_POST['tel'];
                $pttt = $_POST['pttt'];
                $ngaydathang = date('h:i:sa d/m/Y');
                $tongdonhang = tongdonhang();
                $idbill = insert_bill($name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang);
                foreach ($_SESSION['mycart'] as $cart) {
                    insert_cart($_SESSION['user']['id'], $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $idbill);
                }
            } elseif (isset($_POST['payUrl']) && ($_POST['payUrl'])) {
                $url = thanhtoanmomo();
                if ($url) {
                    echo "<script>window.location = '$url'</script>";
                }
                // Thông tin thẻ MoMo
                // NGUYEN VAN A
                // 9704 0000 0000 0018
                // 03/07
                // OTP       
            }
            $bill = loadone_bill($idbill);
            $listbill = loadall_cart($idbill);
            unset($_SESSION['mycart']);
            include "cart/billcomfirm.php";
            break;
        case 'chitiet':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $listctdh = listctdh($id);
                $listdonhang = listdonhang($id);
            }
            include "cart/chitiet.php";
            break;
        case "huydon":
            if (isset($_GET['id'])) {
                // $iduser = $_SESSION['user']['iduser'];
                $id = $_GET['id'];
                delete_bill($id);
            }
            $hienthi = loadall_bill(0);
            include "cart/mybill.php";
            break;
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}
include "footer.php";
