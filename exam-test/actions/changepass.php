<?php
session_start();
include_once '../configs/database.php';

// get id, password, password_confirm from form
$id = isset($_POST["id"]) ? intval($_POST["id"]) : 0;
$password = isset($_POST["password"]) ? trim($_POST["password"]) : "";
$password_confirm = isset($_POST["password_confirm"]) ? trim($_POST["password_confirm"]) : "";

// check tài khoản người dùng
if ($id <= 0) {
    die("ID không hợp lệ.");
}
// id không tồn tại
$sql = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    die("Không tìm thấy thông tin người dùng.");
}

// Check password is empty

if (empty($password) || empty($password_confirm)) {
    $_SESSION["error"] = "Vui lòng điền đầy đủ thông tin.";
} elseif ($password != $password_confirm) {
    $_SESSION["error"] = "Mật khẩu không khớp. Vui lòng nhập lại.";
} else {
    // Hash mật khẩu trước khi lưu vào cơ sở dữ liệu
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "UPDATE users SET password = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "si", $hashedPassword, $id);
        
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION["success"] = "Cập nhập thông tin thành công!";
            header("Location: ../index.php?act=changepassword&id=" . $id);
            exit();
        } else {
            $_SESSION["error"] = "Lỗi khi cập nhập thông tin";
            header("Location: ../index.php?act=changepassword&id=" . $id); 
            exit();
        }
        mysqli_stmt_close($stmt);
    }
}

// Đóng kết nối
// back home
header("Location: ../index.php?act=changepassword&id=" . $id);
mysqli_close($conn);

?>