<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // check has title, content, author
        if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['author'])){
            $title = htmlspecialchars($_POST['title']);
            $content = htmlspecialchars($_POST['content']);
            $author = htmlspecialchars($_POST['author']);
            // check empty
            if ($title !== "" && $content !== "" && $author !== ""){
                // sql insert
                $sql = "INSERT INTO news (title, content, author) VALUES ('$title', '$content', '$author')";
                // die($sql);
                // check insert
                if (mysqli_query($conn, $sql)){
                    header("Location: ./index.php?page=Bài%2018");
                    // echo "<p class='text-success'>Thêm thành công</p>";
                } else {
                    echo "<p class='text-error'>Thêm thất bại</p>";
                }
            }else{
                echo "<p class='text-error'>Vui lòng nhập đầy đủ thông tin</p>";
            }
        }else{
            echo "<p class='text-error'>Vui lòng nhập đầy đủ thông tin</p>";
        }
    }

?>

<div class="form" style="height: 50vh;">
    <form method="POST">
        <!-- <p class="text-success">
            asdasd
        </p> -->
        <label for="username">
            Tiêu đề
        </label>
        <input type="text" name="title" id="username" placeholder="Tiêu đề">
        <br>
        <label for="content">
            Nội dung
        </label>
        <textarea name="content" id="content" cols="22" rows="10" style="padding: 5px;" placeholder="Nội dung"></textarea>
        <br>
        <label for="author">
            Tác giả
        </label>
        <input type="text" name="author" id="author" placeholder="Tác giả">
        <br>
        <!-- button submit -->
        <button type="submit">Submit</button>
    </form>
</div>