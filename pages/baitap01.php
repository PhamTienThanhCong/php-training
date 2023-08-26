<html>

<head>
    <title>Chào mừng bạn đến với PHP</title>
</head>

<body>
    <?php

    // bài tập 1
    echo "Bài tập 1 </br>";
    function giaiPTB1($a, $b)
    {
        if ($a == 0) {
            if ($b == 0) {
                return "Vô số nghiệm";
            } else {
                return "Vô nghiệm";
            }
        } else {
            return (-$b / $a);
        }
    }

    $a = "";
    $b = "";
    $result = "";
    $error = "";

    if (isset($_POST['submit'])) {
        if (!isset($_POST["a"]) || !isset($_POST["b"])){
            $result = "";
            $error = "Vui lòng nhập đầy đủ số a và b";
        }else{
            // kiểm tra kiểu dữ liệu của biến a và b có phải là số hay không
            $a = isset($_POST['a']) ? $_POST['a'] : '';
            $b = isset($_POST['b']) ? $_POST['b'] : '';
            if (!is_numeric($_POST['a']) || !is_numeric($_POST['b'])) {
                $error = "Vui lòng nhập số";
            }else{
                
                $result = giaiPTB1($a, $b);
            }
        }
    }

    ?>
    <p>
        Giải phương trình bậc nhất ax + b = 0
    </p>
    <?php if($error) { ?>
        <p style="color: red">
            <?= $error ?>
        </p>
    <?php } ?>
    <form method="post">
        <input type="text" name="a" placeholder="Nhập a" value="<?= $a ?>">
        <input type="text" name="b" placeholder="Nhập b" value="<?= $b ?>">
        <input type="submit" name="submit" value="Tính">
        <br>
        <?php if ($result !== "") { ?>
            <p>
                Kết quả của phương trình ax + b = 0 là: <?= $result; ?>
            </p>
        <?php } ?>
    </form>

</body>

</html>