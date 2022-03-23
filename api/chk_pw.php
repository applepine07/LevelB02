<?php
include_once "../base.php";

$chk=$User->math('count','*',['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
if($chk>0){
    echo 1;
    $_SESSION['login']=$_POST['acc'];
}else{
    echo 0;
}

// to("../index.php?do=login");
?>