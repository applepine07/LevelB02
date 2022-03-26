<?php
include_once "../base.php";
// 依從前端收來的選項id去撈選項相關欄位資料
$opt=$Que->find($_POST['opt']);
// 被投的選項要加1
$opt['count']++;

// 依從前端收來的選項id去撈主題相關欄位資料
$subject=$Que->find($opt['parent']);
// 被投的主題也要加1
$subject['count']++;

$Que->save($opt);
$Que->save($subject);

to("../index.php?do=result&id={$subject['id']}");

?>