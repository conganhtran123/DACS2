<?php
    $html_donhang = show_donhangadmin($donhang);
?>

<div class="main-content">
          <h3 class="title-page">Đơn hàng</h3>
          <table id="example" class="table table-striped" style="width: 100%">
            <thead>
              <tr>
                <th>STT</th>
                <th>Mã đơn hàng</th>
                <th>Ngày đặt</th>
                <th>Người đặt</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ người đặt</th>
                <th>Người nhận</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ người nhận</th>
                <th>Voucher</th>
                <th>Thanh toán</th>
                <th>Phương thức thanh toán</th>

              </tr>
            </thead>
            <tbody>
              <?=$html_donhang;?>
            </tbody>
            <tfoot>
                <tr>
                <th>STT</th>
                <th>Mã đơn hàng</th>
                <th>Ngày đặt</th>
                <th>Người đặt</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ người đặt</th>
                <th>Người nhận</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ người nhận</th>
                <th>Voucher</th>
                <th>Thanh toán</th>
                <th>Phương thức thanh toán</th>

              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
    <script src="assets/js/main.js"></script>
    <script>
      new DataTable("#example");
    </script>