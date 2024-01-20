<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

if (isset($_POST['btnguiemail'])) {

    $email = htmlentities($_POST['email']);
    $check_email = check_email($email);
    if (is_array($check_email) && count($check_email)) {
        $mkmoi = "mkmoi" . rand(1, 9999);
        update_password($mkmoi, $email);


        $subject = "Reset Password"; // Thay đổi chủ đề email tùy theo nhu cầu của bạn
        $message = "Mật khẩu được reset của bạn là: " . $mkmoi; // Thay đổi nội dung email tùy theo nhu cầu của bạn

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'conganh0905731703@gmail.com';
        $mail->Password = 'tyjc ivps vfal pkky'; // Thay your_password bằng mật khẩu tài khoản conganh0905731703@gmail.com
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->isHTML(true);
        $mail->setFrom('conganh0905731703@gmail.com'); // Địa chỉ người gửi
        $mail->addAddress($email); // Địa chỉ người nhận
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->send();
        $_SESSION['tbreset'] = 'Mật khẩu mới đã được gửi về mail của bạn. Vui lòng đăng nhập lại';

        header("Location: index.php?pg=dangnhap");
    } else {
        $_SESSION['tbemail'] = 'Email không tồn tại';
    }

    // exit(); // Đảm bảo dừng việc thực thi code sau khi chuyển hướng

}
?>

<div class="containerfull">
    <div class="bgbanner">QUÊN MẬT KHẨU</div>
</div>

<section class="containerfull">
    <div class="container">
        <div class="boxleft mr2pt menutrai">
            <h1>DÀNH CHO BẠN</h1><br><br>
            <a href="index.php?pg=dangky">Đăng ký</a>
            <a href="index.php?pg=dangnhap">Đăng nhập</a>

        </div>
        <div class="boxright">
            <h1>QUÊN MẬT KHẨU</h1><br>

            <div class="containerfull mr30">
                <form action="index.php?pg=quenmatkhau" method="post">
                    <label for="uemail"><b>Email</b></label>
                    <input type="text" placeholder="Enter Email" name="email">
                    <br>
                    <h3 style="color:red">
                        <?php
                        if (isset($_SESSION['tbemail']) && $_SESSION['tbemail']) {
                            echo $_SESSION['tbemail'];
                            unset($_SESSION['tbemail']);
                        }
                        ?>
                    </h3>



                    <button type="submit" name="btnguiemail">Gửi email</button>



                </form>
            </div>
        </div>


    </div>
</section>