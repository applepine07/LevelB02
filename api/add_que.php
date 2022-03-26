<?php
include_once "../base.php";
$subject = $_POST['subject'];
$Que->save(['text' => $subject, 'count' => 0, 'parent' => 0]);

// 抓到這個新增的問卷主題id，拿來給選項用
$parent_id = $Que->math('max', 'id');

foreach ($_POST['options'] as $opt) {
    $Que->save(['parent' => $parent_id,'sh'=>1, 'count' => 0, 'text' => $opt]);
}

to("../back.php?do=poll");
