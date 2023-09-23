<?php
// Lấy ID từ tham số truyền vào
$id = isset($_GET["id"]) ? intval($_GET["id"]) : 0;

if ($id <= 0) {
    die("ID không hợp lệ.");
}

// xóa tài khoản người dùng
$sql = "DELETE FROM users WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    $_SESSION["success"] = "Xóa tài khoản thành công!";
    header("Location: ../index.php"); 
    exit();
} else {
    $_SESSION["error"] = "Lỗi khi xóa tài khoản";
    header("Location: ../index.php?act=detail&id=" . $id); 
    exit();
}