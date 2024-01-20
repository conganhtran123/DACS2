<?php
if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
    extract($_SESSION['s_user']);
    $html_dn = '<a href="index.php?pg=myaccout_confirm">' . $ten . '</a>
                    <a href="index.php?pg=logout">THOÁT</a>';
} else {
    $html_dn = '<a href="index.php?pg=dangnhap">ĐĂNG NHẬP</a>
                <a href="index.php?pg=dangky">ĐĂNG KÝ</a>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEW FOODS</title>
    <link rel="stylesheet" href="layout/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

    <!-- liên hệ -->
    <!-- <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&display=swap"rel="stylesheet" /> -->

</head>

<body>

    <div class="containerfull padd20">
        <div class="container">
            <div class="logo col1"><a href="index.php"><img src="uploads/logo.png" height="40" alt=""></a></div>
            
                <div class="menu col11">
                    <div class="col3">
                        <!-- <form action="index.php?pg=sanpham" method="post">
                        <input type="text" name="kyw" placeholder="Nhập từ khóa">
                        <input type="submit" value="Tìm kiếm" name="timkiem" id="timkiem">
                    </form> -->
                        <form action="index.php" method="get">
                            <input type="hidden" name="pg" value="sanpham">
                            <input type="text" name="kyw" placeholder="Nhập từ khóa">
                            <input type="submit" value="Tìm kiếm" name="timkiem" id="timkiem">
                        </form>
                    </div>
                    <div class="col9">
                        <a href="index.php">TRANG CHỦ</a>
                        <a href="index.php?pg=sanpham">SẢN PHẨM</a>
                        <!-- <a href="index.php?pg=dichvu">DỊCH VỤ</a> -->
                        <a href="index.php?pg=lienhe">LIÊN HỆ</a>
                        <?php
                        echo $html_dn;
                        ?>
                    </div>
                    <div>
                        <a href="index.php?pg=viewcart">
                            <i class="fa-solid fa-cart-shopping">
                                <?php
                                if (isset($_SESSION['giohang'])) {
                                    echo count($_SESSION['giohang']);
                                }
                                ?>
                            </i>
                        </a>

                    </div>

                </div>
            

        </div>
    </div>