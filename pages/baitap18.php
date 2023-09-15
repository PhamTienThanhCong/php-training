<h3 style="text-align: center;">Danh sách bài đăng</h3>
<a href="./index.php?page=Bài%2017">Thêm mới</a>
<table>
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

        <?php
        // sql select news table
        // thêm phân trang
        $sql = "SELECT * FROM news ORDER BY id DESC LIMIT 0, 10";
        // get result
        $result = mysqli_query($conn, $sql);
        // check result
        if (mysqli_num_rows($result) > 0) {
            // fetch result
            $index = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>";
                echo $index++;
                echo "</td>";
                echo "<td>";
                echo "<a href='./index.php?page=Bài%2019&id=". $row['id'] ."'>".$row['title']."</a>";
                echo "</td>";
                echo "<td>";
                echo $row['content'];
                echo "</td>";
                echo "<td>";
                echo $row['author'];
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<p class='text-error'>Không có bài đăng nào</p>";
        }

        ?>

    </tbody>
</table>