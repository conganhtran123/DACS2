<?php
// require_once 'pdo.php';

function user_insert($username, $password, $ten, $email){
    $sql = "INSERT INTO users(username, pass, ten, email) VALUES (?, ?, ?, ?)";
    pdo_execute($sql, $username, $password, $ten, $email);
}

function user_insert_id($username, $password, $ten, $diachi, $email, $dienthoai){
    $sql = "INSERT INTO users(username, pass, ten, diachi, email, dienthoai) VALUES (?, ?, ?, ?, ?, ?)";
    return pdo_execute_id($sql, $username, $password, $ten, $diachi, $email, $dienthoai);

}

function user_update($username, $password, $email, $ten, $dienthoai, $diachi,$vaitro, $id){
    $sql = "UPDATE users SET username=?,pass=?,email=?,ten=?,dienthoai=?,diachi=?,role=? WHERE id=?";
    pdo_execute($sql, $username, $password, $email, $ten, $dienthoai, $diachi,$vaitro, $id);
}

function user_update_donhang($nguoidat_ten, $nguoidat_diachi, $nguoidat_email, $nguoidat_dienthoai,$role, $iduser){
    $sql = "UPDATE users SET ten=?,diachi=?,email=?,dienthoai=?,role=? WHERE id=?";
    pdo_execute($sql,$nguoidat_ten, $nguoidat_diachi, $nguoidat_email, $nguoidat_dienthoai,$role, $iduser);
}

function get_dsthanhvien() {
    $sql = "SELECT * FROM users where role=0";
    return pdo_query($sql);
}

// function user_delete($ma_kh){
//     $sql = "DELETE FROM khach_hang  WHERE ma_kh=?";
//     if(is_array($ma_kh)){
//         foreach ($ma_kh as $ma) {
//             pdo_execute($sql, $ma);
//         }
//     }
//     else{
//         pdo_execute($sql, $ma_kh);
//     }
// }

// function user_select_all(){
//     $sql = "SELECT * FROM khach_hang";
//     return pdo_query($sql);
// }

function check_user($username, $password){
    $sql = "SELECT * FROM users WHERE username=? and pass=? and role=0";
    return pdo_query_one($sql, $username, $password);
}
function check_admin($username, $password){
    $sql = "SELECT * FROM users WHERE username=? and pass=?";
    return pdo_query_one($sql, $username, $password);
}

function get_user($id){
    $sql = "SELECT * FROM users WHERE id=?";
    return pdo_query_one($sql, $id);
    
}

function update_password($mkmoi, $email) {
    $sql = "UPDATE users SET pass=? where email=?";
    return pdo_query($sql,$mkmoi,$email);
}

function check_email($email) {
    $sql = "SELECT * FROM users WHERE email=?";
    return pdo_query_one($sql, $email);
}


// function user_exist($ma_kh){
//     $sql = "SELECT count(*) FROM khach_hang WHERE $ma_kh=?";
//     return pdo_query_value($sql, $ma_kh) > 0;
// }

// function user_select_by_role($vai_tro){
//     $sql = "SELECT * FROM khach_hang WHERE vai_tro=?";
//     return pdo_query($sql, $vai_tro);
// }

// function user_change_password($ma_kh, $mat_khau_moi){
//     $sql = "UPDATE khach_hang SET mat_khau=? WHERE ma_kh=?";
//     pdo_execute($sql, $mat_khau_moi, $ma_kh);
// }