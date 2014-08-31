<?php
session_start();
if(!isset($_SESSION['live']))$_SESSION['live']=0;
if($_SESSION['live']==1){header('location: home.php');}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script>
<?php
if(isset($_GET['state'])==true)
if($_GET['state']=='x')
{
echo 'window.onload=alertt();';
}
?>
function alertt()
{
alert('Username and Password doesn\'t match !\nTry Again ');
}
</script>
<script>
function align()
{
document.getElementById('loginbox').style.left = (window.innerWidth/2)-(450/2)+'px';
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Development-started" content="06/04/2014">
<title>Login</title>
<link rel="stylesheet" href="style/general.css">
<link rel="stylesheet" href="style/public.css">
</head>

<body onload="align()" onresize="align()">
<div class="headbanner"><center><a href="index.php" title="Home"><span class="logotext">NoBo</span></a></center></div><div class="bottombanner"><center>
<span class="bottombannertext">&copy; of NoBo 2014<br> Administration</span>
</center></div><div class="midregion"><center>
<pagetitle onclick="fade('loginbox',20,1);"><br>Add An Event</pagetitle><br><p>
It's necessary, that you must be logged in to add an event.</p>
<div id="loginbox" class="login"><center><welcome>Log-In</welcome></center><form action="login.php" method="post"><br>
    <input class="formlabel" type="username" name="email" placeholder="E-mail" />
    <br><br>
<input class="formlabel" placeholder="Password" type="password" name="pass">
<br>
<input type="checkbox" name="cook" id="cook"><label for="cook">Remember me on this browser
</label><br><br><button type="submit">Log In</button><br></form>
<hr>
<welcome><u><a href="signup.php">Sign Up</a></u></welcome><about>, if you dont have an account<about>
<br><br>
<br>

<p id="error" style="font-family:'Segoe UI', Arial, Verdana; font-size:40px; color:#F00;">
<?php if(isset($_GET['state'])==true){ if($_GET['state']=='bye'){echo "Goodbye :("; echo '<p style=" color:#060;">Account deletion was a success !<br>
Information and Events you saved are now removed.
</p>';}} ?>
</p>
</div>
</body>
</html>