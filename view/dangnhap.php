<?php



?>


<div class="containerfull">
    <div class="bgbanner">ĐĂNG NHẬP THÀNH VIÊN</div>
</div>

<section class="containerfull">
    <div class="container">
        <div class="boxleft mr2pt menutrai">
            <h1>DÀNH CHO BẠN</h1><br><br>
            <a href="index.php?pg=dangky">Đăng ký</a>
            
        </div>
        <div class="boxright">
            <h1>ĐĂNG NHẬP</h1><br>
            <h3 style="color:red">
                <?php
                    if(isset($_SESSION['tb']) && $_SESSION['tb']) {
                        echo $_SESSION['tb'];
                        unset($_SESSION['tb']);
                    }
                    if(isset($_SESSION['tbreset']) && $_SESSION['tbreset']) {
                        echo $_SESSION['tbreset'];
                        unset($_SESSION['tbreset']); 
                    }
                ?>
            </h3>
            <div class="containerfull mr30">
                <form action="index.php?pg=login" method="post">
                    <label for="uname"><b>Tên đăng nhập</b></label>
                    <input type="text" placeholder="Enter Username" name="username" id="username">
                    <br>
                    <label for="psw"><b>Mật khẩu</b></label>
                    <input type="password" placeholder="Enter Password" name="password" id="password">
                    <input type="hidden" name="bill" id="bill" value="<?php  if(isset($_GET['bill'])) echo $_GET['bill']?>">
                    
                    <button type="submit" name="btndangnhap">Đăng nhập</button>

                    <span class="psw"><a href="index.php?pg=quenmatkhau">Quên mật khẩu?</a></span>

                </form>
            </div>
        </div>


    </div>
</section>