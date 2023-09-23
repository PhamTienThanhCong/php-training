<?php
session_start();
include_once '../configs/database.php';
    // Get id, image, fullname, image from form
    $id = isset($_POST["id"]) ? intval($_POST["id"]) : 0;
    $image = isset($_POST["image"]) ? trim($_POST["image"]) : "";
    $fullname = isset($_POST["fullname"]) ? trim($_POST["fullname"]) : "";
    
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

    // Check fullname is empty
    if (empty($fullname)) {
        $_SESSION["error"] = "Vui lòng điền đầy đủ thông tin.";
    } else {
        // Check image is empty
        if (empty($image)) {
            $sql = "UPDATE users SET fullname = ? WHERE id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "si", $fullname, $id);
                
                if (mysqli_stmt_execute($stmt)) {
                    $_SESSION["success"] = "Cập nhập thông tin thành công!";
                    header("Location: ../index.php?act=detail&id=" . $id); 
                    exit();
                } else {
                    $_SESSION["error"] = "Lỗi khi cập nhập thông tin";
                    header("Location: ../index.php?act=edit&id=" . $id); 
                    exit();
                }
                mysqli_stmt_close($stmt);
            }
        } else {
            $sql = "UPDATE users SET fullname = ?, image = ? WHERE id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            
            if ($stmt) {
                $image = $_FILES["image"]["name"];
                $image_tmp = $_FILES["image"]["tmp_name"];
                
                // đổi tên file ảnh sao cho không trùng nhau
                $random = rand(0, 99999);
                $image = $random . $image;

                $upload_directory = "../uploads/";
                
                move_uploaded_file($image_tmp, $upload_directory . $image);
                
                mysqli_stmt_bind_param($stmt, "ssi", $fullname, $image, $id);
                
                if (mysqli_stmt_execute($stmt)) {
                    $_SESSION["success"] = "Cập nhập thông tin thành công!";
                    header("Location: ../index.php?act=detail&id=" . $id); 
                    exit();
                } else {
                    $_SESSION["error"] = "Lỗi khi cập nhập thông tin";
                    header("Location: ../index.php?act=edit&id=" . $id); 
                    exit();
                }
                mysqli_stmt_close($stmt);
            }
        }
    }
?>