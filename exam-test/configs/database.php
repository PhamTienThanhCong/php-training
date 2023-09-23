<?php
    // connect DB
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "myweb";

    // connect to DB using mysqli_connect
    $conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
    // set utf8 for DB
    mysqli_set_charset($conn, "utf8");
    