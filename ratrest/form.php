<?php
include('connect.php');
$cat=$_GET['cat'];
if($cat!='null')
{
echo '<about>Choose a Sub-Category :</about>
<select class="formlabel" name="scat" id="scat"><option value="17">Any</option>';
$sql=mysql_query("SELECT scategory,scategoryid FROM subcategory WHERE categoryid = '$cat'");
while($row = mysql_fetch_array($sql))
{
echo "<option value=".$row['scategoryid'].">".$row['scategory']."</option>";
}
mysql_close($sql);
}
?>
</select>