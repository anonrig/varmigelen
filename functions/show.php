<?php
	include("../config.php");
	include("../functions.php");
	
	date_default_timezone_set("Europe/Istanbul");
	if (isset($_SESSION['sessionid'])){
		
		$userID = $_POST['id'];
		if (isset($_POST['spamPost'])){
			echo "spam";
		
		} else if (isset($_POST['addCarHost'])){
			$query=mysql_query("INSERT INTO userPoolLinker (aID, uID, carStatus, userStatus) VALUES ('$id', ". $_SESSION['sessionid'].", 1, 1)");
			header("Location: ../show.php?id=$id");
		} else if (isset($_POST['addMe'])){
			$query=mysql_query("INSERT INTO userPoolLinker (aID, uID, carStatus, userStatus) VALUES ('$id', ". $_SESSION['sessionid'].", 2, 2)");
			header("Location: ../show.php?id=$id&msg=requestsent");
		} else {
			header("Location: ../index.php");
		}
	} else {
		header("Location: ../login.php?msg=login");
	}

?>