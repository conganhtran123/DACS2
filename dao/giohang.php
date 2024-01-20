<?php

function cart_insert($idsp, $price, $name, $img, $soluong, $thanhtien, $idbill)
{
    $sql = "INSERT INTO cart(idsp, price, name, img,soluong,thanhtien,idbill) VALUES (?, ?, ?, ?, ?, ?, ?)";
    pdo_execute($sql, $idsp, $price, $name, $img, $soluong, $thanhtien, $idbill);
}

function viewcart()
{
    $html_cart = '';
    $i = 1;
    foreach ($_SESSION['giohang'] as $sp) {
        extract($sp);
        // $tt = $price*$soluong;
        $html_cart .= '<tr>
                            <td>' . $i . '</td>
                            <td><img src="' . IMG_PATH . $img . '" alt="" width=100px height=100px></td>
                            <td>' . $name . '</td>
                            <td>' . $price . '</td>
                            
                            
                            <td><div class="cart-item">

                                <span class="quantity">
                                    <a href="index.php?pg=tangsoluong&idsp='.$idsp.'"><button class="quantity increase-quantity">+</button></a>
                                    <label>' . $soluong . '</label>
                                    <a href="index.php?pg=giamsoluong&idsp='.$idsp.'"><button class="quantity decrease-quantity">-</button></a>
                                </span>
                            </div></td>
                            <td>' . $thanhtien . '</td>
                            <td><a href="index.php?pg=xoasp&idsp=' . $idsp . '">Xóa</a></td>
                        </tr>';
        $i++;
    }
    return $html_cart;
}
function get_tongdonhang()
{
    $tong = 0;
    foreach ($_SESSION['giohang'] as $sp) {
        extract($sp);
        $tt = $price * $soluong;
        $tong += $tt;
    }
    return $tong;
}

function get_giatrivoucher($mavoucher)
{
    $sql = "SELECT tien FROM voucher where mavoucher=?";
    return pdo_query_value($sql, $mavoucher);
}

