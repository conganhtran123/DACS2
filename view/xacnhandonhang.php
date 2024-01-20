<?php




$bill = select_bill($idbill);
extract($bill);
$html_thongtin = '<div class="ttdathang">
                    <h2>Thông tin người đặt hàng</h2>
                    <label for="hoten"><b>Họ và tên</b></label>
                    <input type="text" placeholder="Nhập họ tên đầy đủ" name="hoten" id="hoten"  value="' . $nguoidat_ten . '">

                    <label for="diachi"><b>Địa chỉ</b></label>
                    <input type="text" placeholder="Nhập địa chỉ" name="diachi" id="diachi"  value="' . $nguoidat_diachi . '">

                    <label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Nhập email" name="email"  value="' . $nguoidat_email . '">

                    <label for="dienthoai"><b>Điện thoại</b></label>
                    <input type="text" placeholder="Nhập điện thoại" name="dienthoai" id="dienthoai"  value="' . $nguoidat_dienthoai . '">
                </div>
                <div class="ttdathang" id="ttnhanhang">
                    <h2>Thông tin người nhận hàng</h2>
                    <label for="hoten"><b>Họ và tên</b></label>
                    <input type="text" placeholder="Nhập họ tên đầy đủ" name="hoten_nguoinhan" id="hoten" value="' . $nguoinhan_ten . '">

                    <label for="diachi"><b>Địa chỉ</b></label>
                    <input type="text" placeholder="Nhập địa chỉ" name="diachi_nguoinhan" id="diachi" value="' . $nguoinhan_diachi . '">

                    <label for="dienthoai"><b>Điện thoại</b></label>
                    <input type="text" placeholder="Nhập điện thoại" name="dienthoai_nguoinhan" id="dienthoai" value="' . $nguoinhan_dienthoai . '">
                </div>';

$carttheobill = select_carttheobill($idbill);
$html_dsspdonhang = '';
foreach ($carttheobill as $sp) {
    extract($sp);
    $html_dsspdonhang .= '<li>' . $name . ' x ' . $soluong . '</li>';
}

$tongdonhang1 = $total;
$voucher1 = $voucher;
$tongthanhtoan1 = $tongthanhtoan;
$pttt1 = $ptthanhtoan;
switch ($pttt1) {
    case '1':
        $pttt1 = 'Tiền mặt';
        break;
    case '2':
        $pttt1 = 'Momo';
        break;
}
$madh1 = $madh;









?>

<div class="containerfull">
    <div class="bgbanner">XÁC NHẬN ĐƠN HÀNG</div>
</div>

<section class="containerfull">
    <div class="container">
        <form method="post" action="index.php?pg=xacnhan">
            <h2>Mã Đơn hàng: <?php echo $madh1 ?></h2>
            <div class="col9 viewcart">
                <?php
                echo $html_thongtin;
                ?>

            </div>

            <div class="col3">
                <h2>ĐƠN HÀNG</h2>
                <div class="total">
                    <div class="boxcart">
                        <!-- <li>Sản phẩm 1 x 2</li>
                        <li>Sản phẩm 2 x 3</li>
                        <li>Sản phẩm 3 x 4</li>-->
                        <?php
                        echo $html_dsspdonhang;
                        ?>
                        <h3>Tổng: <?php echo $tongdonhang1 ?></h3>

                    </div>
                </div>

                <!-- <div class="coupon">
                    <div class="boxcart">
                        <h3>Voucher: <?php echo $voucher1 ?></h3>
                    </div>
                </div> -->
                <div class="pttt">
                    <div class="boxcart">
                        <h3>Phương thức thanh toán: </h3>
                        <?php
                        echo $pttt1;
                        ?>
                    </div>
                </div>
                <div class="total">
                    <div class="boxcart bggray">
                        <h3>Tổng thanh toán: <?php echo $tongthanhtoan1 ?></h3>
                    </div>
                </div>

            </div>
            <button type="submit" name="xacnhan">Xác nhận</button>
        </form>


    </div>
</section>