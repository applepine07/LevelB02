<?php include_once "../base.php";
$id=$_GET['id'];
$subject=$Que->find($id);
$subject['sh']=($subject['sh']+1)%2;
$Que->save($subject);

to("../back.php?do=poll");

?>