<?php
include("connect.php");
session_start();
$title=mysql_real_escape_string(ucfirst($_POST['title']));
$about=mysql_real_escape_string($_POST['about']);
$address=mysql_real_escape_string($_POST['address']);
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
$uid=$_SESSION['userid'];
if(!isset($about,$title,$date,$ttime,$ftime))
header('location: ../leak.php');
date_default_timezone_set('Asia/Calcutta');
$date=date('y-m-d h:m:s');
$valid=1;
if($valid==1)
{
$sql=mysql_query("insert into event values ('$title','$about','$address','$country','$state','$district','$website','$phone','$fdate','$tdate','$ftime','$ttime','$geo','$cat','$scat','$date','$uid',0)")or die(mysql_error());
//echo "Event Added :), Here We GO... ";
header('location: ../saved.php');
}
else
{
	header('location: issues.php');
}

?>