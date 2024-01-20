<?php



?>


<div class="containerfull">
    <div class="bgbanner">ĐĂNG KÝ THÀNH VIÊN</div>
</div>

<section class="containerfull">
    <div class="container">
        <div class="boxleft mr2pt menutrai">
            <h1>DÀNH CHO BẠN</h1><br><br>
            <a href="index.php?pg=dangnhap">Đăng nhập</a>
            
        </div>
        <div class="boxright">
            <h1>ĐĂNG KÝ</h1><br>

            <div class="containerfull mr30">
                <form action="index.php?pg=adduser" method="post">
                    <label for="uname"><b>Tên đăng nhập</b></label>
                    <input type="text" placeholder="Enter Username" name="username" id="username">
                    <br>
                    <label for="psw"><b>Mật khẩu</b></label>
                    <input type="password" placeholder="Enter Password" name="password" id="password">
                    <br>
                    <label for="psw"><b>Nhập lại mật khẩu</b></label>
                    <input type="password" placeholder="Enter Password Again" name="repassword" id="repassword">
                    <br>
                    <label for="uemail"><b>Email</b></label>
                    <input type="text" placeholder="Enter Email" name="email">
                    <br>
                    <label for="uemail"><b>Tên</b></label>
                    <input type="text" placeholder="Enter name" name="name">
                    <br>
                    <button type="submit" name="btndangky">Đăng ký</button>


                    

                </form>
            </div>
        </div>


    </div>
</section>