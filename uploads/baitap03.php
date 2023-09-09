<html>

<head>
    <title>Chào mừng bạn đến với PHP</title>
</head>

<body>
    <?php

    // bài tập 1
    echo "Bài tập 3 </br>";
    function convertDayOfWeek($dayNumber)
    {
        $days = array(
            1 => "Chủ nhật",
            2 => "Thứ hai",
            3 => "Thứ ba",
            4 => "Thứ tư",
            5 => "Thứ năm",
            6 => "Thứ sáu",
            7 => "Thứ bảy"
        );

        if (array_key_exists($dayNumber, $days)) {
            return $days[$dayNumber];
        } else {
            return "Không hợp lệ";
        }
    }



    $a = "";
    $result = "";
    $error = "";

    if (isset($_POST['submit'])) {
        if (!isset($_POST["a"])) {
            $result = "";
            $error = "Vui lòng nhập đầy đủ số a";
        } else {
            // kiểm tra kiểu dữ liệu của biến a và b có phải là số hay không
            $a = isset($_POST['a']) ? $_POST['a'] : '';
            if (!is_numeric($_POST['a'])) {
                $error = "Vui lòng nhập số";
            } else {
                // kiểm tra a b có phải là số nguyên dương hay không
                if ($a != round($a)) {
                    $error = "Vui lòng nhập số nguyên";
                } else if ($a < 1 || $a > 7) {
                    $error = "Vui lòng nhập số từ 1 đến 7";
                } else {
                    $result = convertDayOfWeek($a);
                }
            }
        }
    }

    ?>
    <p>
        Chuyển đổi ngày trong tuần từ số sang chữ.
    </p>
    <?php if($error) { ?>
        <p style="color: red">
            <?= $error ?>
        </p>
    <?php } ?>
    <form method="post">
        <input type="text" name="a" placeholder="Nhập day" value="<?= $a ?>">
        <input type="submit" name="submit" value="Tính">
        <br>
        <?php if ($result !== "") { ?>
            <p>
                Kết quả của phương trình là: <?= $result; ?>
            </p>
        <?php } ?>
    </form>
</body>

</html>