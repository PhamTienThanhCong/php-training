<?php
    $COUNT = 1000;
?>

<table>
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên Sách</th>
            <th>Nội dung sách</th>
        </tr>
    </thead>
    <!-- for 1 to 1000 -->
    <?php for($i = 1; $i <= $COUNT; $i++) { ?>
        <tr>
            <td><?= $i; ?></td>
            <td>Tên sách <?= $i ?></td>
            <td>Nội dung <?= $i ?></td>
        </tr>
    <?php } ?>
</table>