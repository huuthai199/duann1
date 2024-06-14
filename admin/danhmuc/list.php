<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH DANH MỤC</h1>
    </div>
    <div class="row2 form_content">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th>#</th>
                        <th>TÊN DANH MỤC</th>
                        <th>CHỨC NĂNG</th>
                        <th>XÓA MỀM</th>
                    </tr>
                    <?php
                    $i=0; 
                    foreach ($listdanhmuc as $danhmuc){
                        $i+=1;
                        extract($danhmuc);
                        $suadm = "index.php?act=suadm&id=".$id;
                        $xoadm = "index.php?act=xoadm&id=".$id;
                        echo '<tr>
                                <td>'.$i.'</td>
                                <td>'.$name.'</td>
                                <td>
                                    <a href='.$suadm.'><input type="button" value="Sửa"></a>
                                    <a href="#" onclick="confirmDelete(\''.$xoadm.'\', \'Bạn có muốn xóa không?\')"><input type="button" value="Xóa"></a>
                                </td>
                                <td><a href="#" onclick="confirmDelete(\''.$xoadm.'\', \'Bạn có muốn xóa mềm không?\')"><input type="button" value="Xóa mềm"></a></td>
                              </tr>';
                    } 
                    ?>
                </table>
            </div>
            <div class="row mb10">
                <a href="index.php?act=adddm"><input class="mr20 menu-button" type="button" value="NHẬP THÊM"></a>
            </div>
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
