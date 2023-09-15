<?php
    // get id from url
    $title = "";
    $content = "";
    $author = "";
    $id = 0;
    $error = true;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // check has title, content, author
        if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['author']) && isset($_POST['id'])){
            $id = htmlspecialchars($_POST['id']); 
            $title = htmlspecialchars($_POST['title']);
            $content = htmlspecialchars($_POST['content']);
            $author = htmlspecialchars($_POST['author']);
            // check empty
            if ($title !== "" && $content !== "" && $author !== "" && $id !== ""){
                // sql insert
                $sql = "UPDATE news SET title = '$title', content = '$content', author = '$author' WHERE id = $id";
                // check result
                if (mysqli_query($conn, $sql)){
                    // redirect index.php
                    header("Location: ./index.php?page=Bài%2019&id=$id");
                }else{
                    echo "<p class='text-error'>Có lỗi xảy ra</p>";
                }
            }else{
                echo "<p class='text-error'>Vui lòng nhập đầy đủ thông tin</p>";
            }
        }else{
            echo "<p class='text-error'>Vui lòng nhập đầy đủ thông tin</p>";
        }
    }else{
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
    }

?>

<?php if ($error) { ?>
    <p class="text-error text-center">
        không tìm thấy bài đăng
    </p>
<?php } else { ?>
<div class="form" style="height: 50vh;">
    <form method="POST">
        <!-- <p class="text-success">
            asdasd
        </p> -->
        <input type="hidden" name="id" value="<?= $id ?>">
        <label for="username">
            Tiêu đề
        </label>
        <input type="text" name="title" id="username" placeholder="Tiêu đề" value="<?= $title ?>">
        <br>
        <label for="content">
            Nội dung
        </label>
        <textarea name="content" id="content" cols="22" rows="10" style="padding: 5px;" placeholder="Nội dung"><?= $content ?></textarea>
        <br>
        <label for="author">
            Tác giả
        </label>
        <input type="text" name="author" id="author" placeholder="Tác giả" value="<?= $author ?>">
        <br>
        <!-- button submit -->
        <button type="submit">Edit</button>
    </form>
</div>
<?php } ?>