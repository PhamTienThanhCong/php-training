<?php
$file_name = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["file"])) {
        $file = $_FILES["file"];
        $file_name = $file["name"];
        $file_type = $file["type"];
        $file_size = $file["size"];
        $file_tmp_name = $file["tmp_name"];
        $file_error = $file["error"];
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $file_allow_ext = ["php", "html", "css", "js", "png", "jpg", "jpeg", "gif"];
        $file_destination = "./uploads/" . $file_name;
        if (in_array($file_ext, $file_allow_ext)) {
            if ($file_error === 0) {
                if ($file_size < 1000000) {
                    if (move_uploaded_file($file_tmp_name, $file_destination)) {
                        echo "Upload thành công";
                    } else {
                        echo "Upload thất bại";
                    }
                } else {
                    echo "File quá lớn";
                }
            } else {
                echo "Có lỗi xảy ra";
            }
        } else {
            echo "Không được phép upload file này";
        }
    }
}
?>

<div class="form">
    <?php if ($file_name === ""){ ?>
    <form method="POST" enctype="multipart/form-data">
        <label for="file">
            Tải file php
        </label>
        <input type="file" name="file" id="file">
        <br>
        <!-- button submit -->
        <button type="submit">UpLoad</button>
    </form>
    <?php } else { ?>
        <div>
            <a href="./index.php?page=Bài%2014">Đăng mới</a>
        </div>
    <?php } ?>
</div>