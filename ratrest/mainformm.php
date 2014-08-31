<?php
session_start();
include("connect.php");
$uid=$_SESSION['userid'];
$sql=mysql_query("select phone,address from userbase where id = '$uid'");
while($data=mysql_fetch_array($sql))
{
$phone=$data['phone'];
$address=$data['address'];
}
?>
<html>
<head>
	<link type="text/css" rel="stylesheet" href="../style/locationpicker.css" />
<script src="formengine.js"></script>
<script src="../lib/ajax_1_10_2.js"></script>
<link rel="stylesheet" href="../style/homestyle.css">
<style>
body
{
	background:none;
}
</style>
</head>
<body onLoad="country();" onUnload="ohno();">
<?php echo $_GET['cat']." | ".$_GET['scat'];?>
<form method="post" action="eventprocessor.php">
<center><table class="addeventform" cellspacing="" cellpadding="10">
<tr>
<tr><td></td><td><td></td><td class="welcomee">Basic Info</welcomee></td><td></td></tr>
<td class="addeventlabel">
Event Title
</td><td class="addeventlabel">
<input required maxlength="50" type="text" id="title" class="formlabel" name="title" placeholder="Title/Name/Subject of the Event">
</td>
</tr>
<tr>
<td class="addeventlabel">About</td>
<td>
<textarea required rows="10" name="about" id="about" class="formlabel" placeholder="Explain About the Event"></textarea>
</td>
<td class="addeventlabel">Address</td>

<td>
<textarea class="formlabel" name="address" id="address" placeholder="Postal Address of the Event" rows="10"><?php echo $address; ?></textarea>
</td>
</tr>
<tr><td></td><td><td></td><td class="welcomee">Place or Location</welcomee></td><td></td></tr>

<tr><td class="addeventlabel">Country</td>
<td class="addeventlabel"><input required class="formlabel" type="text" name="country" id="country" list="countries" autocomplete="off" onBlur="s();"></td><td class="addeventlabel">State</td><td class="addeventlabel"><input required name="state" type="text" disabled="disabled" class="formlabel" id="state" list="states" autocomplete="off" onBlur="d();"></td>
</tr><td class="addeventlabel">District</td><td class="addeventlabel"><input required name="district" type="text" disabled="disabled" class="formlabel" id="district" list="districts" autocomplete="off"></td></tr>
<tr>
<td class="addeventlabel">Geo-Location</td><td><input onClick="pageScroll()" type="text" name="geo" id="geo" class="formlabel" ></td></tr>
<tr>
</tr><tr>
<tr><td></td><td><td></td><td class="welcomee">Date and Timing</welcomee></td><td></td></tr>

<tr>
<td class="addeventlabel">
From date : 
</td><td class="addeventlabel"><input class="formlabel" required type="date" name="fdate" id="fdate" value=""/></td><td class="addeventlabel">Till Date : </td><td class="addeventlabel"><br><input required class="formlabel" type="date" name="tdate" id="tdate" value=""/><br><input type="button" onClick="datecheck()" value="Same as 'From date'"/></td>
</tr>
<tr>
<td class="addeventlabel">From Time</td><td class="addeventlabel"><input required type="time" name="ftime" id="ftime" class="formlabel"></td><td class="addeventlabel">Till Time</td><td class="addeventlabel"><input required type="time" name="ttime" id="ttime" class="formlabel"></td>
</tr>
<tr><td></td><td><td></td><td class="welcomee">Conact Info</welcomee></td><td></td></tr>

<tr>
<td class="addeventlabel">
Website
</td><td class="addeventlabel"><input class="formlabel" type="url" id="website" name="website" placeholder="http://www.someone.com/mybirthday.html"></td><td class="addeventlabel">Phone</td><td class="addeventlabel">
<input value="<?php echo $phone; ?>" class="formlabel" type="text" name="phone" id="phone" placeholder="Phone number with country code"></td>
</tr>
</table></center>
<input type="hidden" name="cat" id="cat" value="<?php echo $_GET['cat'];?>">
<input type="hidden" name="scat" id="scat" value="<?php echo $_GET['scat'];?>">
<center><button class="formlabel" type="submit">Create</button></center>
</form>
<datalist id="countries">
</datalist>
<datalist id="states"></datalist>
<datalist id="districts"></datalist>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
	<script src="../lib/jquery.js"></script>
	<script src="../lib/jquery.locationpicker.js"></script>
	<script>
		$('#geo').locationPicker();
	</script>
</body>
</html>