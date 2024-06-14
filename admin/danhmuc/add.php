<!-- Trong phần HTML -->
<div class="mb">
    <div class="box_title">THÊM SẢN PHẨM MỚI</div>
    <div class="box_content form_account">
        <form action="index.php?act=adddm" method="post">
            <label for="tenloai">Tên Danh Mục:</label><br>
            <input type="text" name="tenloai" id="tenloai"><br>
            <input type="submit" name="themmoi" value="Thêm sản phẩm">
            <a href="index.php?act=listdm"  ><input type="button" class="menu-button" value="Danh Sách"></a>                
        </form>
        <p>
            <?php
            if(isset($thongbao) && ($thongbao !="")){
                echo $thongbao;
            }
            ?>
            </p>
    </div>
</div>
