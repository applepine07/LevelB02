<?php
$subject = $Que->find($_GET['id']);
?>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?= $subject['text']; ?><span></span></legend>
    <h3><?= $subject['text']; ?></h3>
        <?php
        $rows = $Que->all(['parent' => $_GET['id']]);
        foreach ($rows as $key => $row) {
            // 如果分母為0(也就是這主題還沒有人投票)，就為1
            $div = ($subject['count'] == 0) ? 1 : $subject['count'];
            // 四捨五入後取2位，這時應是0.xx
            $rate = round($row['count'] / $div, 2);
        ?>
            <div style="display: flex;">
                <div style="width: 40%;"><?= $row['text']; ?></div>
                <div style="background-color: #ccc;height:25px;width:<?= $rate * 40; ?>%"></div>
                <div><?= $row['count']; ?>票(<?= $rate * 100; ?>%)</div>
            </div>
        <?php
        }
        ?>
    <div class="ct">
        <button onclick="location.href='?do=que'">返回</button>
    </div>

</fieldset>