<?php
    $USERNAME = "";
    $ERROR = "";
    // get data from form if method is POST
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        // check username and password
        if ($username == "abc" && $password == "123") {
            $USERNAME = $username;
        } else {
            // redirect to page with error
            header("Location: ./index.php?page=Bài%208&error=1");
        }
    }else{
        // check have error
        if (isset($_GET["error"])) {
            $ERROR = "Sai tên đăng nhập hoặc mật khẩu";
        }
    }
?>

<style>
    /* css form center main */
    .form {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    form label{
        display: inline-block;
        width: 100px;
        margin-bottom: 10px;
    }
    form input {
        width: 200px;
        height: 30px;
        margin-bottom: 10px;
        padding: 10px;
        outline: none;
    }
    button{
        width: 100px;
        height: 30px;
        background-color: #4CAF50;
        color: white;
        border: none;
        outline: none;
        cursor: pointer;
    }
    .text-error{
        color: red;
        font-weight: bold;
    }
</style>

<div class="form">
    <?php if(!$USERNAME) { ?>
    <form method="POST">
        <p class="text-error"><?= $ERROR ?></p>
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
    <?php } else { ?>
        <h2 style="text-align: center;">Welcome <?= $USERNAME ?></h2>
        <a href="./index.php?page=baitap08?error=1"></a>
    <?php } ?>
</div>