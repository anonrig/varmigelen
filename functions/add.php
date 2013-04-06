<?php
	include("../config.php");
	
	date_default_timezone_set("Europe/Istanbul");
	header('Content-Type: text/html; charset=utf-8');
  if (isset($_POST['submit'])){
      if (!isset($_SESSION['id'])){
        $_SESSION['id'] = 'ziyaretci';
      }

    $creatorId = $_SESSION['sessionid'];
    $fromLoc = mysql_real_escape_string($_POST['fromLoc']);
    $toLoc = mysql_real_escape_string($_POST['toLoc']);
    $carStatus = mysql_real_escape_string($_POST['optionsRadios']);
    $noteText = mysql_real_escape_string($_POST['noteText']);
    $timeNum = mysql_real_escape_string($_POST['timeNum']);
    $dayNum2 = strtotime(mysql_real_escape_string($_POST['dayNum']));
    $dayNum = date('Y-m-d',$dayNum2);
    $phoneNumber = mysql_real_escape_string($_POST['phoneNumber']);
    $seatCapacity = 0;
    if($_POST['seatCapacity'] != "")
    	$seatCapacity = mysql_real_escape_string($_POST['seatCapacity']);
    $aStatus = 0;
    $today = date("Y-m-d H:i:s");
    
    $query ="INSERT INTO announces(creatorId, createdTime, seatCapacity, fromLoc, toLoc, carStatus, noteText, timeNum, dayNum, phoneNumber, aStatus) VALUES ('$creatorId', '$today', $seatCapacity, '$fromLoc', '$toLoc', $carStatus, '$noteText', '$timeNum', '$dayNum', '$phoneNumber', $aStatus) ";
    
    if(mysql_query($query, $con)){
    	header("Location: ../list.php");
    }
    else {
    echo $query."<br>\n".mysql_error();
	    header("Location: ../add.php?msg=fail");
    }
   }
   
   else {
	   header("Location: ../index.php");
   }


?>