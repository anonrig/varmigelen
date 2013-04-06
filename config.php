<?php ini_set('session.cookie_httponly', true); session_start(); 

if(isset($_SESSION['last_ip']) === false){
	$_SESSION['last_ip'] = $_SERVER['REMOTE_ADDR'];
}

if($_SESSION['last_ip'] !== $_SERVER['REMOTE_ADDR']){
	session_unset();
	session_destroy();
}

$con = mysql_connect("IP ADDRESS", "USERNAME", "PASSWORD");
mysql_select_db("DATABASE NAME", $con) or die("Veritabani secilemedi, baglanilamadi");

?>