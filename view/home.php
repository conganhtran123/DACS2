<?php
    $html_dssp_new = showsp($dssp_new);
    // foreach ($dssp_new as $sp) {
    //     extract($sp);
    //     if($bestseller == 1) {
    //         $best = '<div class="best"></div>';
    //     }else {
    //         $best = '';
    //     }
    //     $link = "index.php?pg=sanphamchitiet&idsp=".$id;
    //     $html_dssp_new .=   '<div class="box25 mr15">
    //                             '.$best.'
    //                             <a href="'.$link.'">
    //                                 <img src="layout/images/'.$img.'" alt="">
    //                             </a>
    //                             <span class="price">'.$price.' đ</span>
    //                             <button>Đặt hàng</button>
    //                         </div>' ;
    // }

    $html_dssp_best = showsp($dssp_best);
    // foreach ($dssp_best as $sp) {
    //     extract($sp);
    //     $link = "index.php?pg=sanphamchitiet&idsp=".$id;
    //     $html_dssp_best .=   '<div class="box25 mr15">
    //                             <div class="best"></div>
    //                             <a href="'.$link.'">
    //                                 <img src="layout/images/'.$img.'" alt="">
    //                             </a>
    //                             <span class="price">'.$price.' đ</span>
    //                             <button>Đặt hàng</button>
    //                         </div>' ;
    // }

    $html_dssp_view = showsp($dssp_view);
    // foreach ($dssp_view as $sp) {
    //     extract($sp);
    //     if($bestseller == 1) {
    //         $best = '<div class="best"></div>';
    //     }else {
    //         $best = '';
    //     }
    //     $link = "index.php?pg=sanphamchitiet&idsp=".$id;
    //     $html_dssp_view .=   '<div class="box25 mr15">
    //                             '.$best.'
    //                             <a href="'.$link.'">
    //                                 <img src="layout/images/'.$img.'" alt="">
    //                             </a>
    //                             <span class="price">'.$price.' đ</span>
    //                             <button>Đặt hàng</button>
    //                         </div>' ;
    // }

    $html_dssp_hot_ht = '';
    foreach ($dssp_hot_dm as $dm) {
        $html_dssp_hot_sp = get_dssp_hot_sp($dm['id'], 4);
        $html_dssp_hot = showsp($html_dssp_hot_sp);
        $html_dssp_hot_ht .= '<div class="row">
                                    <h2>'.$dm['name'].'</h2>
                                </div>
                                <div class="row">
                                    '.$html_dssp_hot.'
                                </div>';
        }

    
?>


    <div class="containerfull">
        <img src="layout/images/banner.webp" alt="">
    </div>

    

    <section class="containerfull">
        <div class="container">
            <h1>SẢN PHẨM HOT</h1><br>
            <div class="containerfull">
                <div class="box50 mr15">
                    <img src="uploads/anh2.jpg" alt="">
                </div>
                <?php 
                    echo $html_dssp_best;
                ?>
                <!-- <div class="box25 mr15">
                    <div class="best"></div>
                    <img src="layout/images/sp1.webp" alt="">
                    <span class="price">$1000</span>
                    <button>Đặt hàng</button>
                </div>
                <div class="box25 mr15">
                    <div class="best"></div>
                    <img src="layout/images/sp2.webp" alt="">
                    <span class="price">$1000</span>
                    <button>Đặt hàng</button>
                </div>
            </div> -->

            <div class="containerfull mr30">
                <h1>SẢN PHẨM MỚI</h1><br>
                <?php
                    echo $html_dssp_new;
                ?>
                <!-- <div class="box25 mr15">
                    <img src="layout/images/sp1.webp" alt="">
                    <span class="price">$1000</span>
                    <button>Đặt hàng</button>
                </div>
                <div class="box25 mr15">
                    <img src="layout/images/sp2.webp" alt="">
                    <span class="price">$1000</span>
                    <button>Đặt hàng</button>
                </div>
                <div class="box25 mr15">
                    <img src="layout/images/sp3.webp" alt="">
                    <span class="price">$1000</span>
                    <button>Đặt hàng</button>
                </div>
                <div class="box25 mr15">
                    <img src="layout/images/sp4.webp" alt="">
                    <span class="price">$1000</span>
                    <button>Đặt hàng</button>
                </div> -->
            </div>

            <div class="containerfull mr30">
                <h1>SẢN PHẨM NHIỀU NGƯỜI XEM</h1><br>
                <?php
                    echo $html_dssp_view;
                ?>
                <!-- <div class="box25 mr15">
                    <img src="layout/images/sp1.webp" alt="">
                    <span class="price">$1000</span>
                    <button>Đặt hàng</button>
                </div>
                <div class="box25 mr15">
                    <img src="layout/images/sp2.webp" alt="">
                    <span class="price">$1000</span>
                    <button>Đặt hàng</button>
                </div>
                <div class="box25 mr15">
                    <img src="layout/images/sp3.webp" alt="">
                    <span class="price">$1000</span>
                    <button>Đặt hàng</button>
                </div>
                <div class="box25 mr15">
                    <img src="layout/images/sp4.webp" alt="">
                    <span class="price">$1000</span>
                    <button>Đặt hàng</button>
                </div> -->
            </div>

        </div>
    </section>


    <section class="containerfull bg1 padd50">
        <div class="container">
            <h1>DANH MỤC SẢN PHẨM HOT</h1>
            <?php echo $html_dssp_hot_ht?>

        </div>
    </section>