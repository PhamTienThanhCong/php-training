<html>
    <head>
        <title>Chào mừng bạn đến với PHP</title>
    </head>
   
    <body>
        <?php

// bài tập 1
echo "Bài tập 1 </br>";
//viết func giải phương trình bậc nhất
function giaiPTB1($a, $b){
    if ($a == 0) {
        if ($b == 0) {
            echo "Phương trình vô số nghiệm";
        } else {
            echo "Phương trình vô nghiệm";
        }
    } else {
        echo "Phương trình có nghiệm x = " . (-$b / $a);
    }
}

    $a = 5;
    $b = 10;

    giaiPTB1($a, $b);

    ?>
    

 
    </body>
</html>
