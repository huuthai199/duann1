<?php
if (is_array($bill)) {
    extract($bill); // sử dụng để chuyển các phần tử trong một mảng thành các biến động
    $tinhtrang = $bill['tinhtrang'];
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
}
?>
<div class="mb">
    <div class="box_title">
        <h1>Cập nhập tình trạng đơn hàng</h1>
    </div>
    <div class="box_content form_account">
        <form action="index.php?act=updatebill" method="post">
            <label for="">Mã đơn hàng</label><br>
            <input type="text" name="id" value="<?= $bill['id'] ?>" disabled><br>
            <label for="">Tên khách hàng</label><br>
            <input type="text" name="tenkh" value="<?= $bill['bill_name'] ?>" disabled><br>
            <label for="">Giá trị đơn hàng</label><br>
            <input type="text" name="gia" value="<?= $bill['tongdonhang'] ?>" disabled><br>
            <label for="">Tình trạng đơn hàng:</label><br>
            <select type="text" name="ttdh" selected>
                <option value=""><?= $tt ?></option>
                <option value="0">Đơn hàng mới</option>
                <option value="1">Đơn hàng đang xử lý</option>
                <option value="2">Đơn hàng đang giao</option>
                <option value="3">Đơn hàng giao thành công</option>
            </select><br>
            <label for="">Ngày đặt hàng:</label><br>
            <input type="text" name="ndh" value="<?= $bill['ngaydathang'] ?>" disabled><br>
            <input type="hidden" name="id" value="<?= $bill['id'] ?>">
            <input type="submit" name="capnhat" value="Cập nhật">
        </form>
        <p>
            <?php
            if (isset($thongbao) && ($thongbao != "")) {
                echo $thongbao;
            }
            ?>
        </p>
    </div>
</div>