<?php
	include("../config.php");
	include("../functions.php");
	
	date_default_timezone_set("Europe/Istanbul");
	
  if (isset($_POST['submit'])){
      $inputUsername = fnEncrypt($_POST['inputUsername'], "6eb598ac1356f82a91efe59f0e17be57");
      $inputEmail = fnEncrypt($_POST['inputEmail'], "6eb598ac1356f82a91efe59f0e17be57");
      $inputName = fnEncrypt($_POST['inputName'], "6eb598ac1356f82a91efe59f0e17be57");
      $inputPassword = fnEncrypt($_POST['inputPassword'], "6eb598ac1356f82a91efe59f0e17be57");
      
      $today = date("Y-m-d H:i:s");
      
      $query = "INSERT INTO users (username, name, email, created_at, updated_at, password) VALUES ('$inputUsername','$inputName' ,'$inputEmail', '$today', '$today', '$inputPassword')";
      
      if (mysql_query($query, $con)){
        header("Location: ../login.php?msg=success");
      }else{
        header("Location: ../register.php?msg=fail");
      }
    }    
   
  else {
	 header("Location: ../index.php");
  }


?>