<?php
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
?>

<table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên đăng nhập</th>
                <th>Ảnh đại diện</th>
                <th>Họ và tên</th>
                <th>Tùy chọn</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td><img src='uploads/" . $row['image'] . "' width='50' height='50' alt='Ảnh đại diện'></td>";
                echo "<td>" . $row['fullname'] . "</td>";
                echo "<td>";
                echo "<a href='index.php?act=detail&id=" . $row['id'] . "' class='btn btn-info'>Chi tiết</a> ";
                echo "<a href='index.php?act=edit&id=" . $row['id'] . "' class='btn btn-warning'>Sửa</a> ";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>