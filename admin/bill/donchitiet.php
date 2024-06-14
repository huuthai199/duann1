<div class="row2">
    <div class="row2 font_title">
        <h1>CHI TIẾT ĐƠN HÀNG</h1>
    </div>
    <div class="row2 form_content">
        <div class="row2 mb10 formds_loai">
            <table>
                <tr>
                    <td>#</td>
                    <td>Tên sản phẩm </td>
                    <td>Hình</td>
                    <td>Số lượng</td>
                    <td>Giá</td>
                    <td>Tổng đơn hàng</td>
                </tr>
                <?php

                $i = 0;
                foreach ($listdonhang as $list) {
                    extract($list);
                    $tinhtrang = $list['tinhtrang'];
                    switch ($tinhtrang) {
                        case "0":
                            $tt = "Đơn hàng mới";
                            break;
                        case "1":
                            $tt = "Đang xử lí";
                            break;
                        case "2":
                            $tt = "Đang giao hàng";
                            break;
                        case "3":
                            $tt = "Đã giao hàng";
                            break;
                        default:
                            $tt = "Đơn hàng mới";
                            break;
                    }
                    echo '
                            <h4>Mã đơn hàng: ' . $list['id'] . '</h4> <hr><br>
                            <h4>Người nhận: ' . $list['bill_name'] . '</h4> <hr><br>
                            <h4>Địa chỉ: ' . $list['bill_address'] . '</h4> <hr><br>
                            <h4>Số điện thoại: ' . $list['bill_tel'] . '</h4> <hr><br>
                            <h4>Tổng đơn hàng: ' . $list['tongdonhang'] . ' VNĐ</h4> <hr><br>
                            <h4>Ngày đặt hàng: ' . $list['ngaydathang'] . '</h4> <hr><br>
                            <h4>Trạng thái đơn hàng: ' . $tt . '</h4> <hr><br>';
                }
                foreach ($listctdh as $dh) {
                    extract($dh);

                    $suasp = "index.php?act=suasp&id=" . $id;
                    $xoasp = "index.php?act=xoasp&id=" . $id;
                    $hinhload = "../upload/" . $img;
                    if (is_file($hinhload)) {
                        $hinh = "<img src='" . $hinhload . "' height='80'>";
                    }
                    $i += 1;
                    echo '<tr>
                                <td>' . $i . '</td>
                                <td>' . $name . '</td>
                                <td>' . $hinh . '</td>
                                <td>' . $soluong . '</td>
                                <td>' . $price . '</td>
                                <td>' . $thanhtien . '</td>
                            </tr>';
                }
                ?>
            </table>
        </div>
        <div class="row mb10 ">
            <a href="index.php?act=updatebill"><input class="mr20 menu-button" type="button" value="Chuyển trạng thái"></a>
            <input class="mr20 menu-button" type="button" value="Hủy">
        </div>
    </div>
</div>