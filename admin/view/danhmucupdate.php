<?php
    if (is_array($dm) && (count($dm)>0)) {
        extract($dm);
        $idupdate = $id;
    }
?>
<div class="main-content">
                <h3 class="title-page">
                    Sửa danh mục
                </h3>
                
                <form class="addPro" action="index.php?pg=updatedm" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Tên danh mục:</label>
                        <input type="text" class="form-control" name="name" value="<?=($name!="")?$name:"";?>" id="name" placeholder="Nhập tên danh mục">
                    </div>
                    <div class="form-group">
                        <label for="hienthi">Hiển thị trên trang chủ:</label>
                        <select name="hienthi" id="">
                            <option value="1">Có</option>
                            <option value="0">Không</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?=$id?>">
                        
                        <button type="submit" name="updatedm" class="btn btn-primary">Cập nhật danh mục</button>
                    </div>
                </form>
            </div>

            <script>
                new DataTable('#example');
            </script>