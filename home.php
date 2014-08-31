<?php
session_start();
if($_SESSION['live']!=1)
{header('location: index.php');}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="lib/ajax_1_10_2.js"></script>
<script src="direct.js"></script>
<script src="see.js"></script>


<script>
function alignframe()
{
	var varient=window.innerHeight-85;
	document.getElementById('dataframe').style.height=varient+'px';
}
function fill(l)
{
	$.get(l,function(data,status){
	document.getElementById('dataframe').innerHTML=data;});
}
</script>
<link rel="stylesheet" href="style/homestyle.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NoBo : <?php echo $_SESSION['title']; ?></title>
</head>

<body onload="alignframe(),baknfro('title',20,'#006633','t');" onresize="alignframe()">
<div class="topstrip"><span class="logotext_post">NoBo</span>


<span class="options"><table cellspacing="20">
<tr>
<td><span id="title" style="color:#FFF;"><?php echo $_SESSION['title'];?></span></td>
<td onclick="fill('ratrest/add-event.php')" class="optionshigh" title="Click to add an Event">
Add an Event
</td>
<td onclick="frameload('posted.php');" class="optionshigh" title="Lists the events which you have already posted, from there you can edit or delete those posts too.">
Posted Events</td>
<td class="optionshigh"  onclick="frameload('settings.php');" title="Include options to edit the account credentials, or delete the account.">
Settings</td>
<td onclick="frameload('messages.php');" class="optionshigh" title="Lists any notifications or messages from administration for you.">
Messages</td>
<td class="optionshigh" title="Logout of your Account"><a href="logout.php">
Logout</a></td>
</tr>
</table>

</span></div>
<div class="dataframe" id="dataframe">
<iframe name="dataframe" height="100%" frameborder="0" class="frame" id="dataframe"></iframe>
</div>
</body>
</html>