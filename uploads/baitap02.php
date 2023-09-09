<html>
<title>
    Bài tập 2
</title>

<body>
    <?php
    echo " bài tập 2 </br>";

    function giaiPTB2($a, $b, $c)
    {
        $delta = ($b * $b) - 4 * $a * $c;

        if ($a == 0) {
            if ($a == 0) {
                if ($b == 0) {
                    return "Vô số nghiệm";
                } else {
                    return "Vô nghiệm";
                }
            } else {
                return (-$b / $a);
            }
        } else
                if ($a != 0) {
            if ($delta < 0) {
                return "Vô nghiệm";
            } else if ($delta == 0) {
                return "x1 = x2 = " . (-$b / (2 * $a));
            } else {
                return "x1 = " . ((-$b + sqrt($delta)) / (2 * $a)) . " </br> x2 = " . ((-$b - sqrt($delta)) / (2 * $a));
            }
        }
    }
    $a = "";
    $b = "";
    $c = "";
    $result = "";
    $error = "";

    if (isset($_POST['submit'])) {
        if (!isset($_POST["a"]) || !isset($_POST["b"]) || !isset($_POST["c"])) {
            $result = "";
            $error = "Vui lòng nhập đầy đủ số a, b, c";
        } else {
            // kiểm tra kiểu dữ liệu của biến a và b có phải là số hay không
            $a = isset($_POST['a']) ? $_POST['a'] : '';
            $b = isset($_POST['b']) ? $_POST['b'] : '';
            $c = isset($_POST['c']) ? $_POST['c'] : '';
            if (!is_numeric($_POST['a']) || !is_numeric($_POST['b']) || !is_numeric($_POST['c'])) {
                $error = "Vui lòng nhập số";
            } else {
                $result = giaiPTB2($a, $b, $c);
            }
        }
    }

    ?>
    <p>
        Giải phương trình bậc 2 ax^2 + bx + c = 0
    </p>
    <?php if($error) { ?>
        <p style="color: red">
            <?= $error ?>
        </p>
    <?php } ?>
    <form method="post">
        <input type="text" name="a" placeholder="Nhập a" value="<?= $a ?>">
        <input type="text" name="b" placeholder="Nhập b" value="<?= $b ?>">
        <input type="text" name="c" placeholder="Nhập c" value="<?= $c ?>">
        <input type="submit" name="submit" value="Tính">
        <br>
        <?php if ($result !== "") { ?>
            <p>
                Kết quả của phương trình ax^2 + bx + c = 0 là: <?= $result; ?>
            </p>
        <?php } ?>
    </form>
</body>

</html>