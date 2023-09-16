<?php
    // sql select news table
    $data = [];
    // search
    $search = "";
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
    }
    // search user
    $sql = "SELECT * FROM users WHERE username LIKE '%$search%' limit 10";
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

<h3 style="text-align: center;">Danh sách người dùng</h3>
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
            username
        </td>
        <td>
            Thông tin
        </td>
    </thead>
    <tbody>
        <?php foreach ($data as $key => $value) { ?>
            <tr>
                <td>
                    <?= $index++; ?>
                </td>
                <td>
                    <a href="./index.php?page=Bài%2019&id=<?= $value['id']; ?>"> <?= $value['username']; ?> </a>
                </td>
                <td>
                    <?= $value['info']; ?>
                </td>
            </tr>
        <?php } 
            if (count($data) == 0) {
                echo "<tr><td colspan='3'>Không có người dùng nào</td></tr>";
            }
        ?>
    </tbody>
</table>