<?php 
    include_once('./configs/variable.php');
    // get page from url 
    $page = isset($_GET['page']) ? $_GET['page'] : 'Bài 1';
    // get content from page
    $content = $HOME_WORK[$page];  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài Tập 5</title>
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