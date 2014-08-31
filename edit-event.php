<?php
session_start();
include("connect.php");
$uid=$_SESSION['userid'];
$id=$_GET['id'];
$sql=mysql_query("select title,about,address,country,state,district,website,phone,fdate,tdate,ftime,ttime,geolocation,cat,scat,id from event where id = $id")or die(mysql_error());
while($row=mysql_fetch_array($sql))
{
$title=ucfirst($row['title']);
$about=$row['about'];
$address=$row['address'];
$country=$row['country'];
$state=$row['state'];
$district=$row['district'];
$website=$row['website'];
$phone=$row['phone'];
$fdate=$row['fdate'];
$tdate=$row['tdate'];
$ftime=$row['ftime'];
$ttime=$row['ttime'];
$geo=$row['geolocation'];
$cat=$row['cat'];
$scat=$row['scat'];
$id=$row['id'];
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link type="text/css" rel="stylesheet" href="style/locationpicker.css" />

<link rel="stylesheet" href="style/homestyle.css">
<style>
body
{
	background:none;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<form method="post" action="update.php">
<center><table class="addeventform" cellspacing="" cellpadding="10">
<tr>
<tr><td></td><td><td></td><td class="welcomee">Basic Info</welcomee></td><td></td></tr>
<td class="addeventlabel">
Event Title
</td><td class="addeventlabel">
<input type="text" id="title" class="formlabel" name="title" placeholder="Title/Name/Subject of the Event" value="<?php echo $title ?>">
</td>
</tr>
<tr>
<td class="addeventlabel">About</td>
<td>
<textarea rows="10" name="about" id="about" class="formlabel" placeholder="Explain About the Event"><?php echo $about; ?></textarea>
</td>
<td class="addeventlabel">Address</td>

<td>
<textarea class="formlabel" name="address" id="address" placeholder="Postal Address of the Event" rows="10"><?php echo $address; ?></textarea>
</td>
</tr>
<tr><td></td><td><td></td><td class="welcomee">Place or Location</welcomee></td><td></td></tr>

<tr><td class="addeventlabel">Country</td>
<td class="addeventlabel"><input class="formlabel" type="text" name="country" id="country" list="countries" autocomplete="off" onBlur="s();" value="<?php echo $country; ?>"></td><td class="addeventlabel">State</td><td class="addeventlabel"><input name="state" type="text" class="formlabel" id="state" list="states" autocomplete="off" onBlur="d();" value="<?php echo $state; ?>"></td>
</tr><td class="addeventlabel">District</td><td class="addeventlabel"><input name="district" type="text" class="formlabel" id="district" list="districts" autocomplete="off"  value="<?php echo $district; ?>"></td></tr>
<tr>
<td class="addeventlabel">Geo-Location</td><td><input type="text" name="geo" id="geo" class="formlabel" value="<?php echo $geo; ?>"></td></tr>
<tr>
</tr><tr>
<tr><td></td><td><td></td><td class="welcomee">Date and Timing</welcomee></td><td></td></tr>
<tr>
<td class="addeventlabel">
From date : 
</td><td class="addeventlabel"><input class="formlabel" type="date" name="fdate" id="fdate" value="<?php echo $fdate; ?>"/></td><td class="addeventlabel">Till Date : </td><td class="addeventlabel"><input class="formlabel" type="date" name="tdate" id="tdate" value="<?php echo $tdate; ?>"/></td>
</tr>
<tr>
<td class="addeventlabel">From Time</td><td class="addeventlabel"><input type="time" name="ftime" id="ftime" class="formlabel" value="<?php echo $ftime; ?>"></td><td class="addeventlabel">Till Time</td><td class="addeventlabel"><input type="time" name="ttime" id="ttime" value="<?php echo $ttime; ?>" class="formlabel"></td>
</tr>
<tr><td></td><td><td></td><td class="welcomee">Conact Info</welcomee></td><td></td></tr>

<tr>
<td class="addeventlabel">
Website
</td><td class="addeventlabel"><input class="formlabel" type="url" id="website" name="website" placeholder="http://www.someone.com/mybirthday.html" value="<?php echo $website; ?>"></td><td class="addeventlabel">Phone</td><td class="addeventlabel">
<input value="<?php echo $phone; ?>" class="formlabel" type="text" name="phone" id="phone" placeholder="Phone number with country code"></td>
</tr>
</table></center>
<center><button type="submit" class="formlabel">Update</button></center>
<input type="hidden" name="cat" id="cat" value="<?php echo $cat;?>">
<input type="hidden" name="scat" id="scat" value="<?php echo $scat;?>">
<input type="hidden" name="id" id="scat" value="<?php echo $id;?>">
</form>
<datalist id="countries">
</datalist>
<datalist id="states"></datalist>
<datalist id="districts"></datalist>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false&maptype=roadmap"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="lib/jquery.locationpicker.js"></script>
	<script>
		$('#geo').locationPicker();
	</script>
</body>
</html>