<?php
session_start();
include("connect.php");
$title=ucfirst(mysql_escape_string($_POST['title']));
$about=mysql_escape_string($_POST['about']);
$address=mysql_escape_string($_POST['address']);
$country=$_POST['country'];
$state=$_POST['state'];
$district=$_POST['district'];
$website=$_POST['website'];
$phone=$_POST['phone'];
$fdate=$_POST['fdate'];
$tdate=$_POST['tdate'];
$ftime=$_POST['ftime'];
$ttime=$_POST['ttime'];
$geo=$_POST['geo'];
$cat=$_POST['cat'];
$scat=$_POST['scat'];
$id=$_POST['id'];
$uid=$_SESSION['userid'];
date_default_timezone_set('Asia/Calcutta');
$date=date('y-m-d h:m:s');
$sql=mysql_query("update event set title='$title',about='$about',address='$address',country='$country',state='$state',district='$district',website='$website',phone='$phone',fdate='$fdate',tdate='$tdate',ftime='$ftime',ttime='$ttime',geolocation='$geo',cat='$cat',scat='$scat',datetime='$date',uid='$uid' where id=$id")or die(mysql_error());
header('location: posted.php');
?>