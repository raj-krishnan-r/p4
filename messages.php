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

<about>Messages or Notifications from administration</about>
<br><br>
<center>
<?php
$sql=mysql_query("select subject,message,id from message where rid = $uid")or die(mysql_error());
$count=mysql_num_rows($sql);
if($count!=0)
echo '<table border="1" style="" cellspacing="0" cellpadding="10" class="table-posted">
<tr><th>Subject</th><th>Options</th></tr>';
while($row=mysql_fetch_array($sql))
{
	$id=$row['id'];
echo "<tr id=\"".$row['id']."events\" ><td class=\"formlabel\"><a href=\"message.php?id=".$row['id']."\">".
$row['subject']."</a></td>
<td><a href=\"#\"><span title=\"Delete the event\" style=\"cursor:pointer;\" onclick=\"deletemessage('".$row['id']."');\">Delete&nbsp;&nbsp;&nbsp;</span></a> </td></tr>";

}
if($count==0)
{
	echo'<center><p>No messages or notifications, recieved from administration.</p></center>';
}
?>
</table>
</center>
</body>
</html>