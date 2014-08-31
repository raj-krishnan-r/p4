<?php
include("connect.php");
$id=$_GET['id'];
$sql=mysql_query("DELETE FROM EVENT WHERE ID=$id")or die(mysql_error());
$sql2=mysql_query("DELETE FROM view WHERE ID=$id")or die(mysql_error());
$sql3=mysql_query("DELETE FROM reports WHERE eid=$id")or die(mysql_error());


echo "1";
?>