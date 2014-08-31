<?php
session_start();
if(!isset($_SESSION['act']))
header('location: index.php?s=login');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Notify to User</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<center><h1>Notify to poster</h1></center>
<table border="0"><tr><td><a href="quit.php">Logout</a></td>
<td></td><td><a href="action.php?id=<?php echo $_GET['id']; ?>&uid=<?php echo $_GET['uid']; ?>" title="Back to Actions">Back</a></td></tr></table>
<center><p>Notify to the poster about the issues recieved.</p>
<form action="send.php" method="post">
<table>
<tr><td>
<center><input size="50" type="text" name="subject" placeholder="Message Subject"/></center></td></tr>
<tr><td>
<textarea rows="10" cols="50" name="message" placeholder="Description"></textarea></td></tr>
<input type="hidden" name="uid" value="<?php echo $_GET['uid'];?>">
<input type="hidden" name="eid" value="<?php echo $_GET['id'];?>">

</table><button type="Submit">Send</button>
</form>
</body>
</html>