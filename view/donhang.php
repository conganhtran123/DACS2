<?php
$html_tk = '';
if (!isset($_SESSION['s_user'])) {
    $html_tk = '<a href="index.php?pg=dangnhap&bill=1" style="cursor: pointer;">
                        &rArr; Bạn đã có tài khoản
                    </a>';
}

$html_dsspdonhang = '';
if (isset($_SESSION['giohang'])) {
    foreach ($_SESSION['giohang'] as $sp) {
        extract($sp);
        $html_dsspdonhang .= '<li>' . $name . ' x ' . $soluong . '</li>';
    }
}

if (isset($_SESSION['s_user'])) {
    extract($_SESSION['s_user']);
    $html_thongtin = '<label for="hoten"><b>Họ và tên</b></label>
                        <input type="text" placeholder="Nhập họ tên đầy đủ" name="hoten" id="hoten" required value="' . $ten . '">

                        <label for="diachi"><b>Địa chỉ</b></label>
                        <input type="text" placeholder="Nhập địa chỉ" name="diachi" id="diachi" required value="' . $diachi . '">

                        <label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Nhập email" name="email" required value="' . $email . '">

                        <label for="dienthoai"><b>Điện thoại</b></label>
                        <input type="text" placeholder="Nhập điện thoại" name="dienthoai" id="dienthoai" required value="' . $dienthoai . '">';
} else {
    $html_thongtin = '<label for="hoten"><b>Họ và tên</b></label>
                            <input type="text" placeholder="Nhập họ tên đầy đủ" name="hoten" id="hoten" required>

                            <label for="diachi"><b>Địa chỉ</b></label>
                            <input type="text" placeholder="Nhập địa chỉ" name="diachi" id="diachi" required>

                            <label for="email"><b>Email</b></label>
                            <input type="text" placeholder="Nhập email" name="email" required>

                            <label for="dienthoai"><b>Điện thoại</b></label>
                            <input type="text" placeholder="Nhập điện thoại" name="dienthoai" id="dienthoai" required>';
}


?>

<div class="containerfull">
    <div class="bgbanner">ĐƠN HÀNG</div>
</div>

<section class="containerfull">
    <div class="container">
        <form method="post" action="index.php?pg=donhangsubmit" enctype="application/x-www-form-urlencoded">
            <div class="col9 viewcart">
                <div class="ttdathang">
                    <h2>Thông tin người đặt hàng</h2>
                    <?php
                    echo $html_thongtin;
                    ?>

                    <!-- <label for="hoten"><b>Họ và tên</b></label>
                    <input type="text" placeholder="Nhập họ tên đầy đủ" name="hoten" id="hoten" required value="<?php echo $ten ?>">
    
                    <label for="diachi"><b>Địa chỉ</b></label>
                    <input type="text" placeholder="Nhập địa chỉ" name="diachi" id="diachi" required value="<?php echo $diachi ?>">
    
                    <label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Nhập email" name="email" id="email" required value="<?php echo $email ?>">
    
                    <label for="dienthoai"><b>Điện thoại</b></label>
                    <input type="text" placeholder="Nhập điện thoại" name="dienthoai" id="dienthoai" required value="<?php echo $dienthoai ?>"> -->
                </div>
                <div class="ttdathang">
                    <a onclick="showttnhanhang()" style="cursor: pointer;">
                        &rArr; Địa chỉ nhận ở nơi khác
                    </a>
                    <?php
                    echo $html_tk;
                    ?>

                </div>

                <div class="ttdathang" id="ttnhanhang">
                    <h2>Thông tin người nhận hàng</h2>
                    <label for="hoten"><b>Họ và tên</b></label>
                    <input type="text" placeholder="Nhập họ tên đầy đủ" name="hoten_nguoinhan" id="hoten">

                    <label for="diachi"><b>Địa chỉ</b></label>
                    <input type="text" placeholder="Nhập địa chỉ" name="diachi_nguoinhan" id="diachi">

                    <label for="dienthoai"><b>Điện thoại</b></label>
                    <input type="text" placeholder="Nhập điện thoại" name="dienthoai_nguoinhan" id="dienthoai">

                </div>

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
                        <h3>Tổng: <?php echo $tongdonhang ?></h3>

                    </div>
                </div>

                <!-- <div class="coupon">
                    <div class="boxcart">
                        <h3>Voucher: <?php echo $voucher ?></h3>
                    </div>
                </div> -->

                <div class="total">
                    <div class="boxcart bggray">
                        <h3>Tổng thanh toán: <?php echo $tongthanhtoan ?></h3>
                    </div>
                </div>

                <div class="pttt">
                    <div class="boxcart">
                        <h3>Phương thức thanh toán: </h3>
                        <button type="submit" name="donhangsubmit">Thanh toán tiền mặt</button>
                        <!-- <button type="submit" name="momo">Thanh toán Momo<br> -->
                    </div>
                </div>
            </div>
        </form>
        

    </div>
    
</section>

<script>
    var ttnhanhang = document.getElementById("ttnhanhang");
    ttnhanhang.style.display = "none";

    function showttnhanhang() {
        if (ttnhanhang.style.display == "none") {
            ttnhanhang.style.display = "block";
        } else {
            ttnhanhang.style.display = "none";
        }
    }
</script>