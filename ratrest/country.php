<?php
include("connect.php");
$sql=mysql_query("SELECT country,id FROM COUNTRY");
while($row = mysql_fetch_array($sql))
{
	echo '<option value="'.$row['country'].'"></option>';
}
mysql_close($con);
?>