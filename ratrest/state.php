<?php
include("connect.php");
$id=$_GET['id'];
$sql=mysql_query("SELECT id FROM country where country = '$id'");
while($row = mysql_fetch_array($sql))
{
	$cid=$row['id'];
	$sql1=mysql_query("select states from states where countryid = '$cid'");
	while($row=mysql_fetch_array($sql1))
	echo '<option value="'.$row['states'].'">';
}
mysql_close($con);
?>