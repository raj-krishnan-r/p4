<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="lib/ajax_1_10_2.js"></script>

<script>
function arrange()
{
	var w=window.innerWidth;
	var h=window.innerHeight;
	document.getElementById("iframecontainer").style.width=w-320+'px';
	document.getElementById("iframecontainer").style.height=h-100+'px';
	$.get('fill.php?content=c',function (data,success)
	{
		document.getElementById('country').innerHTML=data;
	});
		$.get('fill.php?content=cat',function (data,success)
	{
		document.getElementById('cat').innerHTML=data;
		sscat();
	});

}
function states()
{
	document.getElementById('state').removeAttribute('disabled');
	var cid=document.getElementById('country').value;
		$.get('fill.php?content=s&id='+cid,function (data,success)
	{
		document.getElementById('state').innerHTML=data;
			districts();

	});
}
function districts()
{	
document.getElementById('district').removeAttribute('disabled');
	var cid=document.getElementById('state').value;
	$.get('fill.php?content=d&id='+cid,function (data,success)
	{
		document.getElementById('district').innerHTML=data;
	});
}
function sscat()
{
		var cid=document.getElementById('cat').value;
		$.get('fill.php?content=scat&id='+cid,function(data,success)
	{
		document.getElementById('subcat').innerHTML=data;
	});
}
</script>

<link href="style/homestyle.css" rel="stylesheet">
<link href="style/public.css" rel="stylesheet">

<style>
body
{
		background:none;

}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Show Events</title>
</head>

<body onLoad="arrange()" onResize="arrange()">
<div class="topstrip"><span class="logotext_post">NoBo</span>


<span class="options"><table cellspacing="20">
<tr>
<td class="optionshigh" title="Click to add an Event"><a href="event-login.php">
Add an Event</a>
</td>
</tr>
</table>

</span></div>
<table class="struct">
<tr>
<td>
<div class="sortbar"><center><h3>Sorting Options</h3>
<fieldset><legend>Search</legend>
<form id="search" method="get" action="search.php" target="resultframe">
<input title="Title, description and address of an event are only scanned" placeholder="Search : title, description, address etc. are scanned" required class="input" type="text" name="q" /><br/>
<input type="checkbox" value="yes" checked id="past" name="past"/><label for="past">Include past events</label><br/>
<input type="hidden" name="begin" value="0">
<input type="hidden" name="till" value="50">
<button type="submit">Search</button>
</form></fieldset>
<fieldset>
<legend>Sort and Find</legend>
<span style="font-size:12px;">Location</span>
<hr width="50%"/>
<form id="sort" method="get" action="sort.php" target="resultframe">
<select onChange="states()" id="country" name="country">
</select>
<select onChange="districts();" id="state" name="state" disabled>
</select>
<select id="district" name="district" disabled>
</select>

<br>
<span style="font-size:12px;">Category</span>
<hr width="50%"/>
<select onChange="sscat()" id="cat" name="cat">
</select>
<select id="subcat" name="subcat">
</select>
<button type="submit">Find</button>
</form>
</fieldset>
<fieldset>
<legend>Go to ID</legend>
<form action="eventviewer.php" method="get" target="_blank">
<input title="Enter an event id and go directly to it." type="number" name="id" required placeholder="Enter the event ID"/><br>
<button type="submit">Go to id</button>

</form>
</form>
</fieldset>
<br>
</center></div>
</td>
<td><div id="iframecontainer" class="iframecontainer">
<iframe name="resultframe" id="resultframe" src="" width="100%" height="100%" frameborder="0"></iframe>
</div></td>
</tr>
</body>
</html>