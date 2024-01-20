<?php
$html_thongke = '';
$tongdoanhthu = 0;
if (isset($dm)) {
    foreach ($dm as $sp) {
        extract($sp);
        $tongdoanhthu += $tongthanhtoan;
        $html_thongke .= '<tr>
            <td>' . $id . '</td>
            <td>' . $madh . '</td>
            <td>' . $ngaydat . '</td>
            <td>' . $nguoidat_ten . '</td>
            <td>' . $nguoinhan_ten . '</td>
            <td>' . $tongthanhtoan . '</td>
        </tr>';
    }
}


?>

<div class="main-content">
    <h3 class="title-page">
        Dashboards
    </h3>
    <section class="statistics row">
        <div class="col-sm-12 col-md-6 col-xl-3">
            <a href="products.html">
                <div class="card mb-3 widget-chart">
                    <div class="widget-subheading fsize-1 pt-2 opacity-10 text-warning font-weight-bold">
                        <h5>
                            Tổng thành viên
                        </h5>
                    </div>
                    <span class="widget-numbers"><?php echo $tongtv-1?></span>
                </div>
            </a>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-3">
            <a href="user.html">
                <div class="card mb-3 widget-chart">

                    <div class="widget-subheading fsize-1 pt-2 opacity-10 text-warning font-weight-bold">
                        <h5>
                            Tổng danh mục
                        </h5>
                    </div>
                    <span class="widget-numbers"><?php echo $tongdm ?></span>
                </div>
            </a>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-3">
            <a href="caterogies.html">
                <div class="card mb-3 widget-chart">
                    <div class="widget-subheading fsize-1 pt-2 opacity-10 text-warning font-weight-bold">
                        <h5>

                            Tổng sản phẩm
                        </h5>
                    </div>
                    <span class="widget-numbers"><?php echo $tongsp?></span>
                </div>
            </a>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-3">
            <a href="#">
                <div class="card mb-3 widget-chart">
                    <div class="widget-subheading fsize-1 pt-2 opacity-10 text-warning font-weight-bold">
                        <h5>
                            Tổng doanh thu
                        </h5>
                    </div>
                    <span class="widget-numbers"><?php echo $tongthanhtoan1?>đ</span>
                </div>
            </a>
        </div>
    </section>
    <section class="row">
        <div class="col-sm-12 col-md-12 col xl-12">
            <div class="card chart">
                <form action="index.php?pg=home" method="post">
                    <div class="input-group mb-3">
                        <input type="date" name="tungay" class="form-control">
                        <span class="input-group-text">Đến ngày</span>
                        <input type="date" name="denngay" class="form-control">
                        <button type="submit" name="thongke" class="btn btn-primary">Xem</button>
                    </div>
                </form>
                <p>Tổng doanh thu: <span><?php echo $tongdoanhthu ?>đ</span></p>
                <table class="revenue table table-hover">
                    <thead>
                        <th>ID</th>
                        <th>Mã đơn hàng</th>
                        <th>Ngày đặt</th>
                        <th>Tên người đặt</th>
                        <th>Tên người nhận</th>
                        <th>Doanh thu</th>
                    </thead>
                    <tbody>
                        <?php
                        echo $html_thongke;
                        ?>

                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
</div>
</div>
<script src="assets/js/main.js"></script>
<script>
    new DataTable('#example');
</script>