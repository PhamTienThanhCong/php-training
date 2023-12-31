<?php
    // sql select news table
    $data = [];
    // search
    $search = "";
    if (isset($_GET['search'])) {
        $search = htmlspecialchars($_GET['search']);
        $sql = "SELECT * FROM news WHERE title LIKE '%$search%' OR content LIKE '%$search%' OR author LIKE '%$search%' ORDER BY id DESC LIMIT 0, 10";
    } else
        $sql = "SELECT * FROM news ORDER BY id DESC LIMIT 0, 10";
    // get result
    $result = mysqli_query($conn, $sql);
    // check result
    if (mysqli_num_rows($result) > 0) {
        // fetch result
        $index = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    } 
?>

<h3 style="text-align: center;">Danh sách bài đăng</h3>
<a href="./index.php?page=Bài%2017">Thêm mới</a>
<br>
<form action="./index.php?page=Bài%2018" method="get">
    <input type="hidden" name="page" value="<?= $page ?>">
    <input type="text" name="search" placeholder="Nhập từ khóa" value="<?= $search ?>">
    <button>search</button>
</form>
<table>
    <!-- input search -->
    <thead>
        <td>
            Stt
        </td>
        <td>
            Tiêu đề
        </td>
        <td>
            Nội Dung
        </td>
        <td>
            Tác giả
        </td>
    </thead>
    <tbody>
        <?php foreach ($data as $key => $value) { ?>
            <tr>
                <td>
                    <?= $index++; ?>
                </td>
                <td>
                    <a href="./index.php?page=Bài%2019&id=<?= $value['id']; ?>"> <?= $value['title']; ?> </a>
                </td>
                <td>
                    <?= $value['content']; ?>
                </td>
                <td>
                    <?= $value['author']; ?>
                </td>
            </tr>
        <?php } 
            if (count($data) == 0) {
                echo "<tr><td colspan='4'>Không có bài viết nào</td></tr>";
            }
        ?>
    </tbody>
</table>