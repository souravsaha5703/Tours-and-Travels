<?php
session_start();
$date=$_POST['date'];
$cnumber=$_POST['tnumber'];
$tname=$_POST['tname'];
$tage=$_POST['tage'];
$_SESSION['temp_data']=array('date'=>$date,'contact'=>$cnumber,'name'=>$tname,'age'=>$tage);
?>