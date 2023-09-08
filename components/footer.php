<?php 
    $last_login = "";
    if(isset($_COOKIE["last_login"])) {
        $last_login = $_COOKIE["last_login"];
    }
    // Lấy time của server
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    // save cookie last_login current time 10 years
    setcookie("last_login", date("d/m/Y H:i:s"), time() + 10 * 365 * 24 * 60 * 60);
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
</div>