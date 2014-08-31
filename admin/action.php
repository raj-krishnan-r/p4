<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Action Wizard</title>
<link rel="stylesheet" href="style.css">

</head>

<body>
<h1><center>Action to carry on event : <?php echo $_GET['id']; ?></center></h1><br><center><table><tr><td><a href="delete_procedures.php?id=<?php echo $_GET['id'];?>&uid=<?php echo $_GET['uid']; ?>">Go to deletion procedures</a></td><td></td><td><a href="notify.php?id=<?php echo $_GET['id'];?>&uid=<?php echo $_GET['uid']; ?>">Notify about the complaints to organizer</a></td></tr></table></center>
</body>
</html>