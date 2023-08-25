<div class="main">
    <div class="list-left">
        <ul>
            <!-- render $HOME_WORK -->
            <?php foreach ($HOME_WORK as $key => $value) : ?>
                <li>
                    <a href="./index.php?page=<?= $key ?>"><?= $key ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <!-- right content -->
    <div class="list-right">
        <h2 style="text-align: center;"><?= $page ?></h2>
        <?php 
            if ($content != null) {
                include_once("./pages/$content");
            } else {
                echo "<h3 style='text-align: center;'>Không có nội dung</h3>";
            }
        ?>
    </div>
</div>