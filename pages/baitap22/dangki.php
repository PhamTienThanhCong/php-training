<?php
    $username = "";
    $password = "";
    $info = "";
    $ERROR = "";
    // check method post
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["info"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            // hash password
            $password = md5($password);
            $info = $_POST["info"];
            if ($username == "" || $password == "") {
                $ERROR = "Vui lòng nhập đầy đủ thông tin";
            } else {
                // check username has exist
                $sql = "SELECT * FROM users WHERE username = '$username'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $ERROR = "Tên đăng nhập đã tồn tại";
                } else {
                    // insert data
                    $sql = "INSERT INTO users (username, password, info) VALUES ('$username', '$password', '$info')";
                    if (mysqli_query($conn, $sql)) {
                        $_SESSION["logout"] = "Đăng kí thành công";
                        header("Location: ./index.php?page=Bài%2022%2FDanh%20sách");
                    } else {
                        $ERROR = "Đăng kí thất bại";
                    }
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
        <input type="text" name="username" name="info" id="username" placeholder="Enter your username">
        <br>
        <label for="username">
            Information
        </label>
        <textarea style="padding: 5px;" name="info" id="" cols="22" rows="8"></textarea>
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
    <a href="./index.php?page=Bài%2022/Đăng%20nhập">Đăng nhập</a>
</div>
