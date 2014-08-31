<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="style/general.css">
<link rel="stylesheet" href="style/public.css">
<style>
.resultable
{
	width:30%;
	text-align:center;
}
</style>
</head>

<body style="background:none;">
<welcome>Settings | Update Password</welcome>
<center>
<p id="error"><?php if(!isset($_GET['state'])){}else {echo "Current password entered is wrong";} ?></p>
<form method="post" action="updatepass.php">
<table class="resultable">
<tr><td>Current Password </td><td><input required="required" type="password" name="current"></td></tr>
<tr><td>New Password</td><td><input required="required" type="password" name="new"></td></tr></table>
<button id="subbutt" type="submit">Update</button>
</form>
</center>
</body>
</html>