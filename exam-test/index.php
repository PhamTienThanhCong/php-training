<?php
session_start();
include_once './configs/database.php';
include_once './configs/variable.php';
?>
<html lang="en">

<head>
    <link rel="stylesheet" href="./assets/style.css">
    <title>
        <?= $NAME_WEBSITE ?>
    </title>
</head>

<body>

    <!-- header danh mục -->
    <h1 class="text-center">
        <?= $NAME_WEBSITE ?>
    </h1>
    <?php
        include_once './components/header.php';
    ?>

    <!-- content -->
    <div class="container">
        <?php
            if (isset($_GET['act'])) {
                $act = $_GET['act'];
                switch ($act) {
                    // action crud
                    case 'add':
                        include_once './pages/add.php';
                        break;
                    case 'edit':
                        include_once './pages/edit.php';
                        break;
                    case 'delete':
                        include_once './pages/delete.php';
                        break;
                    // view
                    case 'detail':
                        include_once './pages/detail.php';
                        break;
                    case 'changepassword':
                        include_once './pages/changepassword.php';
                        break;
                        // default
                    default:
                        include_once './pages/index.php';
                        break;
                }
            } else {
                include_once './pages/index.php';
            }
        ?>
    </div>
</body>

</html>