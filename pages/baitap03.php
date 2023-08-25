<html>
    <head>
        <title>Chào mừng bạn đến với PHP</title>
    </head>
   
    <body>
        <?php

// bài tập 1
echo "Bài tập 3 </br>";
function ngay($a){
    $weekdays = array(1=> "Sunday","Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
    foreach ($weekdays as $key => $value) {
        echo "Thứ $key là $value </br>";
    }
    
    echo " ". $weekdays[$a];

}
ngay(3);



    ?>
    

        
    </body>
</html>
