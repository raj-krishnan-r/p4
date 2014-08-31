<?php
include("../connect.php");
$id=$_GET['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Issue list for event ID : <?php echo $_GET['id'];?></title>
<link rel="stylesheet" href="style.css">

</head>


<body>
<h1><center>Issue list for event ID : <?php echo $_GET['id'];?></center></h1>
<?php
$sql=mysql_query("select kind,description,remail from reports where status = 1 and eid=$id") or die(mysql_error());
if(mysql_num_rows($sql)!=0)
{
	echo '<center><table width="80%" border="1" cellspacing="0"><tr><th>Kind</th><th>Description</th><th>Reporter Email</th></tr>';
while($row=mysql_fetch_array($sql))
{
	echo "<tr><td>".$row['kind']."</td><td>".$row['description']."</td><td>".$row['remail']."</td></tr>";
}
}
else
echo "No reported issues found !";
?>
</table></center>
</body>
</html>