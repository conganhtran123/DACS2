<?php
    if(isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
        extract($_SESSION['s_user']);
        $userinfo = get_user($id);
        extract($userinfo);
    }


?>


<div class="containerfull">
    <div class="bgbanner">THÔNG TIN THÀNH VIÊN</div>
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
            <h1>Thông tin thành viên</h1><br>

            <div class="containerfull mr30">
                <form action="" method="post">
                    <!-- <label for="uname"><b>Tên đăng nhập</b></label>
                    <?php echo $username?>
                    <br> -->
                    
                    <label for="uemail"><b>Tên</b></label>
                    <?php echo $ten?> 
                    <br>
                    <label for="uemail"><b>Email</b></label>
                    <?php echo $email?>
                    <br>
                    <label for="uemail"><b>Địa chỉ</b></label>
                    <?php echo $diachi?> 
                    <br>
                    <label for="uemail"><b>Điện thoại</b></label>
                    <?php echo $dienthoai?> 
                    <br>
                    
                    
                    <!-- <button type="submit" name="btncapnhat">Cập nhật</button> -->


                    

                </form>
            </div>
        </div>


    </div>
</section>