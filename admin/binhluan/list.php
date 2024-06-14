<div class="row2">
            <div class="row2 fort_title">
                <h1>DANH SÁCH TÀI KHOẢN</h1>
            </div>
            <div class="row2 form_content">
                <form action="#" method="post">
                    <div class="row2 mb10 formds_loai">
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>NGƯỜI DÙNG</th>
                                <th>TÊN SẢN PHẨM</th>
                                <th>HÌNH ẢNH</th>
                                <th>NỘI DUNG BÌNH LUẬN</th>
                                <th>NGÀY BÌNH LUẬN</th>
                                <th></th>
                            </tr>
                            <?php
                                foreach ($listbinhluan as $binhluan ) {
                                    extract($binhluan);
                                    $xoabl = "index.php?act=xoabl&id=".$id;

                                    echo '<tr>
                                            <td>'.$id.'</td>
                                            <td>'.$iduser.'</td>
                                            <td>'.$name.'</td>
                                            <td><img src="'.$img.'" alt="" height ="80"></td>
                                            <td>'.$noidung.'</td>
                                            <td>'.$ngaybinhluan.'</td>
                                            <td><a href="'.$xoabl.'"><input type="button" value="Xóa"></a></td>
                                        </tr>';
                                }
                            ?>
                            
                        </table>
                    </div>
                </form>
            </div>
        </div>