<?php
    $html_thanhvien = show_dsthanhvien($dsthanhvien);
?>

<div class="main-content">
          <h3 class="title-page">Thành viên</h3>
          
          <table id="example" class="table table-striped" style="width: 100%">
            <thead>
              <tr>
                <th>STT</th>
                <th>Tên thành viên</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Điện thoại</th>
              </tr>
            </thead>
            <tbody>
              <?=$html_thanhvien;?>
            </tbody>
            <tfoot>
                <tr>
                <th>STT</th>
                <th>Tên thành viên</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Điện thoại</th>
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