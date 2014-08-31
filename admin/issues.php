<?php
session_start();
if(!isset($_SESSION['act']))
header('location: index.php?s=login');
include("../connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Issues list</title>
<link rel="stylesheet" href="style.css">

</head>

<body>
<h1><center>Admin Panel</center></h1>
<table border="0"><tr><td><a href="quit.php">Logout</a></td><td></td></tr></table>
<h3><center>Listings of all issues</center></h3>
<center>
<?php

if(isset($_GET['not']))
{
	if($_GET['not']=='d_success')
	echo "Event is deleted !";
	if($_GET['not']=='sent')
	echo "Notification sent to user !";
}
?>
<?php
$sql=mysql_query("select eid,count(eid) from reports where status=1 group by eid order by count(eid) desc") or die(mysql_error());
$count=mysql_num_rows($sql);
if($count!=0)
{

	echo "<table cellspacing=\"0\" cellpadding=\"10\" border=\"1\"><tr><th>Event ID</th><th>Number of Reports</th><th>Options</th></tr>";
while($row=mysql_fetch_array($sql))
{
	$eid=$row['eid'];
	$sql2=mysql_query("select uid from event where id = $eid") or die(mysql_error());
	while($q=mysql_fetch_array($sql2))
	{
		$uid=$q['uid'];
	}
	echo "<tr><td>";
	echo $row['eid'];
	echo "</td>";
	echo "<td>";
	echo $row['count(eid)'];
	echo "</td><td>";
	echo '<span><a target="_new" href="reportlist.php?id='.$row['eid'].'">View the '.$row['count(eid)'].' reported issues</a></span> | ';
	echo '<span><a target="_new" href="../eventviewer.php?id='.$row['eid'].'">View Event info page</a></span> | ';
	echo '<span><a target="_new" href="action.php?id='.$row['eid'].'&uid='.$uid.'">Action</a></span>';
	echo "</td>";

}
echo "</table>";
}
else
{
	echo "No issue to be displayed";
}
?>
</center>
</body>
</html>