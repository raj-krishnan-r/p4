<?php
$id=$_GET['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complain</title>
<link rel="stylesheet" href="style/general.css" />
<style>
body
{
	background:none;
}
</style>
</head>

<body>
<center>
<welcome>Report event <sup><?php echo $id; ?></sup> for scrutiny.</welcome>
<p>Please fill in your concerns below</p>

<form method="post" action="reg_complain.php">
<table><tr>
<td><label style="font-family:'Segoe UI', Arial, Verdana; font-size:15px;" for="kind">Kind</label></td><td><select style="font-family:'Segoe UI', Arial, Verdana; font-size:18px;" name="kind"><option>Fake Event</option><option>Abusive Content</option><option>Edition Required</option></select></td><tr></tr><tr>
<td><label style="font-family:'Segoe UI', Arial, Verdana; font-size:15px;" for="description">Describe about the issue</label></td><td><textarea style="font-family:'Segoe UI', Arial, Verdana; font-size:18px;" rows="5" cols="30" name="description"></textarea>
</td></tr><tr></tr><tr><td><label for="email" style="font-family:'Segoe UI', Arial, Verdana; font-size:15px;">E-mail of yours</label></td><td><input type="email" name="email"></td></tr></tr></table>
<input style="font-family:'Segoe UI', Arial, Verdana; font-size:18px;" type="hidden" name="eid" value="<?php echo $id; ?>">
<button type="submit">Submit</button>
</form>
</center>
</body>
</html>