<?php
    $COUNT = 1000;
?>

<style>
    /* css table */
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        padding: 8px;
        text-align: left;
        border: 1px solid black;
        text-align: center;
    }
    tr:hover {background-color:#f5f5f5;}
</style>

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