<html>
    <head>
        <title> Bài tập  4</title>
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
    
    echo "Tháng $thang  năm $nam : </br>  $soNgay ngày.";
   
}
kiemTraNamNhuan(2,2016);

?>
</html>