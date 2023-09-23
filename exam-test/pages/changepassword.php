<?php
// Lấy ID từ tham số truyền vào
$id = isset($_GET["id"]) ? intval($_GET["id"]) : 0;

if ($id <= 0) {
    die("ID không hợp lệ.");
}
?>

<form action="./actions/changepass.php" method="post" enctype="multipart/form-data">
<?php
        if (isset($_SESSION["error"])) {
            echo "<div class='alert alert-danger'>" . $_SESSION["error"] . "</div>";
            unset($_SESSION["error"]);
        }
        // Thông báo thành công
        if (isset($_SESSION["success"])) {
            echo "<div class='alert alert-success'>" . $_SESSION["success"] . "</div>";
            unset($_SESSION["success"]);
        }
    ?>
<input type="hidden" name="id" value="<?= $id ?>">

<div class="form-group">
    <label for="old_password">Mật khẩu cũ</label>
    <input type="old_password" name="old_password" id="old_password" class="form-control" placeholder="Nhập mật khẩu" require>
</div>

<div class="form-group">
    <label for="password">Mật khẩu mới</label>
    <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu" require>
</div>
<div class="form-group">
    <label for="password_confirm">Nhập lại mật khẩu</label>
    <input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Nhập lại mật khẩu" require>
</div>
<button type="submit" class="btn btn-primary">Cập nhập mật khẩu</button>
</form>