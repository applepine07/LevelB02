<fieldset>
    <legend>目前位置：首頁 > 問卷調查</legend>
    <table>
        <tr>
            <td style="width:10%">編號</td>
            <td style="width:50%">問卷題目</td>
            <td style="width:15%">投票總數</td>
            <td style="width:10%">結果</td>
            <td>狀態</td>
        </tr>
        <?php
        $rows = $Que->all(['sh' => 1], " AND `parent` = '0'");
        foreach ($rows as $key => $row) {
        ?>
            <tr>
                <td><?= $key+1; ?></td>
                <td><?= $row['text']; ?></td>
                <td><?= $row['count']; ?></td>
                <td>
                <a href='?do=result&id=<?= $row['id']; ?>'>結果</a>
                </td>
                <td>
                    <?php
                    if (isset($_SESSION['login'])) {
                       echo "<a href='?do=vote&id={$row['id']}'>";
                       echo "參與投票";
                       echo "</a>";
                    }else{
                        echo "請先登入";
                    }
                    ?>
                </td>
                <td></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div>
        
    </div>
</fieldset>
