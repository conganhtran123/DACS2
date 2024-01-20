<?php
require_once 'pdo.php';
function danhmuc_insert($ten_danhmuc, $hienthi){
    $sql = "INSERT INTO danhmuc(name,home) VALUES(?,?)";
    pdo_query($sql, $ten_danhmuc, $hienthi);
}
// /**
//  * Cập nhật tên loại
//  * @param int $ma_danhmuc là mã loại cần cập nhật
//  * @param String $ten_danhmuc là tên loại mới
//  * @throws PDOException lỗi cập nhật
//  */
function danhmuc_update($name,$hienthi, $id){
    $sql = "UPDATE danhmuc SET name=?, home=? WHERE id=?";
    pdo_query($sql, $name,$hienthi, $id);
}
// /**
//  * Xóa một hoặc nhiều loại
//  * @param mix $ma_danhmuc là mã loại hoặc mảng mã loại
//  * @throws PDOException lỗi xóa
//  */
function danhmuc_delete($ma_danhmuc){
    $sql = "DELETE FROM danhmuc WHERE id=?";
    
    pdo_query($sql, $ma_danhmuc);
    
}
// /**
//  * Thêm loại mới
//  * @param String $ten_danhmuc là tên loại
//  * @throws PDOException lỗi thêm mới
//  */

// /**
//  * Cập nhật tên loại
//  * @param int $ma_danhmuc là mã loại cần cập nhật
//  * @param String $ten_danhmuc là tên loại mới
//  * @throws PDOException lỗi cập nhật
//  */

// /**
//  * Xóa một hoặc nhiều loại
//  * @param mix $ma_danhmuc là mã loại hoặc mảng mã loại
//  * @throws PDOException lỗi xóa
//  */

// /**
//  * Truy vấn tất cả các loại
//  * @return array mảng loại truy vấn được
//  * @throws PDOException lỗi truy vấn
//  */
function danhmuc_all(){
    $sql = "SELECT * FROM danhmuc order by id desc";
    return pdo_query($sql);
}

function showdanhmuc($dsdm) {
    $html_dm = '';
    foreach ($dsdm as $dm) {
        extract($dm);
        $link = 'index.php?pg=sanpham&iddm=' . $id;
        $html_dm .= '<a href="' . $link . '">' . $name . '</a>';
    }
    return $html_dm;
}



//admin
function showdanhmuc_admin($dsdm) {
    $html_dm = '';
    foreach ($dsdm as $dm) { 
        extract($dm);
        $link = 'index.php?pg=sanpham&iddm=' . $id;
        $html_dm .= '<option value="'.$id.'">'.$name.'</option>';
    }
    return $html_dm;
}

function danhmuclist_admin($dsdm) {
    $html_dm = '';
    $i=1;
    foreach ($dsdm as $dm) { 
        extract($dm);
        if($home == 1){
            $value = 'Có';
        }else {
            $value = 'Không';
        }
        $link = 'index.php?pg=sanpham&iddm=' . $id;
        $html_dm .= '<tr>
                        <td>'.$i.'</td>
                        <td>'.$name.'</td>
                        <td>'.$value.'</td>

                        <td>
                            <a href="index.php?pg=danhmucupdate&id='.$id.'" class="btn btn-warning"
                                ><i class="fa-solid fa-pen-to-square"></i> Sửa</a
                            >
                            <a href="index.php?pg=deldanhmuc&id='.$id.'" class="btn btn-danger"
                                ><i class="fa-solid fa-trash"></i> Xóa</a
                            >
                            </td>
                    </tr>' ;
    $i++;
    }
    return $html_dm;
}

function showdanhmuc_admin_update($dsdm, $iddm) {
    $html_dm = '';
    foreach ($dsdm as $dm) { 
        extract($dm);
        if ($id == $iddm){
            $se = "selected";
        }else{
            $se = "";
        }    
        $html_dm .= '<option value="'.$id.'" '.$se.'>'.$name.'</option>';
    }
    return $html_dm;
}

function get_name_dm($id) {
    $sql = "SELECT name FROM danhmuc where id=?";
    return pdo_query_value($sql, $id);
}
function danhmuc_select_by_id($ma_danhmuc){
    $sql = "SELECT * FROM danhmuc WHERE id=?";
    return pdo_query_one($sql, $ma_danhmuc);
}
// /**
//  * Truy vấn một loại theo mã
//  * @param int $ma_danhmuc là mã loại cần truy vấn
//  * @return array mảng chứa thông tin của một loại
//  * @throws PDOException lỗi truy vấn
//  */
// function danhmuc_select_by_id($ma_danhmuc){
//     $sql = "SELECT * FROM danhmuc WHERE ma_danhmuc=?";
//     return pdo_query_one($sql, $ma_danhmuc);
// }
// /**
//  * Kiểm tra sự tồn tại của một loại
//  * @param int $ma_danhmuc là mã loại cần kiểm tra
//  * @return boolean có tồn tại hay không
//  * @throws PDOException lỗi truy vấn
//  */
// function danhmuc_exist($ma_danhmuc){
//     $sql = "SELECT count(*) FROM danhmuc WHERE ma_danhmuc=?";
//     return pdo_query_value($sql, $ma_danhmuc) > 0;
// }