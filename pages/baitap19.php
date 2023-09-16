<?php
    // get id from url  
    $title = "";
    $content = "";
    $author = "";
    $error = true;
    $id = 0;
    if (isset($_GET['id'])) {
        $id = htmlspecialchars($_GET['id']);
        // sql select news table
        $sql = "SELECT * FROM news WHERE id = $id";
        // get result
        $result = mysqli_query($conn, $sql);
        // check result
        if (mysqli_num_rows($result) > 0) {
            // fetch result
            $row = mysqli_fetch_assoc($result);
            $title = $row['title'];
            $content = $row['content'];
            $author = $row['author'];
            $error = false;
        }
    }
?>

<div>
    <a href="./index.php?page=Bài%2018">Quay lại danh sách</a>
    <br>
    <!-- Sửa -->
</div>

<div class="content">
    <?php if ($error) { ?>
        <p class="text-error text-center">
            không tìm thấy bài đăng
        </p>
    <?php } else { ?>
        <h3 class="text-center">
            <?= $title; ?>
        </h3>
        <p>
            <?= $content; ?>
        </p>
        <br>
        <p>
            <i>Tác giả: </i> <b><?= $author; ?></b>
        </p>
        <br>
        <a href="./index.php?page=Bài%2020&id=<?= $id ?>">Sửa bài đăng này</a>
        <a style="margin-left: 10px;" href="#" onclick="btnDelete()">Xóa</a>
    <?php } ?>
</div>

<script>
    const btnDelete = () => {
        if(window.confirm("Bạn có chắc muốn xóa bài đăng này?" )){
            // redirect index.php
            window.location.replace("./index.php?page=Bài%2021&id=<?= $id ?>");
        }
    } 
</script>
