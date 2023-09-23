<?php
session_start();
include_once '../configs/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST["username"]) ? trim($_POST["username"]) : "";
    $password = isset($_POST["password"]) ? trim($_POST["password"]) : "";
    $password_confirm = isset($_POST["password_confirm"]) ? trim($_POST["password_confirm"]) : "";
    $fullname = isset($_POST["fullname"]) ? trim($_POST["fullname"]) : "";
    
    // Kiểm tra mật khẩu và xác thực
    if (empty($username) || empty($password) || empty($password_confirm) || empty($fullname)) {
        $_SESSION["error"] = "Vui lòng điền đầy đủ thông tin.";
    } elseif ($password != $password_confirm) {
        $_SESSION["error"] = "Mật khẩu không khớp. Vui lòng nhập lại.";
    } else {
        // Hash mật khẩu trước khi lưu vào cơ sở dữ liệu
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // check username đã tồn tại chưa
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $username);
            
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);
                
                if (mysqli_num_rows($result) == 1) {
                    $_SESSION["error"] = "Tên đăng nhập đã tồn tại. Vui lòng chọn tên đăng nhập khác.";
                    header("Location: ../index.php?act=add"); 
                    exit();
                }
            } else {
                $_SESSION["error"] = "Lỗi khi thực thi câu lệnh SQL.";
                header("Location: ../index.php?act=add"); 
                exit();
            }
            mysqli_stmt_close($stmt);
        }

        $sql = "INSERT INTO users (username, password, fullname, image) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        
        if ($stmt) {
            $image = $_FILES["image"]["name"];
            $image_tmp = $_FILES["image"]["tmp_name"];
            
            // đổi tên file ảnh sao cho không trùng nhau
            $random = rand(0, 99999);
            $image = $random . $image;

            $upload_directory = "../uploads/";
            
            move_uploaded_file($image_tmp, $upload_directory . $image);
            
            mysqli_stmt_bind_param($stmt, "ssss", $username, $hashedPassword, $fullname, $image);
            
            if (mysqli_stmt_execute($stmt)) {
                $_SESSION["success"] = "Thêm người dùng mới thành công!";
                header("Location: ../index.php?act=detail&id=" . mysqli_insert_id($conn)); 
                exit();
            } else {
                $_SESSION["error"] = "Lỗi khi thêm người dùng";
            }
            mysqli_stmt_close($stmt);
        } else {
            $_SESSION["error"] = "Lỗi khi chuẩn bị câu lệnh SQL";
        }
    }
}

// Đóng kết nối
mysqli_close($conn);

header("Location: ../index.php?act=add"); 