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
                    <td>Trạng thái đơn hàng</td>
                </tr>
                <?php

                $i = 0;
                    foreach($listdh as $dh){
                        extract($dh);
                        if ($trangthai == 0) {
                          $tt="Chờ xác nhận";
                        }elseif($quatrinh==1){
                          $tt="Đã xác nhận";
                        }elseif($quatrinh==2){
                          $tt="Đang giao hàng";
                        }elseif($quatrinh==3){
                          $tt="Giao hàng thành công";
                        }
                    $i += 1;
                    $hinhload = "../upload/" . $img;
                    if (is_file($hinhload)) {
                        $hinh = "<img src='" . $hinhload . "' height='80'>";
                    }
                    
                    echo '<tr>
                                <td>' . $i . '</td>
                                <td>' . $name . '</td>
                                <td>' . $hinh . '</td>
                                <td>' . $soluong . '</td>
                                <td>' . $price . '</td>
                                <td>' . $thanhtien . '</td>
                                <td>' . $tt . '</td>
                            </tr>';
                }
                ?>
            </table>
        </div>
        <div class="row mb10 ">
            <form action="index.php?act=updatett">
                <select name="trangthai" id="">
                    <option value="1">Đang xử lý</option>
                    <option value="2">Đang gửi hàng</option>
                    <option value="3">Đang giao</option>
                    <option value="4">Hoàn tất</option>
                    <input type="submit" value="Cập nhật">
                </select>
                <input class="mr20 menu-button" type="button" value="Hủy">
            </form>

        </div>
    </div>
</div>