<?php
	include("../config.php");
	include("../functions.php");
	
	date_default_timezone_set("Europe/Istanbul");
	$userid=$_POST['uid'];
	$announceid=$_POST['aid'];
	$creatorid=$_POST['creatorid'];
	
  if (isset($_POST['accept']) && ($_SESSION['sessionid'] == $creatorid)){
     $query= mysql_query("UPDATE userPoolLinker SET userStatus = '1', isChanged = '1' WHERE aID='$announceid' AND uID = '$userid'");
     if (!$query){
     	header("Location: ../profile.php?msg=fail");
     } else {
      	header("Location: ../profile.php?msg=update");
     }
      
      
    }    
   
  else if (isset($_POST['deny']) && ($_SESSION['sessionid'] == $creatorid)){
  	  //To deny the person's request

         $query= mysql_query("UPDATE userPoolLinker SET userStatus = '0', isChanged = '1' WHERE aID='$announceid' AND uID = '$userid'");
     if (!$query){
     	header("Location: ../profile.php?msg=fail");
     } else {
      	header("Location: ../profile.php?msg=update");
     }
        
    }    
   
  else {
	 header("Location: ../profile.php");
  }


?>