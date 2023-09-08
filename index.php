<?php 
    session_start();
    include_once('./configs/variable.php');
    // get page from url 
    $page = isset($_GET['page']) ? $_GET['page'] : 'Bài 1';
    // check login
    if ($page != "Bài 8" && !isset($_SESSION["username"])) {
        header("Location: ./index.php?page=Bài%208");
    }

    if (isset($_SESSION["username"])) {
        $NAME_AUTHOR = $_SESSION["username"];
        $IS_LOGIN = true;
    }
    
    // get content from page
    if (isset($HOME_WORK[$page])) 
        $content = $HOME_WORK[$page];  
    else {
        $content = null;  
        $page = "page not found";
    }
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page ?></title>
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
    <!-- include header -->
    <div class="container">
        <?php include_once('./components/header.php'); ?>
        <?php include_once('./components/main.php'); ?>
        <?php include_once('./components/footer.php'); ?>
    </div>
</body>
</html>