<?php
include("connect.php");
$id=$_GET['id'];
$sql=mysql_query("SELECT id FROM states where states = '$id'");
while($row = mysql_fetch_array($sql))
{
	$cid=$row['id'];
	$sql1=mysql_query("select district from districts where stateid = '$cid'");
	while($row=mysql_fetch_array($sql1))
	echo '<option value="'.$row['district'].'">';
}
mysql_close($con);
?>