<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">

	<title>Dashboard Admin</title>
	
	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,800">
	<link rel="stylesheet" href="./admin/css/font-awesome.css">
	<link rel="stylesheet" href="./css/validation.css">
	<link rel="stylesheet" href="./admin/css/bootstrap.css">
	<link rel="stylesheet" href="./admin/css/bootstrap-responsive.css">

	<link rel="stylesheet" href="./css/ui-lightness/jquery-ui-1.8.21.custom.css">	
	
	<link rel="stylesheet" href="./admin/css/application.css">

	<script src="./admin/js/libs/modernizr-2.5.3.min.js"></script>

</head>

<body class="login">



<div class="account-container login stacked">
	
	<div class="content clearfix">
		
		<form action="./functions/login.php" method="post" id="contact-form">
		
			<h1>Tekrar hosgeldin</h1>		
			
			    <?php 
    $msg = $_REQUEST['msg'];
    
    if ($msg == "success"){
      echo "<div class='alert alert-success'><strong>Basarili:</strong> Artik giris yapabilirsiniz.</div>";
    } else if ($msg == "fail"){
      echo "<div class='alert alert-error'><strong>HATA:</strong> Yanlis kullanici adi veya sifre girdiniz.</div>";
    } else if ($msg == "login") {
      echo "<div class='alert alert-error'><strong>HATA:</strong> Acmaya calistiginiz siteye girebilmeniz icin giris yapmaniz gerekmektedir.</div>";
    }

  ?>
			<div class="login-fields">
				
				<p>Kayitli email adresin ve sifrenle gir:</p>
				
				<div class="field">
					<label for="username">Email Adresi:</label>
					<input type="text" id="inputEmail" name="inputEmail" value="" placeholder="Email adresi" class="login username-field" />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Sifre:</label>
					<input type="password" id="inputPassword" name="inputPassword" value="" placeholder="Sifre" class="login password-field"/>
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<span class="login-checkbox">
					<input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
					<label class="choice" for="Field">Hatirla beni! N'olur bey amca.</label>
				</span>
									
				<button id="submit" name="submit" class="button btn btn-primary btn-large">Giris yap</button>
				
			</div> <!-- .actions -->
			
			<div class="login-social">
				<p>Sosyal medya ile giris yapsan mesela?</p>
				
				<div class="twitter">
					<a href="#" class="btn_1">Twitter ile giris</a>				
				</div>
				
				<div class="fb">
					<a href="#" class="btn_2">Facebook ile giris</a>				
				</div>
			</div>
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->


<!-- Text Under Box -->
<div class="login-extra">
	Hesabin yok mu? <a href="./register.php">Hemen kayit ol!</a><br/>
	Sifremi <a href="#">hatirlat</a>
</div> <!-- /login-extra -->




<script type="text/javascript" charset="utf-8" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/additional-methods.js"></script>
<script type="text/javascript" src="js/validation.js"></script>

</body>
</html>
