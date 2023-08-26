<html>

<head>
    <title> Bài tập 4</title>
</head>

<body>
    <?php



    function kiemTraNamNhuan($thang, $nam)
    {
        if ($thang == 2) {
            if (($nam % 4 == 0 && $nam % 100 != 0) || ($nam % 400 == 0)) {
                $soNgay = 29;
            } else {
                $soNgay = 28;
            }
        } else if ($thang == 4 || $thang == 6 || $thang == 9 || $thang == 11) {
            $soNgay = 30;
        } else {
            $soNgay = 31;
        }

        return "Tháng $thang  năm $nam có : $soNgay ngày.";
    }
    
    $a = "";
    $b = "";
    $result = "";
    $error = "";

    if (isset($_POST['submit'])) {
        if (!isset($_POST["a"]) || !isset($_POST["b"])) {
            $result = "";
            $error = "Vui lòng nhập đầy đủ tháng, năm";
        } else {
            // kiểm tra kiểu dữ liệu của biến a và b có phải là số hay không
            $a = isset($_POST['a']) ? $_POST['a'] : '';
            $b = isset($_POST['b']) ? $_POST['b'] : '';
            if (!is_numeric($a) || !is_numeric($b)) {
                $error = "Vui lòng nhập số nguyên";
            } else {
                // kiểm tra a b có phải là số nguyên dương hay không
                if ($a != round($a) || $b != round($b)) {
                    $error = "Vui lòng nhập số nguyên";
                }else if ($a < 1 || $a > 12) {
                    $error = "Vui lòng nhập tháng từ 1 đến 12";
                }else if ($b < 0) {
                    $error = "Vui lòng nhập năm lớn hơn 0";
                }
                else{
                    $result = kiemTraNamNhuan($a, $b);
                }
            }
        }
    }

    ?>
    <p>
        In ra số ngày của một tháng (tháng, năm là biến đầu vào)
    </p>
    <?php if($error) { ?>
        <p style="color: red">
            <?= $error ?>
        </p>
    <?php } ?>
    <form method="post">
        <input type="text" name="a" placeholder="Nhập tháng" value="<?= $a ?>">
        <input type="text" name="b" placeholder="Nhập năm" value="<?= $b ?>">

        <input type="submit" name="submit" value="Tính">
        <br>
        <?php if ($result !== "") { ?>
            <p>
                Kết quả là: <?= $result; ?>
            </p>
        <?php } ?>
    </form>
</body>

</html>