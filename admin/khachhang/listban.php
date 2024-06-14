<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH KHÁCH HÀNG</h1>
    </div>
    <div class="row2 form_content ">
        <form action="" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th>#</th>
                        <th>Mã Tk </th>
                        <th>Tên đăng nhập</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Vai trò</th>
                        <th>Cấm</th>
                    </tr>
                    <?php
                    $i = 0;
                    foreach ($ban as $khachhang) {
                        $i += 1;
                        extract($khachhang);
                        if ($role == 1) {
                            $role = "Admin";
                        } else {
                            $role = "Người dùng";
                        }
                        $unban = 'index.php?act=unban&id=' . $id;
                        echo '<tr>
                        <td>' . $i . '</td>
                        <td>' . $id . '</td>
                         <td>' . $user . '</td>
                        <td>' . $email . '</td>
                        <td>' . $address . '</td>
                        <td>' . $tel . '</td>
                        <td>' . $role . '</td> 
                        <td>
                        <a href="#" onclick="confirmDelete(\'' . $unban . '\', \'Bạn có muốn bỏ cấm tài khoản này không?\')"><input type="button" class="menu-button" value=" Bỏ Ban"></a>
                    </td>
                         </tr>';
                    }
                    ?>


                </table>
            </div>
            <a href="index.php?act=khachhang"> <input  class="mr20 menu-button" type="button" value="DANH SÁCH KHÁCH HÀNG"></a>
        </form>
    </div>
</div>
<script>
    function confirmDelete(url, message) {
        if (confirm(message)) {
            window.location.href = url;
        }
    }
</script>