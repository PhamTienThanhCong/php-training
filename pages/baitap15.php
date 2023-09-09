<?php
$sortType = "";
$order = "up";
if (isset($_GET['sort'])){
    $sortType = $_GET['sort'];
}
if (isset($_GET['order'])){
    $order = $_GET['order'];
}

$files = scandir("./uploads");

$listFile = [];

for ($i = 0; $i < count($files); $i++) {
    // get size file
    $size = filesize("./uploads/" . $files[$i]);
    // get type file
    $type = pathinfo("./uploads/" . $files[$i], PATHINFO_EXTENSION);
    // get time upload file
    $time = date("d/m/Y H:i:s", filemtime("./uploads/" . $files[$i]));

    if ($type != "") {
        $listFile[] = [
            "name" => $files[$i],
            "size" => $size,
            "type" => $type,
            "time" => $time
        ];
    }
}

if ($sortType == "name" || $sortType == "type" || $sortType == "size" || $sortType == "time") {
    usort($listFile, function($a, $b) use ($sortType, $order) {
        if ($sortType === "size" || $sortType === "time") {
            // Chuyển đổi chuỗi thành số (hoặc DateTime object cho trường "time")
            if ($sortType === "size") {
                $aValue = intval($a[$sortType]);
                $bValue = intval($b[$sortType]);
            } elseif ($sortType === "time") {
                $aValue = new DateTime($a[$sortType]);
                $bValue = new DateTime($b[$sortType]);
            }
        } else {
            $aValue = $a[$sortType];
            $bValue = $b[$sortType];
        }
        if ($order == "down"){
            return ($aValue > $bValue) ? -1 : 1;    
        }
        return ($aValue < $bValue) ? -1 : 1;
    });
}

if($order == "up"){
    $order = "down";
}else{
    $order = "up";
}

?>
<h3 style="text-align: center;">Danh sách tệp</h3>
<a href="./index.php?page=Bài%2014">Tải mới</a>
<table>
    <thead>
        <td>
            <a href="index.php?page=Bài%2015&sort=name&order=<?php if ($sortType == "name"){ echo $order; } else {echo "";}?>">Tên tệp</a>
        </td>
        <td>
            <a href="index.php?page=Bài%2015&sort=type&order=<?php if ($sortType == "type"){ echo $order; } else {echo "";}?>">Loại</a>
        </td>
        <td>
            <a href="index.php?page=Bài%2015&sort=time&order=<?php if ($sortType == "time"){ echo $order; } else {echo "";}?>">Ngày tải lên</a>
        </td>
        <td>
            <a href="index.php?page=Bài%2015&sort=size&order=<?php if ($sortType == "size"){ echo $order; } else {echo "";}?>">Kích thước</a>
        </td>
    </thead>
    <tbody>
        <?php foreach ($listFile as $file) { ?>
            <tr>
                <td>
                    <a href="./uploads/<?= $file['name'] ?>" target="_blank"><?= $file['name'] ?></a>
                </td>
                <td><?= $file['type'] ?></td>
                <td><?= $file['time'] ?></td>
                <td><?= $file['size'] ?> bytes</td>
            </tr>
        <?php } ?>
    </tbody>
</table>