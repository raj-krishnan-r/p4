<?php
include("connect.php");
$mid=$_GET['id'];
$sql=mysql_query("select subject,message from message where id = '$mid'")or die (mysql_error());
while($row=mysql_fetch_array($sql))
{
$sub=$row['subject'];
$mes=$row['message'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
body
{
	background:none;
}
</style>
</head>

<body>

<a href="messages.php">Back to messages</a>
<center><table width="70%">
<tr>
<td style="font-family:'Segoe UI', Arial, Verdana; font-size:25px; color:#fff;"><center><?php echo $sub; ?></center></td>
</tr>
<tr>

<td style="font-family:'Segoe UI', Arial, Verdana; font-size:14px; color:#06C;">
<?php echo $mes; ?>
</td>
</tr>
<tr><td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:right;">-Administrator</td></tr>
</table>
</center>
</body>
</html>