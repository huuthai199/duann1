<main class="catalog mb">
    <div class="boxleft">
        <div class="row2">
            <div class="row2 font_title">
                <h1>Giỏ hàng</h1>
            </div>
            <div class="row2 form_content">
                <div class="row2 mb10 formds_loai">
                    <table>
                        <?php
                        viewcart(1);
                        ?>
                    </table>
                </div>
                <div class="row mb10">
                    <form action="index.php" method="GET">
                        <input type="hidden" name="act" value="bill">
                        <input class="mr20 menu-button" type="submit" value="Đồng ý đặt hàng">
                    </form>
                    <form action="index.php" method="GET">
                        <input type="hidden" name="act" value="delcart">
                        <input class="mr20 menu-button" type="submit" value="Xóa giỏ hàng">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="boxright">
        <?php include "boxright.php" ?>
    </div>
</main>
