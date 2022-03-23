<fieldset>
    <legend>最新文章管理</legend>
    <div><button onclick="location.href='?do=add_news'">新增文章</button></div>
    <form action="api/news_admin.php" method="post">
        <table style="width: 95%;">
            <tr>
                <td style="width:10%">編號</td>
                <td style="width:70%">標題</td>
                <td style="width:10%">顯示</td>
                <td style="width:10%">刪除</td>
            </tr>
            <?php
            $div = 3;
            $all = $News->math('count', '*');
            $pages = ceil($all / $div);
            $now = $_GET['p'] ?? 1;
            $start = ($now - 1) * $div;
            $rows = $News->all(" limit $start,$div");
            foreach ($rows as $key => $row) {
                $chk = ($row['sh'] == 1) ? "checked" : "";
            ?>
                <tr>
                    <td><?= $start + 1 + $key; ?></td>
                    <td><?= $row['title']; ?></td>
                    <td>
                        <input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= $chk; ?>>
                    </td>
                    <td>
                        <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                        <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <div>
            <?php
            if (($now - 1) > 0) {
                $prev = $now - 1;
                echo "<a href='?do=news&p=$prev'> ";
                echo " < ";
                echo " </a>";
            }
            for ($i = 1; $i <= $pages; $i++) {
                $fontsize = ($now == $i) ? "22px" : "16px";
                echo "<a href='?do=news&p=$i' style='font-size:$fontsize'> ";
                echo $i;
                echo " </a>";
            }
            if (($now + 1) <= $pages) {
                $next = $now + 1;
                echo "<a href='?do=news&p=$next'> ";
                echo " > ";
                echo " </a>";
            }
            ?>
        </div>
        <div>
            <input type="submit" value="確定修改">
        </div>
    </form>
</fieldset>