<?php
$host="localhost";$username="root";$password="dbase001";
$db_name="nobo";
$con=mysql_connect("$host", "$username", "$password")or die(error()); 
mysql_select_db("$db_name")or die("cannot select DB");
function error()
{
echo "Error happened !";
}
?>