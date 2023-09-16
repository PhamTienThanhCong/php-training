<?php
    $ERROR = "";
    // check method post
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_POST["username"]) && isset($_POST["password"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            // hash password
            $password = md5($password);
            if ($username == "" || $password == "") {
                $ERROR = "Vui lòng nhập đầy đủ thông tin";
            } else {
                // check username has exist
                $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $_SESSION["username"] = $username;
                    header("Location: ./index.php?page=Bài%2022%2FDanh%20sách");
                } else {
                    $ERROR = "Tên đăng nhập hoặc mật khẩu không đúng";
                }
            }
        }else{
            $ERROR = "Vui lòng nhập đầy đủ thông tin";
        }
    }
?>

<div class="form" style="margin-top: 20px;">
    <!-- error -->
    <form method="POST">
        <!-- text đăng xuất thành công -->
        <label for="username">
            UserName
        </label>
        <input type="text" name="username" id="username" placeholder="Enter your username">
        <br>
        <label for="password">
            Password
        </label>
        <input type="password" name="password" id="password" placeholder="Enter your password">
        <br>
        <!-- button submit -->
        <button type="submit">Submit</button>
    </form>
</div>
<div class="text-center" style="margin-top: 20px;">
    <p class="text-error"><?= $ERROR ?></p>
    <a href="./index.php?page=Bài%2022/Đăng%20kí">Đăng ký</a>
</div>