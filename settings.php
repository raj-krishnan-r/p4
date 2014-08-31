<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Settings</title>
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
<welcome>Account Settings</welcome>
<center>
<br><br><br>
<p id="error"><?php if(!isset($_GET['state'])){}else {echo "Password Updated";} ?></p>
<table class="resultable"><tr class="resulttablerow"><td>
<a href="password_update.php">Update Password</a><br></td></tr><tr></tr><tr class="resulttablerow"><td>
<a href="delete_account.php">Delete Account</a></td></tr></table>
</center>
</body>
</html>