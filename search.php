<?php
$q=$_GET['q'];
if(!isset($_GET['past']))
$past='no';
else
$past=$_GET['past'];
$qq='%'.$q.'%';
include("connect.php");
include("extended.php");
date_default_timezone_set('Asia/Calcutta');
$today=date('Y-m-d');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="style/public.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Event</title>
</head>

<body>
<center>
<?php
$vcount=0;
$sql=mysql_query("select title,id,uid,fdate, tdate from event where title like '$qq' OR about like '$qq' or address like '$qq'
ORDER BY id DESC")or die(mysql_error());
$count=mysql_num_rows($sql);

if($count!=0)
{
echo '<table cellspacing="0" cellpadding="15" class="resultable">';
echo "<tr><th>Title</th><th>From</th><th>Till</th><th>Status</th><th>Organizer</th></tr>";
while($row=mysql_fetch_array($sql))
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
echo '<tr class="resulttablerow"><td><a title="Click to view event page" target = "_new" href="eventviewer.php?id='.$row['id'].'">'.$row['title'].'</a></td>
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
echo '<tr class="resulttablerow"><td><a title="Click to view event page" target = "_blank" href="eventviewer.php?id='.$row['id'].'">'.$row['title'].'</a></td>
<td>'.$xfdate.'</td>
<td>'.$xtdate.'</td><td>'.$status.'</td><td>'.$org.'</td></tr>';	
$vcount++;	
	
}
}}
if($vcount==1)
echo '<h4>'.$vcount.' Event found matching <b><i>'.$q.'</i></b></h4>';
else
echo '<h4>'.$vcount.' Events found matching <b><i>'.$q.'</i></b></h4>';
?>
</table>
</center>
</body>
</html>