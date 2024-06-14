<div class="row2">
    <div class="row2 fort_title">
        <h1>DANH SÁCH ĐƠN HÀNG</h1>
        <form action="index.php?act=listbill" method="post">
            <input type="text" name="kyw" placeholder="nhập mã đơn hàng">
            <input type="submit" name="listok" value="GO">
        </form>
    </div>
    <div class="row2 form_content">
        <div class="row2 mb10 formds_loai">
            <table>
                <tr>
                    <th>MÃ ĐON HÀNG</th>
                    <th>KHÁCH HÀNG</th>
                    <th>SỐ LƯỢNG HÀNG</th>
                    <th>GIÁ TRỊ ĐƠN HÀNG</th>
                    <th>TÌNH TRẠNG ĐƠN HÀNG</th>
                    <th>NGÀY ĐẶT HÀNG</th>
                    <th>THAO TÁC</th>
                </tr>
                <?php
                foreach ($listbill as $bill) {
                    extract($bill);
                    $kh = $bill["bill_name"] . '
                        <br> ' . $bill["bill_email"] . '
                        <br> ' . $bill["bill_address"] . '
                        <br> ' . $bill["bill_tel"];
                    $ttdh=$bill['tinhtrang'];
                    switch ($ttdh){
                        case "0" :
                            $tt="Đơn hàng mới";
                            break;
                        case "1" :
                            $tt="Đang xử lí";
                            break;  
                        case "2" :
                            $tt="Đang giao hàng";
                            break;     
                        case "3" :
                            $tt="Đã giao hàng";
                            break;
                        default:
                            $tt="Đơn hàng mới";
                            break;
                        }
                    $countsp = loadall_cart_count($bill['id']);
                    echo '<tr>
                                <td>' . $bill['id'] . '</td>
                                <td>' . $kh . '</td>
                                <td>' . $countsp . '</td>
                                <td><strong>' . $bill['tongdonhang'] . '</strong>VNĐ</td>
                                <td>' . $tt . '</td>
                                <td>' . $bill['ngaydathang'] . '</td>
                                <td>
                                <a href="index.php?act=chitiet&id='.$id.'" ><input type="button"  value="Chi tiết đơn hàng"></a>
                                <a href="index.php?act=suabill&id='.$id.'" ><input type="button"  value="Sửa đơn hàng"></a>
                                </td>
                            </tr>';
                }
                ?>
            </table>
            <!-- <a href="index.php?act=huydon&id="'.$bill['id'].'"><input type="button" onclick="return Delete()" value="Hủy"></a> -->
        </div>
        <!-- <div class="row mb10">
            <input type="button" class="mr20 menu-button" value="Chọn tất cả">
            <input type="button" class="mr20 menu-button" value="Bỏ chọn tất cả">
            <input type="button" class="mr20 menu-button" value="Xóa các mục đã chọn">
            <a href="index.php?act=addsp"><input type="button" class="mr20 menu-button" value="Nhập thêm"></a>
        </div> -->
    </div>
</div>
<script>
    function Delete(){
        return confirm("Bạn muốn hủy bỏ đơn hàng ?");
    }
</script>