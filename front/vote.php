<?php
$subject = $Que->find($_GET['id']);
?>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?= $subject['text']; ?><span></span></legend>
    <h3><?= $subject['text']; ?></h3>
    <form action="api/vote.php" method="post">
        <?php
        $rows = $Que->all(['parent' => $_GET['id']]);
        foreach ($rows as $key => $row) {
        ?>
            <p><input type="radio" name="opt" value="<?= $row['id']; ?>"><?= $row['text']; ?></p>
        <?php
        }
        ?>
        <div class="ct">
            <input type="submit" value="我要投票">
        </div>
    </form>

</fieldset>