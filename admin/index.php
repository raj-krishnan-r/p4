<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Panel</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<center>

<h1>NoBo Administration System</h1>
<h5>
<?php 
if(isset($_GET['s'])==true)
{
	if($_GET['s']=='reject')
	echo "Authentication failed !<br>Entered PIN is Wrong";
	if($_GET['s']=='login')
	echo "Request rejected !<br>You have to authenticate";
	if($_GET['s']=='quit')
	echo "Logged Out";
}
?>
</h5>
<form method="post" action="admin-auth.php">
<label for="pin">Enter your PIN code : </label><input size="10" maxlength="4" placeholder="PIN" type="password" name="pin">
<br><br><button type="submit">Authenticate</button>
</form>
</center>
</body>
</html>