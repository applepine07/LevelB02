<?php
include_once "../base.php";

// dd($_POST);
if(!empty($_POST)){
    $news['title']=$_POST['title'];
    $news['text']=$_POST['text'];
    $news['type']=$_POST['type'];

    $News->save($news);
}

to("../back.php?do=news");
?>