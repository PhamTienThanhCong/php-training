<?php
// delete bài viết 
if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    $sql = "DELETE FROM news WHERE `news`.`id` = $id";
    if (mysqli_query($conn, $sql)) {
?>
        <script>
            alert('Đã xóa bài viết thành công');
            window.location.replace("./index.php?page=Bài%2018");
        </script>
    <?php } else { ?>
        <script>
            alert("Xóa không thành công")
            window.location.replace("Location: ./index.php?page=Bài%2019&id=$id")
        </script>
<?php }
} ?>