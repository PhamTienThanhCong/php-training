<html>
    <title>
        Bài tập 2
    </title>
    <body>
        <?php
        echo " bài tập 2 </br>";
        function giaiPTB2($a, $b, $c){
            $delta = ($b*$b) - 4 * $a * $c;
    
                if ($a == 0){
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
                else
                if ($a != 0){
                    if ($delta < 0) {
                        echo "Phương trình vô nghiệm";
                    } else if ($delta == 0) {
                        echo "Phương trình có nghiệm kép x1 = x2 = " . (-$b / (2 * $a));
                    } else {
                        echo "Phương trình có 2 nghiệm phân biệt x1 = " . ((-$b + sqrt($delta)) / (2 * $a)) . " </br> x2 = " . ((-$b - sqrt($delta)) / (2 * $a));
                    }
                }
    
            }
            giaiPTB2(0,0,0);
        

        


        ?>
    </body>
</html>