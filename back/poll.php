<h1>問卷管理</h1>

<fieldset>
    <legend>目前位置：首頁 > 最新文章區</legend>
    <div><button onclick="location.href='?do=add_que'">新增問卷</button></div>
    <table style="width: 95%;">
        <tr>
            <td style="width:70%">問卷名稱</td>
            <td style="width:10%">投票數</td>
            <td style="width:10%">開放</td>
        </tr>
        <?php
        $div = 3;
        $all = $Que->math('count', '*', ['parent' => 0]);
        $pages = ceil($all / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        $rows = $Que->all(['parent' => 0], " limit $start,$div");
        foreach ($rows as $key => $row) {
            $chk = ($row['sh'] == 1) ? "checked" : "";
        ?>
            <tr>
                <td><?= $row['text']; ?></td>
                <td><?= $row['count']; ?></td>
                <td>
                    <a type="button" href="./api/flag.php?id=<?= $row['id']; ?>"><?= ($row['sh'] == 1) ? "開放" : "關閉"; ?></a>
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
            echo "<a href='?do=poll&p=$prev'> ";
            echo " < ";
            echo " </a>";
        }
        for ($i = 1; $i <= $pages; $i++) {
            $fontsize = ($now == $i) ? "22px" : "16px";
            echo "<a href='?do=poll&p=$i' style='font-size:$fontsize'> ";
            echo $i;
            echo " </a>";
        }
        if (($now + 1) <= $pages) {
            $next = $now + 1;
            echo "<a href='?do=poll&p=$next'> ";
            echo " > ";
            echo " </a>";
        }
        ?>
    </div>
    <div>
        <input type="submit" value="確定修改">
    </div>
</fieldset>