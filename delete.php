<?php
session_start();
include("connect.php");
$id=$_SESSION['userid'];
/*Event Deletion*/
$sql=mysql_query("select id from event where uid = '$id'") or die(mysql_error());
while($row=mysql_fetch_array($sql))
{
	$eid=$row['id'];
	$sql1=mysql_query("delete from event where id = '$eid'")or die(mysql_error());
}
/*Account Deletion*/
$sql3=mysql_query("delete from userbase where id = '$id'") or die(mysql_error());
echo "Account Deletion Completed ";
session_destroy();
header('location: event-login.php?state=bye');
?>