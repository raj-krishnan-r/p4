<?php
session_start();
include("connect.php");
$uid=$_SESSION['userid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<script src="direct.js"></script>
<script src="lib/ajax_1_10_2.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="style/homestyle.css">
<style>
body
{
	background:none;
}
</style>
</head>

<body>

<about>Events Which you ever posted</about>
<br><br>
<center>
<?php
$sql=mysql_query("select title,id,datetime from event where uid = $uid")or die(mysql_error());
$count=mysql_num_rows($sql);
if($count!=0)
echo '<table border="1" style="" cellspacing="0" cellpadding="10" class="table-posted">
<tr><th>Title</th><th>Posted Date & Time</th><th>Options</th><th>Views</th></tr>';
while($row=mysql_fetch_array($sql))
{
	$id=$row['id'];
	$viewgrab=mysql_query("select counts from view where id=$id");
	while($row1=mysql_fetch_array($viewgrab))
	{
		$view=$row1['counts'];
	}
	$viewrow=mysql_num_rows($viewgrab);
	if($viewrow==0){$view=0;}
echo "<tr id=\"".$row['id']."events\" ><td class=\"formlabel\"><a target=\"_new\" href=\"eventviewer.php?id=".$row['id']."\">".
$row['title']."</a></td><td>".$row['datetime']." (IST)</td>
<td><a href=\"#\"><span title=\"Delete the event\" style=\"cursor:pointer;\" onclick=\"deleteevent('".$row['id']."');\">Delete&nbsp;&nbsp;&nbsp;</span></a> | &nbsp;&nbsp;&nbsp;<a title=\"Edit the event.\" href=\"edit-event.php?id=".$row['id']."\">Edit</a>
&nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;&nbsp;<a title=\"Any spam, abuse or edit report submitted to the admin associated with this event.\" href=\"admin/reportlist.php?id=".$row['id']."\">Issues or Complaints</a></td>
<td>".$view."</td></tr>";

}
if($count==0)
{
	echo'<center><p>No Events is found posted by you.<br>To post an event, click on the \'Add an Event\' option above.</p></center>';
}
?>
</table>
</center>
</body>
</html>