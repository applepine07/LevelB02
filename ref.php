<?php
include_once "../base.php";
$news=$News->find($_POST['news']);
$type=$_POST['type'];

switch($type){
    case 1:
        // log資料表
        $Log->del(['news'=>$news['id'],'user'=>$_SESSION['login']]);
        $news['good']--;
        // news資料表
        $News->save($news);
        break;
    case 2:
        // log資料表
        $Log->save(['news'=>$news['id'],'user'=>$_SESSION['login']]);
        $news['good']++;
        // news資料表
        $News->save($news);
        break;
}

?>