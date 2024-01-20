<?php
session_start();
ob_start();
if (!isset($_SESSION['giohang'])) {
    $_SESSION['giohang'] = [];
}
// nhúng kết nối csdl
include 'dao/user.php';
include 'dao/pdo.php';
include 'dao/danhmuc.php';
include 'dao/sanpham.php';
include 'dao/giohang.php';
include 'dao/donhang.php';
include 'dao/binhluan.php';
include 'dao/global.php';
include 'view/header.php';



// data dành cho trang chủ
$dssp_new = get_dssp_new(4);
$dssp_best = get_dssp_best(2);
$dssp_view = get_dssp_view(4);
$dssp_hot_dm = get_dssp_hot_dm(4);
chinhbestseller(4);



if (!isset($_GET['pg'])) {
    include 'view/home.php';
} else {
    switch ($_GET['pg']) {
        case 'sanpham':
            $dsdm = danhmuc_all();

            $kyw = '';
            $titlepage = '';


            if (isset($_GET['iddm'])) {
                $iddm = $_GET['iddm'];
                $titlepage = get_name_dm($iddm);
            } else {
                $iddm = 0;
                $titlepage = '';
            }

            // kiếm tra có phải là form search khong
            if (isset($_GET['timkiem']) && ($_GET['timkiem'] != '') && ($_GET['kyw'] != '')) {
                $kyw = $_GET['kyw'];
                $titlepage = 'Kết quả tìm kiếm với từ khóa: <span>' . $kyw . '</span>';
            }




            //phân trang trong sp
            $tongsanpham = get_tongsanphamtheodanhmuc($iddm, $kyw);
            $sp1trang = 4;
            $tongtrang = ceil((int)$tongsanpham / $sp1trang);
            // $trang = isset($_GET['page']) ? $_GET['page'] : 1;
            // $start = ($trang - 1) * $sp1trang;

            // $dssp = get_dssp_theodm($iddm, $kyw, $start, $sp1trang);
            $dssp = phantrang_sanpham($iddm, $kyw, $sp1trang);
            // $sanphamtheotrang = get_sanphamtheotrang($start, $sp1trang);

            include 'view/sanpham.php';
            break;
        case 'sanphamchitiet':
            if (isset($_GET['idsp'])) {
                $id = $_GET['idsp'];
                $dsdm = danhmuc_all();
                $spchitiet = get_sp_by_id($id);
                // $iddm = $spchitiet['iddm'];
                $iddm = get_iddm($id);
                $splienquan = get_dssp_lienquan($iddm, $id, 4);
                include 'view/sanphamchitiet.php';
                break;
            } else {
                include 'view/home.php';
            }
        case 'addcart':
            if (isset($_POST['addcart'])) {

                $idsp = $_POST['idsp'];
                $soluong = $_POST['soluong'];
                $slconlai = get_soluong($idsp);
                if ($soluong > $slconlai) {
                    $_SESSION['tbsoluong'] = 'Số lượng vượt quá số sản phẩm trong kho';
                    header('location: index.php?pg=sanphamchitiet&idsp=' . $idsp);
                } else {

                    $name = $_POST['name'];
                    $img = $_POST['img'];
                    $price = $_POST['price'];

                    $thanhtien = $soluong * $price;

                    $sp =  array("idsp" => $idsp, "name" => $name, "img" => $img, "price" => $price, "soluong" => $soluong, "thanhtien" => $thanhtien);
                    // array_push($_SESSION['giohang'], $sp);

                    $kt = 0;
                    if (isset($_SESSION['giohang'])) {
                        foreach ($_SESSION['giohang'] as &$sp1) {
                            if ($idsp == $sp1['idsp']) {
                                $kt = 1;
                                $soluong += $sp1['soluong'];
                                $thanhtien = $soluong * $price;
                                // $_SESSION['giohang']['soluong'] = $soluong;
                                // $_SESSION['giohang']['thanhtien'] = $thanhtien;
                                $sp1['soluong'] = $soluong;
                                $sp1['thanhtien'] = $thanhtien;
                                break;
                            }
                        }
                    }

                    if ($kt == 0) {
                        array_push($_SESSION['giohang'], $sp);
                    }

                    if (isset($_SESSION['previous_page'])) {
                        // Lấy URL của trang trước đó từ biến session
                        $previous_page = $_SESSION['previous_page'];
                        // Xóa URL của trang trước đó khỏi phiên làm việc
                        unset($_SESSION['previous_page']);
                        // Chuyển hướng trình duyệt đến trang trước đó
                        header('Location: ' . $previous_page);
                        exit;
                    } else {
                        // Nếu không có URL của trang trước đó, bạn có thể chuyển hướng trình duyệt đến một trang mặc định
                        header('Location: index.php');
                        exit;
                    }
                    // echo var_dump($_SESSION['giohang']);
                    // header('location: index.php?pg=viewcart');
                }
            }
            // include 'view/gioithieu.php';
            break;
        case 'viewcart':

            if (isset($_GET['del']) && ($_GET['del'] == 1)) {
                // $_SESSION['giohang'] = [];
                // remove trực tiếp giỏ hàng ra khỏi session luôn
                unset($_SESSION['giohang']);
                header('location: index.php');
            } else {
                if (isset($_SESSION['giohang'])) {
                    $tongdonhang = get_tongdonhang();
                }
                $giatrivoucher = 0;
                if (isset($_GET['voucher']) && ($_GET['voucher'] == 1)) {
                    $tongdonhang = $_POST['tongdonhang'];
                    $mavoucher = $_POST['mavoucher'];
                    // so sánh với database để lấy giá trị về
                    $mavoucher = $_POST['mavoucher'];
                    $giatrivoucher = get_giatrivoucher($mavoucher);
                    $_SESSION['giatrivoucher'] = $giatrivoucher;
                }

                $thanhtoan = $tongdonhang - $giatrivoucher;
                include 'view/viewcart.php';
            }

            break;

        case 'dangky':
            include 'view/dangky.php';
            break;
        case 'adduser':
            //xác định giá trị input
            if (isset($_POST['btndangky'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $ten = $_POST['name'];

                user_insert($username, $password, $ten, $email);
                include 'view/dangnhap.php';
            }

            break;
        case 'updateuser':
            //xác định giá trị input
            if (isset($_POST['btncapnhat'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $ten = $_POST['ten'];
                $dienthoai = $_POST['dienthoai'];
                $diachi = $_POST['diachi'];
                $id = $_POST['id'];
                $role = 0;
                //xử lí 
                user_update($username, $password, $email, $ten, $dienthoai, $diachi, $role, $id);
                $_SESSION['s_user'] = get_user($id);
                include 'view/myaccout_confirm.php';
            }

            break;
        case 'myaccout_confirm':
            include 'view/myaccout_confirm.php';
            break;

        case 'login':
            // input
            //xử lí

            if (isset($_POST['btndangnhap'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $bill = $_POST['bill'];

                //xử lí: kiểm tra
                $check_user = check_user($username, $password);
                if (is_array($check_user) && count($check_user)) {
                    $_SESSION['s_user'] = $check_user;

                    //out
                    if ($bill == 1) { // đăng nhập từ trang giỏ hàng
                        header('location: index.php?pg=donhang');
                    } else if (($_SESSION['trang'] == "sanphamchitiet")) { // đăng nhập vào trang bình luận
                        header('location: index.php?pg=sanphamchitiet&idsp=' . $_SESSION['trangidsp'] . '#binhluan');
                        unset($_SESSION['trang']);
                        unset($_SESSION['trangidsp']);
                    } else { // về lại trang chủ
                        header('location: index.php');
                    }
                } else {
                    $tb = 'Tài khoản không tồn tại hoặc thông tin đăng nhập sai';
                    $_SESSION['tb'] = $tb;
                    header('location: index.php?pg=dangnhap');
                }
            }
            break;
        case 'dangnhap':
            include 'view/dangnhap.php';

            break;
        case 'logout':
            if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
                unset($_SESSION['s_user']);
            }
            header('location: index.php');

            break;
        case 'myaccout':
            if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
                include 'view/myaccout.php';
            }

            break;
        case 'lichsumuahang':
            $iduser = $_SESSION['s_user']['id'];
            // $lichsumuahang = get_lsmuahang($iduser);
            $tongsanpham = get_tongsplsmuahang($iduser);
            $sp1trang = 10;
            $tongtrang = ceil((int)$tongsanpham / $sp1trang);
            $trang = isset($_GET['page']) ? $_GET['page'] : 1;
            $start = ($trang - 1) * $sp1trang;

            $dssp = get_dssp_lsmuahang($iduser, $start, $sp1trang);





            include 'view/lichsumuahang.php';
            break;
        case 'donhangsubmit':
            if (isset($_POST['donhangsubmit'])) {
                $nguoidat_ten = $_POST['hoten'];
                $nguoidat_diachi = $_POST['diachi'];
                $nguoidat_email = $_POST['email'];
                $nguoidat_dienthoai = $_POST['dienthoai'];

                $nguoinhan_ten = $_POST['hoten_nguoinhan'];
                if ($nguoinhan_ten == '') {
                    $nguoinhan_ten = $nguoidat_ten;
                }
                $nguoinhan_diachi = $_POST['diachi_nguoinhan'];
                if ($nguoinhan_diachi == '') {
                    $nguoinhan_diachi = $nguoidat_diachi;
                }
                $nguoinhan_dienthoai = $_POST['dienthoai_nguoinhan'];
                if ($nguoinhan_dienthoai == '') {
                    $nguoinhan_dienthoai = $nguoidat_dienthoai;
                }

                $ptthanhtoan = '1';




                $iduser = $_SESSION['s_user']['id'];
                $role = 0;
                //xử lí 
                user_update_donhang($nguoidat_ten, $nguoidat_diachi, $nguoidat_email, $nguoidat_dienthoai, $role, $iduser);
                $_SESSION['s_user'] = get_user($iduser);

                // tạo đơn hàng
                $total = get_tongdonhang();
                $ship = 0;
                if (isset($_SESSION['giatrivoucher'])) {
                    $voucher = $_SESSION['giatrivoucher'];
                } else {
                    $voucher = 0;
                }
                $tongthanhtoan = ($total - $voucher) + $ship;
                $madh = "newfood" . $iduser . '-' . date('His-dmY');
                $ngaydat = date('d/m/Y');
                $idbill = bill_insert_id(
                    $madh,
                    $ngaydat,
                    $iduser,
                    $nguoidat_ten,
                    $nguoidat_email,
                    $nguoidat_dienthoai,
                    $nguoidat_diachi,
                    $nguoinhan_ten,
                    $nguoinhan_diachi,
                    $nguoinhan_dienthoai,
                    $total,
                    $ship,
                    $voucher,
                    $tongthanhtoan,
                    $ptthanhtoan
                );

                // insert giỏ hàng từ session vào table cart
                foreach ($_SESSION['giohang'] as $sp) {
                    extract($sp);
                    $soluong1 = (int)get_soluong($idsp) - $sp['soluong'];
                    update_slsp($soluong1, $idsp);
                    cart_insert($idsp, $price, $name, $img, $soluong, $thanhtien, $idbill);
                }
                unset($_SESSION['giohang']);
                // include 'view/donhang_confirm.php';
                unset($_SESSION['giatrivoucher']);
            }




            header('location: index.php?pg=donhangconfirm&id=' . $idbill);

            break;

            // case 'momo':


            //     //thanh toán momo

            //     $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
            //     $partnerCode = 'MOMOBKUN20180529';
            //     $accessKey = 'klm05TvNBzhg7h7j';
            //     $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';


            //     $orderInfo = "Thanh toán qua Mã QR MoMo";
            //     $amount = "10000";
            //     $orderId = time() . ""; //tạo cho mình chuỗi đơn hàng
            //     $redirectUrl = "index.php?pg=donhangconfirm"; // trang trả về
            //     $ipnUrl = "index.php?pg=donhangconfirm"; // trang truy vấn kết quả
            //     $extraData = "";




            //     $requestId = time() . "";
            //     $requestType = "captureWallet";
            //     // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
            //     //before sign HMAC SHA256 signature
            //     $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount .
            //         "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" .
            //         $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode .
            //         "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId .
            //         "&requestType=" . $requestType;
            //     $signature = hash_hmac("sha256", $rawHash, $secretKey);
            //     var_dump($signature);
            //     echo '<br>';
            //     $data = array(
            //         'partnerCode' => $partnerCode,
            //         'partnerName' => "Test",
            //         "storeId" => "MomoTestStore",
            //         'requestId' => $requestId,
            //         'amount' => $amount,
            //         'orderId' => $orderId,
            //         'orderInfo' => $orderInfo,
            //         'redirectUrl' => $redirectUrl,
            //         'ipnUrl' => $ipnUrl,
            //         'lang' => 'vi',
            //         'extraData' => $extraData,
            //         'requestType' => $requestType,
            //         'signature' => $signature
            //     );
            //     echo '<br>';
            //     var_dump($data);
            //     $result = execPostRequest($endpoint, json_encode($data));
            //     echo '<br>';
            //     var_dump($result);
            //     $jsonResult = json_decode($result, true);  // decode json
            //     echo '<br>';
            //     var_dump($jsonResult);


            //     //Just a example, please check more in there

            //     // header('location: ' . $jsonResult['payUrl']);

            //     break;
        case 'donhangconfirm':
            $idbill = $_GET['id'];
            include 'view/donhang_confirm.php';
            break;
        case 'donhang':
            if (isset($_SESSION['giohang'])) {
                $tongdonhang = get_tongdonhang();
                $voucher = 0;
                if (isset($_SESSION['giatrivoucher'])) {
                    $voucher = $_SESSION['giatrivoucher'];
                }
                $ship = 0;
                $tongthanhtoan = ($tongdonhang - $voucher) + $ship;
            }
            include 'view/donhang.php';
            break;
        case 'xoasp':
            if (isset($_GET['idsp'])) {
                foreach ($_SESSION['giohang'] as $key => $sp) {
                    if ($sp['idsp'] == $_GET['idsp']) {
                        unset($_SESSION['giohang'][$key]);
                        break;
                    }
                }
                header('location: index.php?pg=viewcart');


                // include 'view/viewcart.php';
            }

            break;
        case 'tangsoluong':
            if (isset($_SESSION['giohang'])) {
                $idsp = $_GET['idsp'];
                foreach ($_SESSION['giohang'] as &$sp1) {
                    if ($idsp == $sp1['idsp']) {

                        $soluong = $sp1['soluong'] + 1;
                        if ($soluong <= get_soluong($idsp)) {
                            $thanhtien = $soluong * $sp1['price'];
                            // $_SESSION['giohang']['soluong'] = $soluong;
                            // $_SESSION['giohang']['thanhtien'] = $thanhtien;
                            $sp1['soluong'] = $soluong;
                            $sp1['thanhtien'] = $thanhtien;
                            break;
                        }
                    }
                }
            }
            header('location: index.php?pg=viewcart');
            break;
        case 'giamsoluong':
            if (isset($_SESSION['giohang'])) {
                $idsp = $_GET['idsp'];
                foreach ($_SESSION['giohang'] as &$sp1) {
                    if ($idsp == $sp1['idsp']) {

                        $soluong = $sp1['soluong'] - 1;
                        if ($soluong > 0) {
                            $thanhtien = $soluong * $sp1['price'];
                            // $_SESSION['giohang']['soluong'] = $soluong;
                            // $_SESSION['giohang']['thanhtien'] = $thanhtien;
                            $sp1['soluong'] = $soluong;
                            $sp1['thanhtien'] = $thanhtien;
                            break;
                        }
                    }
                }
            }
            header('location: index.php?pg=viewcart');
            break;
        case 'xacnhandonhang':
            if (isset($_GET['idbill'])) {
                $idbill = $_GET['idbill'];
            }
            include 'view/xacnhandonhang.php';
            break;
        case 'xacnhan':
            header('location: index.php');
            break;
        case 'dichvu':
            include 'view/dichvu.php';
            break;
        case 'quenmatkhau':
            
            
            include 'view/quenmatkhau.php';
            break;
        case 'lienhe':
            include 'view/lienhe.php';
            break;
        default:
            include 'view/home.php';
            break;
    }
}


include 'view/footer.php';
