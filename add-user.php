<?php
include("connect.php");
session_start();
date_default_timezone_set('Asia/Calcutta');
$date=date('y-m-d h:m:s');
$type=$_POST['type'];
$title=ucfirst($_POST['name']);
$email=$_POST['email'];
$pass=$_POST['pass'];
$add=mysql_real_escape_string($_POST['add']);
$phone=$_POST['phone'];
$about=mysql_real_escape_string($_POST['about']);
$country=$_POST['country'];
$state=$_POST['state'];
$district=$_POST['district'];
if(!isset($type,$title,$email,$pass,$add,$phone,$about))
header('location: leak.php');
$sql=mysql_query("INSERT INTO USERBASE VALUES ('$type','$title','$email','$pass','$phone','$about','$date','0','$add','$country','$state','$district')")or die(mysql_error());
$_SESSION['title']=$title;
$_SESSION['email']=$email;
header('location: welcome.php');
?>