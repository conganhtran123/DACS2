<?php
    if(isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
        extract($_SESSION['s_user']);
    }


?>


<div class="containerfull">
    <div class="bgbanner">CẬP NHẬT THÔNG TIN THÀNH VIÊN</div>
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
            <h1>Cập nhật thông tin thành viên</h1><br>

            <div class="containerfull mr30">
                <form action="index.php?pg=updateuser" method="post">
                    <label for="uname"><b>Tên đăng nhập</b></label>
                    <input type="text" value="<?php echo $username?>" name="username" id="username">
                    <br>
                    <label for="psw"><b>Mật khẩu</b></label>
                    <input type="password" value="<?php echo $pass?>" name="password" id="password">
                    <br>
                    <label for="uemail"><b>Tên</b></label>
                    <input type="text" value="<?php echo $ten?>" name="ten" id="ten" placeholder="Nhập tên ..">
                    <br>
                    <label for="uemail"><b>Email</b></label>
                    <input type="text" value="<?php echo $email?>" name="email">
                    <br>
                    <label for="uemail"><b>Địa chỉ</b></label>
                    <input type="text" value="<?php echo $diachi?>" name="diachi" id="diachi" placeholder="Nhập địa chỉ ..">
                    <br>
                    <label for="uemail"><b>Điện thoại</b></label>
                    <input type="text" value="<?php echo $dienthoai?>" name="dienthoai" id="dienthoai" placeholder="Nhập số điện thoại ..">
                    <br>
                    
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <button type="submit" name="btncapnhat">Cập nhật</button>


                    

                </form>
            </div>
        </div>


    </div>
</section>