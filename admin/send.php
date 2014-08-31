<?php
include("../connect.php");
$subject=mysql_real_escape_string($_POST['subject']);
$content=mysql_real_escape_string($_POST['message']);
$uid=$_POST['uid'];
$eid=$_POST['eid'];
$sql=mysql_query("insert into message values ('$uid','$content','$subject',0)") or die(mysql_error());
$sql1=mysql_query("update reports set status = 2 where eid = $eid") or die(mysql_error());

header('location: issues.php?not=sent');
?>