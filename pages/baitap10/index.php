<?php 
    $PHEP_TINH = [
        "cong" => "Cộng",
        "tru" => "Trừ",
        "nhan" => "Nhân",
        "chia" => "Chia",
    ];
    $result = "";
    $error = "";
    $so1 = "";
    $so2 = "";
    $pheptinh = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["so1"]) && isset($_POST["so2"]) && isset($_POST["pheptinh"])){
        $so1 = $_POST["so1"];
        $so2 = $_POST["so2"];
        $pheptinh = $_POST["pheptinh"];
        if (!is_numeric($so1) || !is_numeric($so2)){
            $error = "Vui lòng nhập số";
        }else{
            switch ($pheptinh){
                case "cong":
                    $result = $so1 + $so2;
                    break;
                case "tru":
                    $result = $so1 - $so2;
                    break;
                case "nhan":
                    $result = $so1 * $so2;
                    break;
                case "chia":
                    if ($so2 == 0){
                        $error = "Không thể chia cho 0";
                    }else{
                        $result = $so1 / $so2;
                    }
                    break;
            }
        }
    }else{
        $so1 = "";
        $so2 = "";
        $result = "";
        $error = "";
    }
?>

<style>
    .form-group{
        margin: 10px 0;
    }
    .btn{
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        cursor: pointer;
        margin-left: 20px;
    }
    .main-label{
        margin-bottom: 5px;
        display: inline-block;
        width: 150px;
        text-align: right;
        margin-right: 20px;
        font-size: 18px;
        font-weight: 600;
    }
    .form-control{
        width: 300px;
        display: inline-block;
        padding: 5px;
        border: none;
        border-bottom: 1px solid #ccc;
        outline: none;
    }
</style>
<h2>
    Phép tính trên hai số
</h2>
<form method="post">
    <div class="form-group">
        <label class="main-label" for="">Chọn phép tính </label>
        <!-- input radio -->
        <?php
            if ($result === "") {
            foreach ($PHEP_TINH as $key => $value) { 
        ?>
            <input type="radio" name="pheptinh" value="<?= $key ?>" id="<?= $key ?>" <?php if ("cong" == $key) echo "checked" ?>>
            <label for="<?= $key ?>"><?= $value ?></label>
        <?php 
    }}else{
        echo $PHEP_TINH[$pheptinh];
    } ?>
    </div>
    <?php if($error) { ?>
        <p style="color: red">
            <?= $error ?>
        </p>
    <?php } ?>
    <div class="form-group">
        <label class="main-label" for="">Số thứ nhất</label>
        <input type="text" name="so1" id="so1" class="form-control" value="<?= $so1 ?>" <?php if ($result !== "") echo "readonly" ?>>
    </div>
    <div class="form-group">
        <label class="main-label" for="">Số thứ hai</label>
        <input type="text" name="so2" id="so2" class="form-control" value="<?= $so2 ?>" <?php if ($result !== "") echo "readonly" ?>>
    </div>
    <?php if($result === ""){ ?>
        <button class="btn">
            Tính
        </button>
    <?php }else{ ?>
        <div class="form-group">
            <label class="main-label" for="">Kết quả: </label>
            <input type="text" readonly class="form-control" value="<?= $result ?>">
        </div>
        <a href="./index.php?page=Bài%2010">
            Quay lại trang trước
        </a>
    <?php } ?>
</form>