<?php
session_start();
include "../dao/global.php";
include "../dao/pdo.php";
include "../dao/danhmuc.php";
include "../dao/sanpham.php";
include "../dao/user.php";
include "../dao/donhang.php";
include "../dao/thongke.php";

include "view/header.php";
if (!isset($_SESSION['useradmin'])) {
    header('location: login.php');
}
$tongtv = dem('users');
$tongsp = dem('sanpham');
$tongdm = dem('danhmuc');
$tongtt = tongtt();
$tongthanhtoan1 = 0;
foreach ($tongtt as $tt) {
    extract($tt);
    $tongthanhtoan1 += $tongthanhtoan;
}


if (isset($_GET['pg'])) {
    $pg = $_GET['pg'];
    switch ($pg) {
        case 'logout':
            if (isset($_SESSION['useradmin'])) {
                unset($_SESSION['useradmin']);
            }
            header('location: login.php');
            break;
        case 'users':
            $dsthanhvien = get_dsthanhvien();
            include "view/dsthanhvien.php";
            break;
        case 'bills':
            $donhang = get_donhangadmin();
            include "view/quanlidonhang.php";
            break;
        case 'sanphamlist':
            $sanphamlist = get_dssp_new(100);
            include "view/sanphamlist.php";
            break;
        case 'danhmuclist':
            $danhmuclist = danhmuc_all(100);
            include "view/danhmuclist.php";
            break;
        case 'updateproduct':
            //kiểm tra và lấy dữ liệu
            if (isset($_POST['updateproduct'])) {
                $name = $_POST['name'];
                $price = $_POST['price'];
                $soluong = $_POST['soluong'];

                $iddm = $_POST['iddm'];
                $id = $_POST['id'];
                $img = $_FILES['img']['name'];
                $mota = $_POST['description'];

                //upload hình

                if ($img != "") {
                    $target_file = IMG_PATH_ADMIN . $img;
                    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                } else {
                    $img = "";
                }


                //insert into
                sanpham_update($name, $img, $price,$soluong, $mota, $iddm, $id);
            }

            //show dssp
            $sanphamlist = get_dssp_new(100);
            include "view/sanphamlist.php";
            break;
        case 'updatedm':
            //kiểm tra và lấy dữ liệu
            if (isset($_POST['updatedm'])) {
                $name = $_POST['name'];
                $id = $_POST['id'];
                $hienthi = $_POST['hienthi'];
                //insert into
                danhmuc_update($name, $hienthi, $id);
            }

            //show dssdm
            $danhmuclist = danhmuc_all(100);
            include "view/danhmuclist.php";
            break;
        case 'sanphamadd':
            $danhmuclist = danhmuc_all();
            include "view/sanphamadd.php";
            break;
        case 'danhmucadd':
            $danhmuclist = danhmuc_all();
            include "view/danhmucadd.php";
            break;
        case 'delproduct':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $img = IMG_PATH_ADMIN . get_img($id);
                if (is_file($img)) {
                    unlink(($img));
                }
                try {
                    sanpham_delete($id);
                } catch (\Throwable $th) {
                    echo "<h3 style = 'color:red; text-align:center'>Sản phẩm đã có trong giỏ hàng không được quyền xóa!</h3>";
                }
            }

            //trở về trang dssp
            $sanphamlist = get_dssp_new(100);
            include "view/sanphamlist.php";
            break;
        case 'deldanhmuc':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                danhmuc_delete($id);
            }

            //trở về trang dsdm
            $danhmuclist = danhmuc_all(100);
            include "view/danhmuclist.php";
            break;
        case 'sanphamupdate':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $sp = get_sp_by_id($id);
            }
            //trở về trang dssp
            $danhmuclist = danhmuc_all();
            include "view/sanphamupdate.php";
            break;
        case 'danhmucupdate':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $dm = danhmuc_select_by_id($id);
            }
            //trở về trang dsdm
            $danhmuclist = danhmuc_all(100);
            include "view/danhmucupdate.php";
            break;
        case 'addproduct':
            if (isset($_POST['addproduct'])) {
                //lấy dữ liệu về
                $name = $_POST['name1'];
                $price = $_POST['price'];
                $iddm = $_POST['iddm'];
                $img = $_FILES['img']['name'];
                $soluong = $_POST['soluong'];
                $mota = $_POST['description'];

                //insert into
                sanpham_insert($name, $img, $soluong, $price, $mota, $iddm);

                //upload hình
                $target_file = IMG_PATH_ADMIN . $img;
                move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);

                //trở về trang dssp
                $sanphamlist = get_dssp_new(100);
                include "view/sanphamlist.php";
            } else {
                $danhmuclist = danhmuc_all();
                include "view/sanphamadd.php";
            }
            break;
        case 'adddm':
            if (isset($_POST['adddm'])) {
                //lấy dữ liệu về
                $name = $_POST['name'];
                $hienthi = $_POST['hienthi'];

                //insert into
                danhmuc_insert($name, $hienthi);

                //trở về trang dsdm
                $danhmuclist = danhmuc_all(100);
                include "view/danhmuclist.php";
            } else {
                $danhmuclist = danhmuc_all();
                include "view/danhmucadd.php";
            }
            break;


        default:
            if (isset($_POST['thongke'])) {
                $tungay = $_POST['tungay'];
                $denngay = $_POST['denngay'];

                $dm = thongketheongay($tungay, $denngay);
            }
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
