<?php
session_start();
if(!isset($_SESSION['act']))
header('location: index.php?s=reject');
include("../connect.php");
$subject=mysql_real_escape_string($_POST['subject']);
$content=mysql_real_escape_string($_POST['message']);
$uid=$_POST['uid'];
$eid=$_POST['eid'];

$sql=mysql_query("insert into message values ('$uid','$content','$subject',0)") or die(mysql_error());
$sql1=mysql_query("delete from reports where eid = '$eid'") or die(mysql_error());
$sql2=mysql_query("delete from event where id = '$eid'") or die(mysql_error());
$sql2=mysql_query("DELETE FROM view WHERE ID='$eid'")or die(mysql_error());

header('location: issues.php?not=d_success');
?>