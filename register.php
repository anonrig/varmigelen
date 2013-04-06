<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">

	<title>Giris yap! | varmigelen</title>
	
	<meta name="description" content="">
	<meta name="author" content="Yagiz Nizipli, Mert Issever">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,800">
	<link rel="stylesheet" href="./admin/css/font-awesome.css">
	<link rel="stylesheet" href="./css/validation.css">
	<link rel="stylesheet" href="./admin/css/bootstrap.css">
	<link rel="stylesheet" href="./admin/css/bootstrap-responsive.css">

	<link rel="stylesheet" href="./admin/css/ui-lightness/jquery-ui-1.8.21.custom.css">	
	
	<link rel="stylesheet" href="./admin/css/application.css">

	<script src="./admin/js/libs/modernizr-2.5.3.min.js"></script>

</head>

<body class="login">




<div class="account-container register stacked">
	
	<div class="content clearfix">
		
		
			<h1>Hosgelmissin canim.</h1>			
			
			<div class="login-social">
				<p>Sosyal medya ile giris yapabilirsin:</p>
				
				<div class="twitter">
					<a href="#" class="btn_1">Twitter ile giris</a>				
				</div>
				
				<div class="fb">
					<a href="#" class="btn_2">Facebook ile giris</a>				
				</div>
			</div>
			
			<div class="login-fields">
				
				<p>Ucretsiz hesabini yarat:</p>
				
			<form action="./functions/register.php" method="post" id="contact-form" class="form-horizontal" novalidate="novalidate">
				<div class="field">
					<label for="firstname">Kullanici Adin:</label>
					<input type="text" id="inputUsername" name="inputUsername" value="" placeholder="Kullanici adi belirle hadi!" class="login" />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="lastname">Isim:</label>	
					<input type="text" id="inputName" name="inputName" value="" placeholder="Ismini de yazsan mesela?" class="login" />
				</div> <!-- /field -->
				
				
				<div class="field">
					<label for="email">Email adresin:</label>
					<input type="text" id="inputEmail" name="inputEmail" value="" placeholder="Email adresin vardir insallah" class="login"/>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Sifre:</label>
					<input type="password" id="inputPassword" name="inputPassword" value="" placeholder="Sifreni gir, ama kolay bilinen olmasin" class="login"/>
				</div> <!-- /field -->
				
				<span class="login-checkbox">
					<input id="Field" name="checkbox" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
					<label class="choice" for="Field">Kullanim kosullarini okudum.</label>
				</span>
									
				<button name="submit" id="submit" class="button btn btn-primary btn-large">Kayit Ol</button>
			</div> <!-- /login-fields -->
			

			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->


<!-- Text Under Box -->
<div class="login-extra">
	Hesabin var mi? Ne bekliyosun! <a href="./login.php">Giris yap</a>
</div> <!-- /login-extra -->




<script type="text/javascript" charset="utf-8" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/additional-methods.js"></script>
<script type="text/javascript" src="js/validation.js"></script>

</body>
</html>
