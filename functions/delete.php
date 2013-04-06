<?php

include "../config.php";

if (isset($_REQUEST['id'])){
	
	$id=$_REQUEST['id'];
	
	$query=mysql_query("SELECT * FROM announces WHERE id=$id");
	
	$row = mysql_fetch_array($query);
	
	$creatorId=$row['creatorId'];
	
	if($creatorId == $_SESSION['sessionid']){
		$query=mysql_query("UPDATE announces SET isDeleted=1 WHERE id=$id");
		if(!$query){
			die(mysql_error());
			header("Location: ../posts.php?msg=fail");
		}
		header("Location: ../posts.php?msg=success");
	} else {
		header("Location: ../posts.php?msg=fail");
	}
}
?>