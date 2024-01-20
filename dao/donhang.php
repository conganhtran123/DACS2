<?php
// require_once 'pdo.php';


function bill_insert_id($madh, $ngaydat,$iduser, $nguoidat_ten, $nguoidat_email, $nguoidat_dienthoai,
 $nguoidat_diachi, $nguoinhan_ten, $nguoinhan_diachi,$nguoinhan_dienthoai,$total,
 $ship,$voucher,$tongthanhtoan,$ptthanhtoan){
    $sql = "INSERT INTO bill(madh,ngaydat, iduser, nguoidat_ten, nguoidat_email, nguoidat_dienthoai,
     nguoidat_diachi,nguoinhan_ten, nguoinhan_diachi, nguoinhan_dienthoai, total,
     ship, voucher,tongthanhtoan,ptthanhtoan) VALUES (?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?)";
    return pdo_execute_id($sql, $madh,$ngaydat, $iduser, $nguoidat_ten, $nguoidat_email, $nguoidat_dienthoai,
    $nguoidat_diachi, $nguoinhan_ten, $nguoinhan_diachi,$nguoinhan_dienthoai,$total,
    $ship,$voucher,$tongthanhtoan,$ptthanhtoan);

}


function select_bill($id) {
    $sql = "SELECT * FROM bill WHERE id=?";
    return pdo_query_one($sql, $id);
}

function select_carttheobill($id) {
    $sql = "SELECT * FROM cart WHERE id=?";
    return pdo_query($sql, $id);
}

function get_lsmuahang($iduser) {
    $sql = "SELECT * FROM bill WHERE iduser=?";
    return pdo_query($sql, $iduser);
}

function get_sptronglsmh($idbill) {
    $sql = "SELECT * FROM cart WHERE idbill=?";
    return pdo_query($sql, $idbill);
}

function get_donhangadmin() {
    $sql = "SELECT * FROM bill";
    return pdo_query($sql);
}

function show_donhangadmin($dssp) {
    $html_dssp = '';
    $i=1;
    foreach ($dssp as $sp) {
        extract($sp);
        switch ($ptthanhtoan) {
            case '1':
                $pttt1 = 'Tiền mặt';
                break;
            
            default:
                $pttt1 = 'Momo';
                break;
        }
        $html_dssp .=   '<tr>
                            <td>'.$i.'</td>
                            <td>'.$madh.'</td>
                            <td>'.$ngaydat.'</td>
                            <td>'.$nguoidat_ten.'</td>
                            <td>'.$nguoidat_dienthoai.'</td>
                            <td>'.$nguoidat_diachi.'</td>
                            <td>'.$nguoinhan_ten.'</td>
                            <td>'.$nguoinhan_dienthoai.'</td>
                            <td>'.$nguoinhan_diachi.'</td>
                            <td>'.$voucher.'</td>
                            <td>'.$tongthanhtoan.'</td>
                            <td>'.$pttt1.'</td>
                            <td>
                        </tr>' ;
    $i++;
    }
    return $html_dssp;
}


// thanh toán momo
function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
}
?>