<?php
$html_dm = showdanhmuc($dsdm);


$html_sp = showsp($dssp);
// $html_pt = showsp($sanphamtheotrang);
// foreach ($dssp as $sp) {
//     extract($sp);
//     if($bestseller == 1){
//         $best = '<div class="best"></div>';
//     }else {
//         $best = '';
//     }
    
//     $html_sp .= '<div class="box25 mr15 mb">
//                     '.$best.'
//                     <img src="layout/images/'.$img.'" alt="">
//                     <span class="price">'.$price.' đ</span>
//                     <button>Đặt hàng</button>
//                 </div>';
// }
if($titlepage != '') {
    $title = mb_strtoupper($titlepage, 'UTF-8');
}else {
    $title = 'SẢN PHẨM';
}

$html_tongtrang = '';
if(isset($_GET['iddm'])) {
    $iddm = $_GET['iddm'];
    $getiddm = '&iddm=' . $iddm;
}else {
    $getiddm = '';
}
if(isset($_GET['kyw'])) {
    $kyw = $_GET['kyw'];
    $lkkyw = '&kyw=' . $kyw;
}else {
    $lkkyw = '';
}
if(isset($_GET['timkiem'])) {
    $timkiem = $_GET['timkiem'];
    $gettimkiem = '&timkiem=' . $timkiem;
}else {
    $gettimkiem = '';
}

for ($i=1; $i <= $tongtrang; $i++) { 
    $html_tongtrang .= '<div class="circle"><a href="index.php?pg=sanpham'.$getiddm.''.$lkkyw.''.$gettimkiem.'&page='.$i.'">'.$i.'</a></div>';
}

?>


<div class="containerfull">
    <div class="bgbanner"><?php
        echo $title;
    ?></div>
</div>

<section class="containerfull">
    <div class="container">
        <div class="boxleft mr2pt menutrai">
            <h1>DANH MỤC</h1><br><br>
            <?php
            echo $html_dm;
            ?>
            <!-- <a href="#">Cà phê</a>
                <a href="#">Trái cây</a>
                <a href="#">Trà</a>
                <a href="#">Bánh</a> -->
        </div>
        <div class="boxright">
            <h1><?php
                echo $title;
            ?></h1><br>

            <div class="containerfull mr30">
                <?php
                // echo $html_sp;
                echo $html_sp;
                ?>
                
                <!--<div class="box25 mr15 mb">
                        <div class="best"></div>
                        <img src="layout/images/sp1.webp" alt="">
                        <span class="price">$1000</span>
                        <button>Đặt hàng</button>
                    </div>
                    <div class="box25 mr15 mb">
                        <img src="layout/images/sp2.webp" alt="">
                        <span class="price">$1000</span>
                        <button>Đặt hàng</button>
                    </div>
                    <div class="box25 mr15 mb">
                        <img src="layout/images/sp3.webp" alt="">
                        <span class="price">$1000</span>
                        <button>Đặt hàng</button>
                    </div>
                    <div class="box25 mr15 mb">
                        <img src="layout/images/sp4.webp" alt="">
                        <span class="price">$1000</span>
                        <button>Đặt hàng</button>
                    </div>
                    <div class="box25 mr15 mb">
                        <img src="layout/images/sp5.jpg" alt="">
                        <span class="price">$1000</span>
                        <button>Đặt hàng</button>
                    </div>
                    <div class="box25 mr15 mb">
                        <img src="layout/images/sp6.webp" alt="">
                        <span class="price">$1000</span>
                        <button>Đặt hàng</button>
                    </div>
                    <div class="box25 mr15 mb">
                        <img src="layout/images/sp7.webp" alt="">
                        <span class="price">$1000</span>
                        <button>Đặt hàng</button>
                    </div>
                    <div class="box25 mr15 mb">
                        <img src="layout/images/sp8.webp" alt="">
                        <span class="price">$1000</span>
                        <button>Đặt hàng</button>
                    </div> -->
            </div>
            <div class="muc">
                <!-- <div class="circle"><a href="index.php?pg=sanpham&page=1">1</a></div>
                <div class="circle"><a href="index.php?pg=sanpham&page=2">2</a></div>
                <div class="circle"><a href="index.php?pg=sanpham&page=3">3</a></div> -->
                <?php
                    echo $html_tongtrang;
                ?>
            </div>
                
        </div>


    </div>
</section>

<script>
    
</script>