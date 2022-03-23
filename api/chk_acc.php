<?php
include_once "../base.php";

$chk=$User->math('count','*',['acc'=>$_POST['acc']]);

if($chk>0){
    echo 1;
}else{
    echo 0;
}

// to("../index.php?do=login");
?>