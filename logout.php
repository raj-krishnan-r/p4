<?php
session_start();
session_destroy();
header('location: event-login.php');
?>