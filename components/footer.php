<?php
    $view_size_count = 0;
    // Kiểm tra file tồn tại hay không
    if (file_exists("./logs/viewCount.txt")) {
        $file = fopen("./logs/viewCount.txt", "r");
        if ($file) {
            while (($line = fgets($file)) !== false) {
                $view_size_count = $line;
            }
            fclose($file);
        }
    }
    
    $view_size_count++;
    // write content of file viewCount.txt
    $file = fopen("./logs/viewCount.txt", "w");
    if ($file) {
        fwrite($file, $view_size_count);
        fclose($file);
    }
    
?>

<div class="footer">
    <?= $NAME_AUTHOR ?>
    <br>
    <span style="font-size: small;">
        <?php
        if ($last_login != "") {
            echo "Đăng nhập lần cuối lúc: " . $last_login;
        } else {
            echo "Bạn chưa đăng nhập lần nào";
        }
        ?>
    </span>
    <div style="text-align: right;padding-right:15px">
        <span style="font-size: small">
            Số lượng truy cập: <?= $view_size_count ?>
        </span>
    </div>
</div>