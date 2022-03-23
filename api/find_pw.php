<?php
include_once "../base.php";
$email=$_POST['email'];
$user=$User->find(['email'=>$email]);
if(empty($user)){
    echo "查無此資料";
    // dd($user);
}else{
    echo "您的密碼為:".$user['pw'];
    // dd($user);
}

// to("../index.php?do=login");
?>

