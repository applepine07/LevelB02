<?php
include_once "../base.php";
$type = $_GET['type'];
$newslist = $News->all(['type' => $type]);
foreach ($newslist as $key => $value) {
    echo "<p><a onclick='getnews({$value['id']})'>";
    echo $value['title'];
    echo "</a></p>";
}
