<?php
session_start();
ob_start();
include '../dao/pdo.php';
include '../dao/user.php';

  if (isset($_POST['login'])) {
    $uname = $_POST['uname'];
    $psw = $_POST['psw'];


    $useradmin = check_admin($uname, $psw);
    if (isset($useradmin) && (is_array($useradmin)) && (count($useradmin) > 0)) {
      extract($useradmin);
      if ($role == 1) {
        $_SESSION['useradmin'] = $useradmin;
        header('location: index.php');
      } else {
        $tb = 'Tài khoản không có quyền đăng nhập để quản trị';
      }
    } else {
      $tb = 'Tài khoản này sai hoặc tài khoản không tồn tại';
    }
  }


?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    form {
      border: 3px solid #f1f1f1;
    }

    .boxcenter {
      width: 500px;
      margin: 0 auto;
    }

    h2 {
      text-align: center;
    }

    input[type=text],
    input[type=password] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    button {
      background-color: #04AA6D;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
    }

    button:hover {
      opacity: 0.8;
    }

    .cancelbtn {
      width: auto;
      padding: 10px 18px;
      background-color: #f44336;
    }

    .imgcontainer {
      text-align: center;
      margin: 24px 0 12px 0;
    }

    img.avatar {
      width: 40%;
      border-radius: 50%;
    }

    .container {
      padding: 16px;
    }

    span.psw {
      float: right;
      padding-top: 16px;
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
      span.psw {
        display: block;
        float: none;
      }

      .cancelbtn {
        width: 100%;
      }
    }
  </style>
</head>

<body>

  <div class="boxcenter">
    <h2>Login Form</h2>

    <form action="login.php" method="post">
      <div class="imgcontainer">
        <img src="../layout/images/banner.webp" alt="Avatar" class="avatar">
      </div>

      <div class="container">
        <label for="uname"><b>Tên đăng nhập</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>

        <label for="psw"><b>Mật khẩu</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>
        <?php
        if (isset($tb) && ($tb != '')) {
          echo '<h3 style="color: red;">' . $tb . '</h3>';
        };


        ?>

        <button type="submit" name="login">Login</button>

    </form>
  </div>

</body>

</html>