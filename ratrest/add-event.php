<?php
include("connect.php");
$sql=mysql_query("select category,id from category");
?>
<center><welcome>Add An Event</welcome><br>
<br><br>
<center><table>
<tr>
<td>
<span class="formlabel" style="font-family:'Segoe UI', Arial, Verdana;">Choose An Event Category : </span>
</td>
<td>
<select name="cat" onchange="cat()" id="category" class="formlabel">
<option value="null"><i>Choose a Category</i></option>
<?php
while($row = mysql_fetch_array($sql))
{
	echo "<option value=".$row['id'].">".$row['category']."</option>";
}
?>
</select>
</td>
</tr>
</table>
<p id="indicator"></p>
</form>
<button class="formlabel" disabled="disabled" id="button-sub" onclick="getform()">Next</button>

<br>

