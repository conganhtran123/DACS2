<div class="main-content">
                <h3 class="title-page">
                    Thêm danh mục
                </h3>
                
                <form class="addPro" action="index.php?pg=adddm" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Tên danh mục:</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên danh mục">
                    </div>
                    <div class="form-group">
                        <label for="hienthi">Hiển thị trên trang chủ:</label>
                        <select name="hienthi" id="">
                            <option value="1">Có</option>
                            <option value="0">Không</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="adddm" class="btn btn-primary">Thêm danh mục</button>
                    </div>
                </form>
            </div>

            <script>
                new DataTable('#example');
            </script>