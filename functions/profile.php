<?php
	include("../config.php");
	include("../functions.php");
	
	function check($query){
	  if (!$query){
        return false;
        //header("Location: ../profile.php?msg=fail");
        
      }
      return true;
	}
	
	date_default_timezone_set("Europe/Istanbul");
	$getID=$_POST['id'];
  if (isset($_POST['submit']) && ($getID==$_SESSION['sessionid'])){
  	  
      $inputUsername = fnEncrypt($_POST['inputUsername'], "6eb598ac1356f82a91efe59f0e17be57");
      $inputEmail = fnEncrypt($_POST['inputEmail'], "6eb598ac1356f82a91efe59f0e17be57");
      $inputName = fnEncrypt($_POST['inputName'], "6eb598ac1356f82a91efe59f0e17be57");
      $bDay2 = strtotime($_POST['inputbDay']);
      $bDay = date('Y-m-d',$bDay2);
      $schoolWork = fnEncrypt($_POST['inputschoolWork'], "6eb598ac1356f82a91efe59f0e17be57");
      $gender = $_POST['inputGender'];
      $sesid=$_SESSION['sessionid'];
      $today = date("Y-m-d H:i:s");
      
     $query= mysql_query("UPDATE users SET username='$inputUsername', email='$inputEmail', name='$inputName', bDay='$bDay', schoolWork='$schoolWork', gender='$gender', updated_at='$today' WHERE id='$getID'");
     if (check($query) == false){
     	  header("Location: ../profile.php?msg=fail");
     } else {
	      $_SESSION['sessionusername'] = $inputUsername;
	      $_SESSION['sessionemail'] = $inputEmail;
	      $_SESSION['sessionname'] = $inputName;
	      $_SESSION['sessionschoolwork'] = $schoolWork;
	      $_SESSION['sessionbday'] = $bDay;
	      $_SESSION['sessiongender'] = $gender;
      	header("Location: ../profile.php?msg=update");
     }
      
      
    }    
   
  else {
	 header("Location: ../profile.php");
  }


?>