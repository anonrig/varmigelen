<?php 
include "config.php"; 
include "functions.php";
echo "SESSION ID:" . $_SESSION['sessionid'];
echo "<br>";
echo "SESSION PERMISSION:" . $_SESSION['sessionpermission'];
echo "<br>";
echo "SESSION EMAIL:" . $_SESSION['sessionemail'];
echo "<br>";
echo "SESSION USERNAME'i:" . $_SESSION['sessionusername'];
echo "<br>";
echo "SESSION NAME'i:" . $_SESSION['sessionname'];
echo "<br>";
echo "SESSION PASSWORD'u:" . $_SESSION['sessionpassword'];
echo "<br>";
echo "<br>";
echo "SESSION BDAY:" . $_SESSION['sessionbday'];
echo "<br>";
echo "SESSION GENDER:" . $_SESSION['sessiongender'];
echo "<br>";
echo "SESSION SCHOOLWORK:" . $_SESSION['sessionschoolwork'];
echo "<br>";
echo "SESSION IP:" . $_SESSION['last_ip'];
echo "<br>";
echo "Session Save Path: " . ini_get( 'session.save_path');

?>