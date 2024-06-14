<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
        <form action="index.php?act=listsp" method="post">
            Tìm kiếm theo tên
            <input type="text" name="kyw"><br>
            <select name='iddm'>
                <option value='0' selected>Tất cả</option>
                <?php 
                    foreach ($listdanhmuc as $danhmuc){
                        extract($danhmuc);
                        echo "<option value=".$id.">$name</option>";
                    }
                ?>
            </select>
            <input type="submit" class="menu-button" value="Tìm kiếm" name="listok">
        </form>
    </div>
    <div class="row2 form_content">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                <tr>
                      <td>#</td>
                      <td>Tên sản phẩm </td>
                      <td>Giá</td>
                      <td>Hình</td>
                      <td>Mô tả</td>
                      <td>Lượt xem</td>
                      <td>Chức Năng</td>
                      <td>Xóa mềm</td>
                      
                    </tr>
                    <?php 
                    $i=0;
                        foreach ($listsanpham as $sanpham){
                            $i+=1;
                            extract($sanpham);
                            $suasp = "index.php?act=suasp&id=".$id;
                            $xoasp = "index.php?act=xoasp&id=".$id;
                            $hinhload="../upload/".$img;
                            if(is_file($hinhload)){
                                $hinh="<img src='".$hinhload."' height='80'>";
                            }
                            echo'<tr>
                            <td>'.$i.'</td>
                            <td>'.$name.'</td>
                            <td>'.$price.'</td>
                            <td>'.$hinh.'</td>
                            <td>'.$mota.'</td>
                            <td>'.$luotxem.'</td>
                            
                            <td>
                                <a href='.$suasp.'><input type="button" class="menu-button" value="Sửa"></a>
                                <a href="#" onclick="confirmDelete(\''.$xoasp.'\', \'Bạn có muốn xóa sản phẩm không?\')"><input type="button" class="menu-button" value="Xóa"></a>
                            </td>
                            <td>
                                <a href="#" onclick="confirmDelete(\'index.php?act=xoamemsp&id='.$id.'\', \'Bạn có muốn xóa mềm sản phẩm không?\')"><input type="button" class="menu-button" value="Xóa mềm"></a>
                            </td>
                        </tr>';
                        
                        } 
                    ?>
                </table>
            </div>
            <div class="row mb10 ">
                <a href="index.php?act=addsp"> <input  class="mr20 menu-button" type="button" value="NHẬP THÊM"></a>
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
