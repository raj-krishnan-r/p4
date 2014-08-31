<?php
include("connect.php");
$id=$_GET['id'];
$sql=mysql_query("DELETE FROM message WHERE ID='$id'")or die(mysql_error());
echo "1";
?>