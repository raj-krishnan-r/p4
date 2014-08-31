<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="lib/ajax_1_10_2.js"></script>

<script>

function align()
{
	var variant = window.innerWidth/2;
document.getElementById('loginbox').style.left=variant-1000/2+'px';
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
function submition()
{
	if(document.getElementById('pass').value!=document.getElementById('cpass').value)
	{
		document.getElementById('cpass').style.backgroundColor='#996666';
		document.getElementById('formsub').disabled='disabled';
		alert("\t\t\t\tPassword doesn't match! \n \t\t\t\tYou will not be able to proceed without correcting it.");
	}
	else
	{
				document.getElementById('cpass').style.backgroundColor='#FFFFFF';
				document.getElementById('formsub').removeAttribute('disabled');

	}
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
function placeholderalt()
{
	var val = document.getElementById('type').value;
	if(val=='Organization')
	{
		document.getElementById('title').placeholder='Title of organization';
		document.getElementById('about').placeholder='Describe about organization';
	}
	else
	{
			{
		document.getElementById('title').placeholder='Your name';
		document.getElementById('about').placeholder='Describe about you';
	}
	}
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Developed by" content="RajKrishnan R, India | E-Mail : rkrishnan1993@live.com">
<meta name="Development-started" content="06/04/2014">
<title>Create an account : NoBo</title>
<link rel="stylesheet" href="style/general.css">
</head>

<body onload="align()" onresize="align()">
<div class="headbanner"><center><a href="index.php" title="Home"><span class="logotext">NoBo</span></a></center></div><!--<div class="bottombanner"><center>
<span class="bottombannertext">&copy; of NoBo 2014<br> Administration</span>
</center></div>--><div class="midregion"><center>
<pagetitle><br>Create an Account</pagetitle><br><p>Be sure about the genuinity of the information you are about to enter.
</p>
<div id="loginbox" class="signup"><center>
<br><form id="form" name="user" method="post" action="add-user.php"><table cellpadding="5"><tr><td><welcome>Basic Info</welcome></td><td></td></tr><tr><td>Account Type</td><td><select onChange="placeholderalt()" class="formlabel" name="type" id="type">
<option>Organization</option>
<option>Individual</option>
</select></td><td>Name or Title</td><td><input id="title" required="required" maxlength="50" class="formlabel" type="text" name="name" placeholder="Title of Organization"/></td></tr><tr><td>E-Mail</td><td><input required="required" type="email" name="email" class="formlabel" placeholder="Active Email of yours"></td><td></td><td></td><tr>
<td>Choose a password</td>
<td><input required="required" id="pass" name="pass" type="password" placeholder="Choose a Password" class="formlabel" ><td>Confirm Password</td><td><input onblur="submition()" placeholder="Re-Type password" id="cpass" type="password" class="formlabel"></td></tr><tr><td></td></tr><tr><td><welcome>Extra Info</welcome></td><td></td></tr><tr><td>Postal Address</td><td><textarea required="required" name="add" class="formlabel"></textarea></td><td>Phone Number</td><td>
<input placeholder="+91 " type="number"  required="required"name="phone" class="formlabel"></td></tr>
<tr><td>Country</td><td><select class="formlabel" onChange="states()" id=country name="country"></select></td><td>State</td><td><select onChange="districts()" class="formlabel" name="state" id=state></select></td></tr>
<tr>
<td>
District
</td>
<td><select class="formlabel" id="district" name="district"></select></td>
<td>About you/Organization</td><td><textarea id="about" placeholder="Describe about organization" required="required" name="about" class="formlabel"></textarea></td></tr></table>
<center><br><button id="formsub" type="submit" class="formlabel">Create</button></center>
</form>

</div>
</body>
</html>