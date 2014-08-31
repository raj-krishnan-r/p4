<?php
include("connect.php");
if(!isset($_GET['id']))
$id='0';
else
$id=$_GET['id'];
if($_GET['content']=='c')
{
	echo '<option value="'.$row['0'].'">Select Country</option>';
$sql=mysql_query('select country,id from country') or die(mysql_error());
while($row=mysql_fetch_array($sql))
echo '<option value="'.$row['id'].'">'.$row['country'].'</option>';
}
if($_GET['content']=='s')
{
$sql=mysql_query("select states,id from states where countryid='$id'") or die(mysql_error());
while($row=mysql_fetch_array($sql))
echo '<option value="'.$row['id'].'">'.$row['states'].'</option>';
}
if($_GET['content']=='d')
{
$sql=mysql_query("select district,id from districts where stateid='$id'") or die(mysql_error());
while($row=mysql_fetch_array($sql))
echo '<option value="'.$row['id'].'">'.$row['district'].'</option>';
}
if($_GET['content']=='cat')
{
$sql=mysql_query("select category,id from category") or die(mysql_error());
while($row=mysql_fetch_array($sql))
echo '<option value="'.$row['id'].'">'.$row['category'].'</option>';
}
if($_GET['content']=='scat')
{
echo '<option value="0">Any</option>';
$sql=mysql_query("select scategory,scategoryid from subcategory where categoryid='$id'") or die(mysql_error());
while($row=mysql_fetch_array($sql))
echo '<option value="'.$row['scategoryid'].'">'.$row['scategory'].'</option>';
}
?>