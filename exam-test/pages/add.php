<h3>
    Thêm người dùng mới            
</h3>

<!-- input lable group for username, password, password comfirm, image, fullname -->
<form action="./actions/add.php" method="post" enctype="multipart/form-data">
    <!-- Thêm thông báo lỗi -->
    <?php
        if (isset($_SESSION["error"])) {
            echo "<div class='alert alert-danger'>" . $_SESSION["error"] . "</div>";
            unset($_SESSION["error"]);
        }
    ?>
    <div class="form-group">
        <label for="username">Tên đăng nhập</label>
        <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập" require>
    </div>
    <div class="form-group">
        <label for="password">Mật khẩu</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu" require>
    </div>
    <div class="form-group">
        <label for="password_confirm">Nhập lại mật khẩu</label>
        <input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Nhập lại mật khẩu" require>
    </div>
    <div class="form-group">
        <label for="fullname">Họ và tên</label>
        <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Nhập họ và tên" require>
    </div>
    <div class="form-group">
        <label for="image">Ảnh đại diện</label>
        <input type="file" name="image" id="image" class="form-control" require>
    </div>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
</form>

<!-- script check password after submit -->
<script>
    // get element
    var password = document.getElementById('password');
    var password_confirm = document.getElementById('password_confirm');
    // add event
    password_confirm.addEventListener('keyup', function() {
        if (password.value != password_confirm.value) {
            password_confirm.setCustomValidity('Mật khẩu không khớp');
        } else {
            password_confirm.setCustomValidity('');
        }
    });
</script>