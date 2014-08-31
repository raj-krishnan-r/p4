<?php
include('connect.php');
include('extended.php');
$past='no';
date_default_timezone_set('Asia/Calcutta');
$today=date('Y-m-d');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="style/public.css">
</head>

<body>
<?php
$vcount=0;
$c=$_GET['country'];
$s=$_GET['state'];
$d=$_GET['district'];
$cat=$_GET['cat'];
$scat=$_GET['subcat'];
if(!isset($c,$s,$d,$cat,$scat))
header('location: leak.php');
$sql1=mysql_query("select country from country where id = $c") or die(mysql_error());
while($row=mysql_fetch_array($sql1))
$country=$row['country']; 
//
$sql2=mysql_query("select states from states where id = $s") or die(mysql_error());
while($row=mysql_fetch_array($sql2))
$state=$row['states'];
//
$sql3=mysql_query("select district from districts where id = $d") or die(mysql_error());
while($row=mysql_fetch_array($sql3))
$district=$row['district'];
?>
<?php
if($scat==0)
{
$main=mysql_query("select title,id,uid,fdate,tdate from event where district like '$district' AND state like '$state' 
AND cat like '$cat' ORDER BY id DESC")or die(mysql_error());	
}
else
{
$main=mysql_query("select title,id,uid,fdate,tdate from event where district like '$district' AND state like '$state' 
AND cat like '$cat' AND scat like '$scat' ORDER BY id DESC")or die(mysql_error());
}
echo '<table cellspacing="0" cellpadding="15" class="resultable">';
echo "<tr><th>Title</th><th>From</th><th>Till</th><th>Status</th><th>Organizer</th></tr>";
while($row=mysql_fetch_array($main))
{
$uid=$row['uid'];
	$sql2=mysql_query("select title from userbase where id='$uid'")or die(mysql_error());
	while($row2=mysql_fetch_array($sql2))
	{
		$org=$row2['title'];
	}
	$fdate=$row['fdate'];
	$xfdate=date('F j, Y',strtotime($fdate));
	$tdate=$row['tdate'];
	$xtdate=date('F j, Y',strtotime($tdate));
	$status='ok';
	if($past!='yes')
	{
if(datediff($today,$tdate)>=0)
{
if(datediff($today,$fdate)<=0&&datediff($today,$tdate)>=0)
$status='On-Going';
	if(datediff($today,$fdate)==1)
	{
		$status='Tomorrow';
	}
	elseif(datediff($today,$fdate)==0)
	{
		$status='Today';
	}
	elseif(datediff($today,$fdate)>0)
	{
		$status='Future';
	}
echo '<tr class="resulttablerow"><td><a title="Click to view event page" target = "_blank" href="eventviewer.php?id='.$row['id'].'">'.$row['title'].'</a></td>
<td>'.$xfdate.'</td>
<td>'.$xtdate.'</td><td>'.$status.'</td><td>'.$org.'</td></tr>';
$vcount++;	
}
}
else
{
if(datediff($today,$fdate)<=0&&datediff($today,$tdate)>=0)
$status='On-Going';
	if(datediff($today,$fdate)==1)
	{
		$status='Tomorrow';
	}
	elseif(datediff($today,$fdate)==0)
	{
		$status='Today';
	}
	elseif(datediff($today,$fdate)>0)
	{
		$status='Future';
	}
	elseif(datediff($today,$tdate)<0)
	{
		$status='Over';
	}
echo '<tr class="resulttablerow"><td><a title="Click to view event page" target = "_new" href="eventviewer.php?id='.$row['id'].'">'.$row['title'].'</a></td>
<td>'.$xfdate.'</td>
<td>'.$xtdate.'</td><td>'.$status.'</td><td>'.$org.'</td></tr>';	
$vcount++;	
	
}
}
echo "<tr><center>";
if($vcount==1)
echo '<h4><b>'.$vcount.'</b> Event found matching supplied parameters</b></h4>';
else
echo '<h4><b>'.$vcount.'</b> Events found matching supplied parameters</b></h4>';
echo "</center></tr></table>";
?>
</body>
</html>