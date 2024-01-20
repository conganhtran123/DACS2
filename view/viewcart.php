<?php
    $html_cart = viewcart();
    // $html_cart = '';
    // $i = 1;
    // foreach($_SESSION['giohang'] as $sp){
    //     extract($sp);
    //     $tt = $price*$soluong;
    //     $html_cart .= '<tr>
    //                     <td>'.$i.'</td>
    //                     <td><img src="layout/images/'.$img.'" alt="" width=100px height=100px></td>
    //                     <td>'.$name.'</td>
    //                     <td>'.$price.'</td>
    //                     <td>'.$soluong.'</td>
    //                     <td>'.$tt.'</td>
    //                     <td><a href="#">Xóa</a></td>
    //                 </tr>';
    //     $i++;
    // }
    if(isset($_SESSION['s_user'])){ 
        $html_tt = '<a href="index.php?pg=donhang"><button>Tiếp tục đặt hàng</button></a>';
    }else {
        $html_tt = '<a href="index.php?pg=dangnhap&bill=1"><button>Tiếp tục đặt hàng</button></a>';
    }

?>    
    
    <div class="containerfull">
        <div class="bgbanner">GIỎ HÀNG</div>
    </div>

    <section class="containerfull">
        <div class="container">
            <div class="col9 viewcart">
                <h2>ĐƠN HÀNG</h2>
            <table>
                <tr>
                    <th>STT</th>
                    <th>Hình</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Thao tác</th>
                </tr>
                <?php
                    echo $html_cart;
                ?>
                

            </table>
            <a href="index.php?pg=viewcart&del=1">Xóa rỗng đơn hàng</a>
        </div>
        <div class="col3">
            <h2>ĐƠN HÀNG</h2>
            <div class="total">
                <h3>Tổng: <?php
                    echo $tongdonhang;
                ?></h3>
            </div>
            <!-- <div class="coupon">
                <form action="index.php?pg=viewcart&&voucher=1" method="post">
                    <input type="hidden" name="tongdonhang" value="<?php echo $tongdonhang?>">
                    <input type="text" name="mavoucher" placeholder="Nhập voucher">
                    <button type="submit" name="apma">Áp mã</button>
                </form>
            </div> -->
            <div class="total">
                <h3>Tổng thanh toán: <?php echo $thanhtoan?></h3>
            </div>
            <!-- <a href="index.php?pg=donhang"><button>Tiếp tục đặt hàng</button></a> -->
            <?php
                echo $html_tt;
            ?>
        </div>


        </div>
    </section>