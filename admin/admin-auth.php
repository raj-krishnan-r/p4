<?php
session_start();
$pin=$_POST['pin'];
if($pin==1452)
{
	$_SESSION['act']=1;
	header('location: issues.php');

}
else
{
	header('location: index.php?s=reject');
}
?>