<?php
include("connect.php");
$eid=$_POST['eid'];
$kind=$_POST['kind'];
$des=mysql_real_escape_string($_POST['description']);
$email=$_POST['email'];
$sql=mysql_query("insert into reports values ('$eid','$kind','$des','$email',1,0)") or die(mysql_error());
header('location: complaint_registered.php');
?>