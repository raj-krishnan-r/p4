<?php
session_start();
include("connect.php");
$cpass=$_POST['current'];
$npass=$_POST['new'];
if($npass=='')
header('location: leak.php');
$id=$_SESSION['userid'];
$sql=mysql_query("select pass from userbase where id = '$id'") or die(mysql_error());
while($row=mysql_fetch_array($sql))
$rpass=$row['pass'];
if($cpass==$rpass)
{
	$sql1=mysql_query("update userbase set pass = '$npass' where id = '$id'")or die(mysql_error());
	header('location: settings.php?state=1');
}
else
{
	header('location: password_update.php?state=1');
}
?>