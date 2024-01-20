<style>
    table {
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<?php
$html_lsmuahang = '';
$i = 1;
foreach ($dssp as $sp) {
    extract($sp);
    $pttt1 = $ptthanhtoan;
    switch ($pttt1) {
        case '1':
            $pttt1 = 'Tiền mặt';
            break;
        case '2':
            $pttt1 = 'Momo';
            break;
    }
    if(isset($_GET['page'])) {
        $_SESSION['tranglsmuahang'] = $_GET['page'];
    }else {
        $_SESSION['tranglsmuahang'] = '1';
    }
    $html_lsmuahang .= '<tr>
                            <td>' . $i . '</td>
                            <td>' . $madh . '</td>
                            <td>' . $ngaydat . '</td>
                            <td>' . $total . '</td>
                            <td>' . $voucher . '</td>
                            <td>' . $tongthanhtoan . '</td>
                            <td>' . $pttt1 . '</td>
                            <td><a href="index.php?pg=lichsumuahang&page='.$_SESSION['tranglsmuahang'].'&chitiet=' . $id . '">
                                Chi tiết
                                </a>
                            </td>
                        </tr>';
    $i += 1;
}
unset($_SESSION['tranglsmuang']);


$html_tongtrang = '';

for ($i = 1; $i <= $tongtrang; $i++) {
    $html_tongtrang .= '<div class="circle"><a href="index.php?pg=lichsumuahang&page=' . $i . '">' . $i . '</a></div>';
}
?>

<div class="containerfull">
    <div class="bgbanner">LỊCH SỬ MUA HÀNG</div>
</div>

<section class="containerfull">
    <div class="container">
        <div class="boxleft mr2pt menutrai">
            <h1>DÀNH CHO BẠN</h1><br><br>
            <a href="index.php?pg=myaccout">Cập nhật thông tin</a>
            <a href="index.php?pg=lichsumuahang">Lịch sử mua hàng</a>
            <a href="index.php?pg=logout">Thoát hệ thống</a>
        </div>
        <div class="boxright">
            <h1>Lịch sử mua hàng</h1><br>


            <table>
                <tr>
                    <th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th>Tổng</th>
                    <th>Voucher</th>
                    <th>Thành tiền</th>
                    <th>Phương thức thanh toán</th>
                    <th>Thao tác</th>
                </tr>
                <?php
                echo $html_lsmuahang;
                ?>
            </table>

            <div class="muc">
                <!-- <div class="circle"><a href="index.php?pg=sanpham&page=1">1</a></div>
                <div class="circle"><a href="index.php?pg=sanpham&page=2">2</a></div>
                <div class="circle"><a href="index.php?pg=sanpham&page=3">3</a></div> -->
                <?php
                echo $html_tongtrang;
                ?>
            </div>

            <?php
            if (isset($_GET['chitiet'])) {
                $idbill = $_GET['chitiet'];

                $sptronglsmh = get_sptronglsmh($idbill);

                $html_chitiet = '';
                $j = 1;
                foreach ($sptronglsmh as $sp) {
                    extract($sp);
                    $html_chitiet .= '<tr>
                        <td>' . $j . '</td>
                        <td>' . $name . '</td>
                        <td>' . $soluong . '</td>
                        <td>' . $price . '</td>
                        <td>' . $thanhtien . '</td>
                    </tr>';
                    $j++;
                }
                $madh = get_madh($idbill);

                echo '<h1>Chi tiết đơn hàng có mã đơn hàng<br> là: ' . $madh . '</h1>
                        <table>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                        </tr>';

                echo $html_chitiet;

                echo '</table>';
            } else {
                $sptronglsmh = array();
            }


            ?>




        </div>









    </div>
</section>