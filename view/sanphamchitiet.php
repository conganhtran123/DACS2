<!-- <style>
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
</style> -->

<?php
$_SESSION['previous_page'] = $_SERVER['REQUEST_URI'];
$html_dm = showdanhmuc($dsdm);
$html_spchitiet = '';

extract($spchitiet);
update_view($id, $view);
$html_spchitiet .= '<div class="col6 imgchitiet">
                            <img src="'.IMG_PATH.$img.'" alt="">
                        </div>
                        <div class="col6 textchitiet">
                            <h2>' . $name . '</h2>
                            <p>' . $price . ' đ</p>
                            <p>Số lượng còn lại: '. $soluong.'</p>
                            <p>Mô tả: '. $mota.'</p>
                            <form action="index.php?pg=addcart" method="post">
                                    <input type="hidden" name="idsp" value="' . $id . '">
                                    <input type="hidden" name="name" value="' . $name . '">
                                    <input type="hidden" name="img" value="' . $img . '">
                                    <input type="hidden" name="price" value="' . $price . '">
                                    <input type="number" name="soluong" id="" value="1" min="1" max="10" >
                                    <br><br>';
                                    
                                    if ($soluong > 0) {
                                        $html_spchitiet .= '<button type="submit" name="addcart">Đặt hàng</button>';
                                    }
                                    $html_spchitiet .= '</form></div>';

$html_sp_lienquan = showsp($splienquan);


// bình luận
// $dsbl = binhluan_select_all($_GET['idsp']);
// $html_bl = '';
// foreach ($dsbl as $bl) {
//     extract($bl);
//     $html_bl .= '<div class="comment">
//                         <div class="name">' . $tenuser . '</div>
//                         <div class="date">' . $ngaybl . '</div>
//                         <div class="content">' . $noidung . '</div>
//                     </div><br>';
// }

?>

<div class="containerfull">
    <div class="bgbanner">SẢN PHẨM CHI TIẾT</div>
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
            <h1>SẢN PHẨM CHI TIỂT</h1><br>
            <div class="containerfull mr30">
                <?php
                echo $html_spchitiet;
                ?>
                <h3 style="color:red">
                    <?php
                        if(isset($_SESSION['tbsoluong']) && $_SESSION['tbsoluong']) {
                            echo $_SESSION['tbsoluong'];
                            unset($_SESSION['tbsoluong']);
                        }
                    ?>
                </h3>
                <!-- <div class="col6 imgchitiet">
                        <img src="layout/images/hinh3.jpg" alt="">
                    </div>
                    <div class="col6 textchitiet">
                        <h2>TÊN SẢN PHẨM</h2>
                        <p>200 đ</p>
                        
                        <button>Đặt hàng</button>
                    </div> -->

            </div>
            <hr>
            <!-- test ajax -->
            <!-- <h1>BÌNH LUẬN</h1>

            <?php

            //if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
            ?>

                <input type="hidden" name="" id="idsp" value="<?php echo $_GET['idsp'] ?>">
                <textarea name="noidung" id="noidung" cols="125%" rows="5"></textarea>
                <button type="submit" name="guibinhluan" id="guibinhluan">Gửi bình luận</button>

            <?php
            // } else {
            //     $_SESSION['trang'] = "sanphamchitiet";
            //     $_SESSION['trangidsp'] = $_GET['idsp'];

            //     echo "<a href='index.php?pg=dangnhap' target='_parent'>Bạn phải đăng nhập mới có thể bình luận</a><br>";
            // }
            ?> -->
            <div id="binhluan">
                <iframe src="view/binhluan.php?idsp=<?php echo $id?>" width="100%" height="500px" frameborder="0"></iframe>

                <?php
                // echo $html_bl;
                ?>




            </div>


            <hr>
            <h1>SẢN PHẨM LIÊN QUAN</h1>
            <div class="containerfull mr30">
                <?php
                echo $html_sp_lienquan;
                ?>
                <!-- <div class="box25 mr15 mb">
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
                    </div> -->

            </div>
        </div>


    </div>
</section>

<script>
    // $("#guibinhluan").click(function() {
    //     alert('Đã bấm nút thành công');
    //     $.ajax({
    //             method: "POST",
    //             url: '/binhluan.php',
    //             data: {
    //                 idsp: $("#idsp").val(),
    //                 noidung: $("#noidung").val()
    //             }
    //         })

    //         .done(function(data) {
    //             // $("#dsbinhluan").append('<p>' + $("#noidung").val() + '</p>');
    //             $("#binhluan").append('<div class="comment">' +
    //                                     '<div class="name">'+ <?php //echo $_SESSION['s_user']['ten']
                                                                    ?> +'</div>' +
    //                                     '<div class="date">'+ date('H:i:s d/m/Y') +'</div>' +
    //                                     '<div class="content">'+ $("#noidung").val('') +'</div>' +
    //                                 '</div><br>');
    //             // $("#noidung").val('');
    //         })

    //         .fail(function(data) {
    //             alert('lỗi');
    //         });

    // });

    // $("#guibinhluan").click(function() {
    //     // alert('Đã bấm nút thành công');
    //     $.ajax({
    //             method: "POST",
    //             url: 'index.php?pg=binhluan',
    //             data: {
    //                 // idsp: 1,
    //                 // noidung: "nội dung"
    //                 idsp: $("#idsp").val(),
    //                 noidung: $("#noidung").val()
    //             }
    //         })
    //         .done(function(data) {
    //             var name = "<?php echo $_SESSION['s_user']['ten']; ?>";
    //             var currentDate = new Date().toLocaleString();
    //             var content = $("#noidung").val();

    //             var commentHtml = '<div class="comment">' +
    //                 '<div class="name">' + name + '</div>' +
    //                 '<div class="date">' + currentDate + '</div>' +
    //                 '<div class="content">' + content + '</div>' +
    //                 '</div><br>';

    //             $("#binhluan").append(commentHtml);
    //             $("#noidung").val('');
    //         })
    //         .fail(function(data) {
    //             alert('lỗi');
    //         });
    // });
</script>

