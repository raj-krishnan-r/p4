<?php
include("connect.php");
include("extended.php");
date_default_timezone_set('Asia/Calcutta');
$id=$_GET['id'];
$URL='localhost';
$sql=mysql_query("select title,country,state,district,about,address,website,phone,fdate,tdate,ftime,ttime,geolocation,uid from event where id = $id");
$count=mysql_num_rows($sql);
if($count==0){header('location: nomore.php');}
while($row=mysql_fetch_array($sql))
{
	$title=$row['title'];
	$about=$row['about'];
	$address=$row['address'];
	$website=$row['website'];
	$fdate=$row['fdate'];
	$tdate=$row['tdate'];
	$ftime=$row['ftime'];
	$xftime=date('F j, Y',strtotime($fdate));
	$xtdate=date('F j, Y',strtotime($tdate));
	$ttime=$row['ttime'];
	$geolocation=$row['geolocation'];
	$phone=$row['phone'];
	$country=$row['country'];
	$state=$row['state'];
	$district=$row['district'];
	$uid=$row['uid'];
}
$sqql=mysql_query("select title,email,type from userbase where id=$uid");
while($row=mysql_fetch_array($sqql))
{
	$pname=$row['title'];
	$pemail=$row['email'];
	$ptype=$row['type'];
}
////Code to Manage View Count
$check=mysql_query("select counts from view where id=$id");
$count=mysql_num_rows($check);
if($count==0)
{
mysql_query("INSERT INTO view values('$id',1)");
}
else
{
$counter=mysql_query("update view set counts = counts+1 where id=$id");
}
///
$views=mysql_query("select counts from view where id=$id");
$viewscount=mysql_num_rows($views);
if($viewscount!=0)
{
while($row=mysql_fetch_array($views))
{
$viewcount=$row['counts'];	
}
}
else
{
$viewcount=1;
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="lib/twitter.js"></script>
<link href="style/homestyle.css" rel="stylesheet">
<link href="style/viewer.css" rel="stylesheet">
<style>
body
{
	background:none;
	font-family:"Segoe UI", Arial, Verdana;
}
.topstrip
{
	position:absolute;
	height:50px;
	background-attachment:scroll;
}
.logotext_post
{
	font-size:40px;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title ?> : NoBo</title>
</head>

<body id="eventbody">
<div class="topstrip"><span class="logotext_post">NoBo</span>


<span class="options"><table cellspacing="20">
<tr>
<td title="Tweet this event">
<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en" data-text="' <?php echo $title; ?> ' for more info go to " data-url="<?php echo 'http://'.$URL.$_SERVER['REQUEST_URI']; ?>">Tweet</a></td>
<td class="optionshigh" style="cursor:default;" title="Number of times, this page is requested.">
<b><?php echo $viewcount;?></b> views
</td>
<td class="optionshigh" title="Click to add an Event"><a href="event-login.php">
Add an Event</a>
</td>
<td class="optionshigh" title="Report any complaint regarding this event, like whether it's fake, any abusive content found etc."><a target="_blank" href="complain.php?id=<?php echo $id; ?>">Report Concern</a>
</td>
</tr>
</table>
</span></div>
<div class="eventtitle"><center><?php echo $title;?></center></div>
<div class="datebar">
<?php
if(datediff($fdate,$tdate)==0)
{
echo '<span class="smallfont">On&nbsp;&nbsp;</span>'.$xftime.' <span class="smallfont">&nbsp;&nbsp;from&nbsp;&nbsp;</span>'.$ftime.' <span class="smallfont"> to </span>'.$ttime.'<br>';
}
else
{
echo '<span class="smallfont">On&nbsp;&nbsp;</span>'.$xftime.'<span class="smallfont">&nbsp;&nbsp;till&nbsp;&nbsp;</span>'.$xtdate.'&nbsp;&nbsp;<span class="smallfont">From</span>&nbsp;&nbsp;'.$ftime.'&nbsp;&nbsp;<span class="smallfont">to</span>&nbsp;&nbsp;'.$ttime.'<br>';
}
?>
<!--<span class="smallfont">On</span> <?php echo $xftime;?> <span class="smallfont"> from </span> <?php echo $ftime;?> <span class="smallfont"> to </span><?php echo $ttime;?><br>
--><?php
if(datediff($fdate,$tdate)==0)
{
	echo 'One <span class="smallfont"> day event</span>&nbsp;&nbsp;:&nbsp;&nbsp;';
}
else
{
	echo (datediff($fdate,$tdate)+1)." <span class=\"smallfont\">day event</span>&nbsp;&nbsp;:&nbsp;&nbsp;";
}
$diff = datediff(date('Y-m-d'),$fdate);
$end = datediff(date('Y-m-d'),$tdate);
if($diff==0&&$diff!=$end)
echo "Starts Today !";
else
if($diff==0)
echo "Today !";
if($diff>1&&$diff!=$end)
echo '<span class="smallfont">Starts after </span> '.$diff.' <span class="smallfont">days</span>';
else
if($diff>1)
echo '<span class="smallfont">After </span> '.$diff.' <span class="smallfont">days</span>';
if($diff==1&&$diff!=$end)
echo 'Starts Tomorrow !';
else
if($diff==1)
echo "Tomorrow";
if($tdate==-1)
echo 'Over by Yesterday !';
if($diff<=(-1)&&$end>=0)
echo '<span class="smallfont">Started </span>'.datediff($fdate,date('Y-m-d')).' <span class="smallfont">days before.</span>';
if($end<0)
echo '<span class="smallfont">Ended </span>'.datediff($tdate,date('Y-m-d')).' <span class="smallfont">days before.</span>';

?>
</div>
<center><table class="table" cellspacing="50">
<tr>
<td><div class="aboutbox"><fieldset style="font-family:Arial, Helvetica, sans-serif; font-size:12px;"><legend>About</legend>
<span class="data"><?php echo $about;?></span>
</fieldset>


</div></td><td>
<div class="aboutbox"><fieldset><legend>Postal Address</legend>
<span class="data"><?php echo $address;?></span>
</fieldset>
</td>

</tr>
<tr>
<td class="aboutbox">
<fieldset>
<legend>Map</legend>
<div class="mapbar"><iframe width="100%" height="100%" frameborder="0" src="https://www.google.com/maps/embed/v1/view?key=AIzaSyDA742kfYz39JZSX2VZ-af1h7mdtBAS-zs&center=<?php echo $geolocation;?>&zoom=18&maptype=roadmap"></iframe></div><center>Above map doesn't makes sense ? <a href="https://www.google.com/maps/embed/v1/view?key=AIzaSyDA742kfYz39JZSX2VZ-af1h7mdtBAS-zs&center=<?php echo $geolocation;?>&zoom=18&maptype=satellite" target="_blank">Click here</a> to view map, in which geo-location data provided by the poster is utilized</center>
</fieldset>
</td>

</tr>
<tr>
<td class="aboutbox">
<fieldset>
<legend>Contact info.</legend>
<table cellpadding="5" cellspacing="0">
<tr>
<th>
Contact Phone 
</th>
<td class="data2">
<?php echo $phone;?></td>
</tr>
<tr>
<th>
Website
</th>
<td class="data2">
<?php if($website!='')echo "<a target=\"_blank\" href=\"$website\" title=\"Click to navigate to this address\">".$website."</a>";else echo"not provided." ?>
</td>
</tr>
<tr>
<th>
Region
</th>
<td class="data2">
<?php echo $district.', '.$state.', '.$country;?>
</td>
</tr>
</table>
</fieldset>
</td>
<td class="aboutbox">
<fieldset>
<legend>Poster Info.</legend>
<table cellpadding="5" cellspacing="0">
<tr>
<th>
Poster Title</td>
<td class="data2">
<?php echo $pname;?></td>
</tr>
<tr>
<th>
E-Mail
</th>
<td class="data2">
<?php echo $pemail;?>
</td>
</tr>
<tr>
<th>
Type</th>
<td class="data2">
<?php echo $ptype;?>
</td>
</tr>
</table>
</td>

</table></center>
</body>
</html>
