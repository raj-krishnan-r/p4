<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script>
function align()
{
document.getElementById('loginbox').style.left=(window.innerWidth/2)-(450/2)+'px';
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Developed by" content="RajKrishnan R, India | E-Mail : rkrishnan1993@live.com">
<meta name="Development-started" content="06/04/2014">
<title>Login</title>
<link rel="stylesheet" href="style/general.css">
</head>

<body onload="align()" onresize="align()">
<div class="headbanner"><center><a href="index.php" title="Home"><span class="logotext">NoBo</span></a></center></div><div class="bottombanner"><center>
<span class="bottombannertext">&copy; of NoBo 2014<br> Administration</span>
</center></div><div class="midregion"><center>
<pagetitle><br>Welcome, <?php echo $_SESSION['title']; ?></pagetitle><br><p>
Your account is created successfully, now that you can login and access all the services :D</p>
<div id="loginbox" class="login"><center><welcome>Log-In</welcome></center><form action="login.php" method="post"><br>
<input class="formlabel" name="email" type="username" placeholder="E-mail" value="<?php echo $_SESSION['email']; ?>"><br><br>
<input class="formlabel" name="pass" placeholder="Password" type="password">
<br>
<input type="checkbox" name="cook" id="cook"><label for="cook">Remember me on this browser
</label><br><br><button type="submit">Log In</button><br></form>
</div>
</body>
</html>