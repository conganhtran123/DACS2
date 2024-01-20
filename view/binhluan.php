<style>
    /* comment */
    .comment {
        /* border: 1px solid #ccc; */
        background-color: #fff;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 10px;
    }

    .comment .name {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .comment .date {
        font-size: 0.8em;
        color: #888;
    }

    .comment .content {
        margin-top: 5px;

    }
</style>
<?php
    session_start();
    ob_start();
    include '../dao/pdo.php';
    include '../dao/binhluan.php';
    
    if(isset($_GET['idsp'])) {
        $idsp = $_GET['idsp'];
    }
    if(isset($_POST['guibinhluan'])) {
        $idsp = $_POST['idsp'];
        $noidung = $_POST['noidung'];
        $ngaybl = date('H:i:s d/m/Y');
        $iduser = $_SESSION['s_user']['id'];
        $tenuser = $_SESSION['s_user']['ten'];
        binhluan_insert($idsp, $iduser, $tenuser, $noidung, $ngaybl);
    }

    $dsbl = binhluan_select_all($idsp);
    $html_bl = '';
    foreach($dsbl as $bl) {
        extract($bl);
        $html_bl .= '<div class="comment">
                        <div class="name">'.$tenuser.'</div>
                        <div class="date">'.$ngaybl.'</div>
                        <div class="content">'.$noidung.'</div>
                    </div><br>';
    }
?>

<h1>BÌNH LUẬN</h1>
<?php
    if(isset($_SESSION['s_user']) && (count($_SESSION['s_user'])>0)){
        
    
?>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <input type="hidden" name="idsp" id="" value="<?php echo $idsp?>">
    <textarea name="noidung" id="" cols="100%" rows="5"></textarea><br>
    <button type="submit" name="guibinhluan">Gửi bình luận</button>
</form>
<?php
    }else {
        $_SESSION['trang'] = "sanphamchitiet";
        $_SESSION['trangidsp'] = $_GET['idsp'];

        echo "<a href='../index.php?pg=dangnhap' target='_parent'>Bạn phải đăng nhập mới có thể bình luận</a><br>";
    }
?>

<div class="dsbl">
    <?php
    echo $html_bl;
    ?>
     <!-- <p>Nội dung
    <br>
    Tennguoibl - (ngaybl)
    </p>  -->
</div>

