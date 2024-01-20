<?php
require_once 'pdo.php';

function sanpham_insert($name, $img,$soluong, $price,$mota, $iddm){
    $sql = "INSERT INTO sanpham(name, img,soluong, price,mota, iddm) VALUES (?,?,?,?,?,?)";
    pdo_query($sql, $name, $img,$soluong, $price,$mota, $iddm);
}

function sanpham_update($name, $img, $price,$soluong,$mota, $iddm, $id){
    if($img != ""){
        $sql = "UPDATE sanpham SET name=?,img=?,price=?,soluong=?,mota=?,iddm=? WHERE id=?";
        pdo_query($sql, $name, $img, $price,$soluong, $iddm, $id);
    }else{
        $sql = "UPDATE sanpham SET name=?,price=?,soluong=?,mota=?,iddm=? WHERE id=?";
        pdo_query($sql, $name, $price,$soluong,$mota, $iddm, $id);
    }
}

function sanpham_delete($id){
    $sql = "DELETE FROM sanpham WHERE  id=?";
    // if(is_array($ma_hh)){
    //     foreach ($ma_hh as $ma) {
    //         pdo_query($sql, $ma);
    //     }
    // }
    // else{
    pdo_query($sql, $id);
    // }
}


function get_dssp_new($limit)
{
    $sql = "SELECT * FROM sanpham order by id desc limit " . $limit;
    return pdo_query($sql);
}

function get_dssp_best($limit)
{
    $sql = "SELECT * FROM sanpham where bestseller=1 order by id desc limit " . $limit;
    return pdo_query($sql);
}

function get_dssp_view($limit)
{
    $sql = "SELECT * FROM sanpham order by view desc limit " . $limit;
    return pdo_query($sql);
}

function get_dssp_hot_dm($limit)
{
    $sql = "SELECT * FROM danhmuc where home=1 order by id desc limit " . $limit;
    return pdo_query($sql);
}
function get_dssp_hot_sp($iddm, $limit)
{
    $sql = "SELECT * FROM sanpham where iddm=? order by id desc limit " . $limit;
    return pdo_query($sql, $iddm);
}

function get_dssp_theodm($iddm, $kyw, $start, $sp1trang)
{
    $sql = "SELECT * FROM sanpham where 1";
    if (($iddm > 0)) {
        $sql .= " AND iddm= " . $iddm;
    }
    if (($kyw != '')) {
        $sql .= " AND name like '%" . $kyw . "%'";
    }
    // $sql .= " ORDER By id DESC limit ". $limit;
    $sql .= " ORDER By id DESC limit $start, $sp1trang";
    return pdo_query($sql);
}

function get_sanphamtheotrang($start, $sp1trang)
{
    $sql = "SELECT * FROM sanpham limit $start, $sp1trang";
    return pdo_query($sql);
}



function get_sp_by_id($id)
{
    $sql = "SELECT * FROM sanpham WHERE id=?";
    return pdo_query_one($sql, $id);
}

function get_dssp_lienquan($iddm, $idsp, $limit)
{
    $sql = "SELECT * FROM sanpham where iddm=? and id !=? order by id desc limit " . $limit;
    return pdo_query($sql, $iddm, $idsp);
}

function get_iddm($id)
{
    $sql = "SELECT iddm FROM sanpham where id=?";
    return pdo_query_value($sql, $id);
}

function get_tongsanphamtheodanhmuc($iddm, $kyw)
{
    $sql = "SELECT COUNT(id) FROM sanpham where 1";
    if ($iddm > 0) {
        $sql .= " AND iddm= " . $iddm;
    }
    if (($kyw != '')) {
        $sql .= " AND name like '%" . $kyw . "%'";
    }
    return pdo_query_value($sql);
}

function get_tongsplsmuahang($iduser)
{
    $sql = "SELECT COUNT(id) FROM bill where iduser=?";
    return pdo_query_value($sql, $iduser);
}
function get_madh($idbill)
{
    $sql = "SELECT madh FROM bill where id=?";
    return pdo_query_value($sql, $idbill);
}

function get_dssp_lsmuahang($iduser, $start, $sp1trang)
{
    $sql = "SELECT * FROM bill where iduser=? limit $start, $sp1trang";
    return pdo_query($sql, $iduser);
}

function update_view($id, $view) {
    $tang = $view + 1;
    $sql = "UPDATE sanpham SET view=".$tang." WHERE id=?";
    pdo_query($sql, $id);
}



//phân trang
function phantrang_sanpham($iddm, $kyw, $sp1trang) {
    
    $trang = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($trang - 1) * $sp1trang;

    return get_dssp_theodm($iddm, $kyw, $start, $sp1trang);
}

function laysp($limit) {
    $query = "SELECT * FROM sanpham ORDER BY view DESC limit " . $limit;
    return pdo_query($query);
}
function chinhbestseller($limit) {
    // Đánh dấu tất cả các sản phẩm là không phải bestseller
    $updateAllQuery = "UPDATE sanpham SET bestseller = 0";
    pdo_query($updateAllQuery);

    // Lấy danh sách $limit sản phẩm có lượt xem cao nhất và cập nhật trường bestseller
    $result = laysp($limit);
    foreach ($result as $row) {
        $id = $row['id'];
        $updateQuery = "UPDATE sanpham SET bestseller=1 where id=?";
        pdo_query($updateQuery, $id);
    }
    
}

function showsp($dssp)
{

    $_SESSION['previous_page'] = $_SERVER['REQUEST_URI'];
    $html_dssp = '';

    foreach ($dssp as $sp) {
        extract($sp);
        if ($soluong == 0) {
            $hethang = '<div class="hethang"></div>';
        } else {
            $hethang = '';
        }
        if ($bestseller == 1) {
            $best = '<div class="best"></div>';
        } else {
            $best = '';
        }
        $link = "index.php?pg=sanphamchitiet&idsp=" . $id;
        $html_dssp .=   '<div class="box25 mr15">
                    ' . $best . '
                    ' . $hethang . '
                    <a href="' . $link . '">
                        <img src="' . IMG_PATH . $img . '" alt="">';
        // update_view($id, $view);
        $html_dssp .= '</a>
                    
                    <span class="price">' . $name . '</span>
                    <span class="price">' . $price . ' đ</span>
                    <form action="index.php?pg=addcart" method="post">
                        <input type="hidden" name="idsp" value="' . $id . '">
                        <input type="hidden" name="name" value="' . $name . '">
                        <input type="hidden" name="img" value="' . $img . '">
                        <input type="hidden" name="price" value="' . $price . '">
                        <input type="hidden" name="soluong" value="1">';
        if ($soluong > 0) {
            $html_dssp .= '<button type="submit" name="addcart">Đặt hàng</button>';
        }
        $html_dssp .= '</form></div>';
    }
    return $html_dssp;
}

function get_soluong($idsp)
{
    $sql = "SELECT soluong FROM sanpham where id=?";
    return pdo_query_value($sql, $idsp);
}
function update_slsp($soluong, $idsp)
{
    $sql = "UPDATE sanpham SET soluong=? WHERE id=?";
    pdo_execute($sql, $soluong, $idsp);
}
//admin

function get_img($id)
{
    $sql = "SELECT img FROM sanpham WHERE id=?";
    $getimg = pdo_query_one($sql, $id);
    return $getimg['img'];
}

function showsp_admin($dssp) {
    $html_dssp = '';
    $i=1;
    foreach ($dssp as $sp) {
        extract($sp);
        if($bestseller == 1) {
            $best = '<div class="best"></div>';
        }else {
            $best = '';
        }
        $link = "index.php?pg=sanphamchitiet&idsp=".$id;
        $html_dssp .=   '<tr>
                            <td>'.$i.'</td>
                            <td><img src="'.IMG_PATH_ADMIN.$img.'" alt = '.$name.' width ="80px"/></td>
                            <td>'.$name.'</td>
                            <td>'.$price.'</td>
                            <td>'.$soluong.'</td>

                            <td>'.$view.'</td>
                            <td>'.$mota.'</td>
                            <td>
                            <a href="index.php?pg=sanphamupdate&id='.$id.'" class="btn btn-warning"
                                ><i class="fa-solid fa-pen-to-square"></i> Sửa</a
                            >
                            <a href="index.php?pg=delproduct&id='.$id.'" class="btn btn-danger"
                                ><i class="fa-solid fa-trash"></i> Xóa</a
                            >
                            </td>
                        </tr>' ;
    $i++;
    }
    return $html_dssp;
}
function show_dsthanhvien($dssp) {
    $html_dssp = '';
    $i=1;
    foreach ($dssp as $sp) {
        extract($sp);
        $html_dssp .=   '<tr>
                            <td>'.$i.'</td>
                            <td>'.$ten.'</td>
                            <td>'.$email.'</td>
                            <td>'.$diachi.'</td>
                            <td>'.$dienthoai.'</td>
                        </tr>' ;
    $i++;
    }
    return $html_dssp;
}

// function hang_hoa_exist($ma_hh){
//     $sql = "SELECT count(*) FROM hang_hoa WHERE ma_hh=?";
//     return pdo_query_value($sql, $ma_hh) > 0;
// }

// function hang_hoa_tang_so_luot_xem($ma_hh){
//     $sql = "UPDATE hang_hoa SET so_luot_xem = so_luot_xem + 1 WHERE ma_hh=?";
//     pdo_execute($sql, $ma_hh);
// }

// function hang_hoa_select_top10(){
//     $sql = "SELECT * FROM hang_hoa WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0, 10";
//     return pdo_query($sql);
// }

// function hang_hoa_select_dac_biet(){
//     $sql = "SELECT * FROM hang_hoa WHERE dac_biet=1";
//     return pdo_query($sql);
// }

// function hang_hoa_select_by_loai($ma_loai){
//     $sql = "SELECT * FROM hang_hoa WHERE ma_loai=?";
//     return pdo_query($sql, $ma_loai);
// }

// function hang_hoa_select_keyword($keyword){
//     $sql = "SELECT * FROM hang_hoa hh "
//             . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
//             . " WHERE ten_hh LIKE ? OR ten_loai LIKE ?";
//     return pdo_query($sql, '%'.$keyword.'%', '%'.$keyword.'%');
// }

// function hang_hoa_select_page(){
//     if(!isset($_SESSION['page_no'])){
//         $_SESSION['page_no'] = 0;
//     }
//     if(!isset($_SESSION['page_count'])){
//         $row_count = pdo_query_value("SELECT count(*) FROM hang_hoa");
//         $_SESSION['page_count'] = ceil($row_count/10.0);
//     }
//     if(exist_param("page_no")){
//         $_SESSION['page_no'] = $_REQUEST['page_no'];
//     }
//     if($_SESSION['page_no'] < 0){
//         $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
//     }
//     if($_SESSION['page_no'] >= $_SESSION['page_count']){
//         $_SESSION['page_no'] = 0;
//     }
//     $sql = "SELECT * FROM hang_hoa ORDER BY ma_hh LIMIT ".$_SESSION['page_no'].", 10";
//     return pdo_query($sql);
// }