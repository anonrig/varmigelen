<?php
include("../config.php");
include("../functions.php");

if (isset($_POST['submit']))
{
  $password = $_POST['inputPassword'];
  $email = $_POST['inputEmail'];
  
  
  $encryptPassword = fnEncrypt($password, "6eb598ac1356f82a91efe59f0e17be57");
  $encryptEmail = fnEncrypt($email, "6eb598ac1356f82a91efe59f0e17be57");
  //$encryptPassword = $_POST['inputPassword'];
  //$encryptEmail = $_POST['inputEmail'];
  $query = mysql_query("SELECT * FROM users WHERE email='$encryptEmail' and password='$encryptPassword'");
  
  $numRows = mysql_num_rows($query);
  

  if($numRows == 1) {
  
    $row = mysql_fetch_array($query);
    
    $id=$row['id'];
    
    $permission = $row['permission'];
    
    $username=$row['username'];
    //username = fnDecrypt($username, "6eb598ac1356f82a91efe59f0e17be57");
    
    $email=$row['email'];
    //$email = fnDecrypt($email, "6eb598ac1356f82a91efe59f0e17be57");
    
    $name=$row['name'];
    //$name = fnDecrypt($name, "6eb598ac1356f82a91efe59f0e17be57");
    
    $password=$row['password'];
    //$password = fnDecrypt($password, "6eb598ac1356f82a91efe59f0e17be57");
    
    $bday=$row['bDay'];
    
    $gender=$row['gender'];
    
    $schoolwork=$row['schoolWork'];
      
    $_SESSION['sessionusername'] = $username;
    $_SESSION['sessionemail'] = $email;
    $_SESSION['sessionid'] = $id;
    $_SESSION['sessionname'] = $name;
    $_SESSION['sessionpassword'] = $password;
    $_SESSION['sessionpermission'] = $permission;
    $_SESSION['sessionschoolwork'] = $schoolwork;
    $_SESSION['sessiongender'] = $gender;
    
    $_SESSION['sessionbday'] = $bday;
    
    header("Location: ../profile.php?msg=success");
  } else if ($numRows != 1) {
    header("Location: ../login.php?msg=fail");
  }
  
}
else {
	 header("Location: ../index.php");
}


?>