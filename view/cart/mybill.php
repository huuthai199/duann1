<main class="catalog  mb ">
  <div class="boxleft">
      <div class="mb">
        <div class="box_title">Đơn hàng của bạn</div>
        <div class="box_content">
          <table>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Ngày đặt hàng </th>
                <!-- <th>Số lượng mặt hàng</th> -->
                <th>Tống khóa đơn</th>
                <th>Tình trạng đơn hàng</th>
                <th>Thao tác</th>
            </tr>
            <?php foreach ($hienthi as $bill){
                $tong = $bill['tongdonhang'];
                $ht=$bill['tinhtrang'];
                switch ($ht){
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
              } ?>
                    <tr>
                    <td><?= $bill['id'] ?></td>
                    <td><?= $bill['ngaydathang'] ?></td>
                    <td><?= $bill['tongdonhang'] ?></td>
                    <td><?= $tt ?></td>
                    <td>
                    <a href="index.php?act=chitiet&id=<?= $bill['id']?>"><input type="button" class="menu-button" value="Xem chi tiết"></a>
                    <?php if ($bill['tinhtrang'] == 0 ) { ?>
                    <a href="index.php?act=huydon&id=<?= $bill['id']?>"><input type="button" class="menu-button" onclick="return Delete()" value="Hủy đơn"></a>
                    <?php } ?>
                    </td>
                    </tr> 
              <?php }
    ?>
    
          </table>
        </div>
      </div>
    </div>
        <div class="boxright">      
            <?php include "boxright.php"?>
        </div>
    </main>
<script>
  function Delete(){
        return confirm("Bạn muốn hủy bỏ đơn hàng ?");
        
    }
</script>
