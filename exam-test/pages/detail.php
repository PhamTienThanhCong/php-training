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

<div class="d-flex d-end">
    <a href="index.php?act=edit&id=<?= $user['id']; ?>" class="btn btn-primary">Chỉnh sửa tài khoản</a>
    <a href="index.php?act=changepassword&id=<?= $user['id']; ?>" class="btn btn-warning">Đổi mật khẩu</a>
    <a href="javascript:void(0);" class="btn btn-danger" onclick="confirmDelete(<?= $user['id']; ?>)">Xóa tài khoản</a>
</div>

<p><strong>Tên đăng nhập:</strong> <?= $user['username']; ?></p>
<br>
<p>Họ và tên: <?= $user['fullname']; ?></p>
<br>
<p><img width="250px" src="uploads/<?= $user['image']; ?>" alt="Ảnh đại diện"></p>

<script>
function confirmDelete(userId) {
    var result = confirm("Bạn có chắc chắn muốn xóa tài khoản này?");
    if (result) {
        window.location.href = "index.php?act=delete&id=" + userId;
    }
}
</script>