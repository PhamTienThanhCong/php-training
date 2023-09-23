<?php
// Lấy ID từ tham số truyền vào
$id = isset($_GET["id"]) ? intval($_GET["id"]) : 0;

if ($id <= 0) {
    die("ID không hợp lệ.");
}

// Truy vấn cơ sở dữ liệu để lấy thông tin người dùng
$sql = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    die("Không tìm thấy thông tin người dùng.");
}

$user = mysqli_fetch_assoc($result);

// Đóng kết nối
mysqli_close($conn);
?>

<h3>
    Chỉnh sửa tài khoản          
</h3>


<form action="./actions/update.php" method="post" enctype="multipart/form-data">
    <!-- Thêm thông báo lỗi -->
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
    <input type="hidden" name="id" value="<?= $user['id']; ?>">
    <div class="form-group">
        <label for="username">Tên đăng nhập</label>
        <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập" disabled value="<?= $user['username']; ?>">
    </div>
    <p><img width="150px" src="uploads/<?= $user['image']; ?>" alt="Ảnh đại diện"></p>

    <div class="form-group">
        <label for="image">Ảnh đại diện</label>
        <input type="file" name="image" id="image" class="form-control">
    </div>
    <input type="hidden" name="old_image" value="<?= $user['image']; ?>">
    <div class="form-group">
        <label for="fullname">Họ và tên</label>
        <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Nhập họ và tên" require value="<?= $user['fullname']; ?>">
    </div>
    <button type="submit" class="btn btn-primary">Cập nhập</button>
</form>
