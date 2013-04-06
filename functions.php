<?php 
	function fnEncrypt($sValue, $sSecretKey)
    {
        return trim(
            base64_encode(
                mcrypt_encrypt(
                    MCRYPT_RIJNDAEL_256,
                    $sSecretKey, $sValue, 
                    MCRYPT_MODE_ECB, 
                    mcrypt_create_iv(
                        mcrypt_get_iv_size(
                            MCRYPT_RIJNDAEL_256, 
                            MCRYPT_MODE_ECB
                        ), 
                        MCRYPT_RAND)
                    )
                )
            );
    }

    function fnDecrypt($sValue, $sSecretKey)
    {
        return trim(
            mcrypt_decrypt(
                MCRYPT_RIJNDAEL_256, 
                $sSecretKey, 
                base64_decode($sValue), 
                MCRYPT_MODE_ECB,
                mcrypt_create_iv(
                    mcrypt_get_iv_size(
                        MCRYPT_RIJNDAEL_256,
                        MCRYPT_MODE_ECB
                    ), 
                    MCRYPT_RAND
                )
            )
        );
    }
    
    function showHeader($title, $description, $keyword){ 
    	echo "<!DOCTYPE html>
		<head>
			<!-- start: Meta -->
	  <meta charset='utf-8'>
	  <title>$title</title>
	  <meta name='description' content=\"$description\">
	  <meta name='keywords' content=\"$keyword\">
	  <meta name='author' content='Yagiz Nizipli, Mert Issever'>
		<!-- end: Meta -->
		
		<!-- start: Mobile Specific -->
		<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1'>
		<!-- end: Mobile Specific -->
		
		<!-- start: Facebook Open Graph -->
		<meta property='og:title' content=\"$title\"/>
		<meta property='og:description' content=\"$description\"/>
		<meta property='og:type' content=''/>
		<meta property='og:url' content=''/>
		<meta property='og:image' content='https://fbcdn-sphotos-c-a.akamaihd.net/hphotos-ak-ash4/602425_189910377811042_581644245_n.jpg'/>
		<!-- end: Facebook Open Graph -->
	
	    <!-- start: CSS -->
	    <link href='./css/bootstrap.css' rel='stylesheet'>
	    <link href='./css/bootstrap-responsive.css' rel='stylesheet'>
		<link href='./css/style.css' rel='stylesheet'>
		<link href='./css/parallax-slider.css' rel='stylesheet'>
		<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700'>
		<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Droid+Serif'>
		<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Boogaloo'>
		<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Economica:700,400italic'>
		<link rel='stylesheet' type='text/css' href='css/validation.css'>
		<!-- end: CSS -->
	
	    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	    <!--[if lt IE 9]>
	      <script src='http://html5shim.googlecode.com/svn/trunk/html5.js'></script>
	    <![endif]-->
	
	</head>
	<body>";
	
	echo "<div id=\"fb-root\"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = \"//connect.facebook.net/en_US/all.js#xfbml=1&appId=249369395185414\";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>";
    }
    function showNavbar($name){ 
	echo "<!--start: Header -->
	<header>
		
		<!--start: Container -->
		<div class='container'>
			
			<!--start: Row -->
			<div class='row'>
					
				<!--start: Logo -->
				<div class='logo span3'>
						
					<i class='ico-charts circle'></i><a class='brand' href='./index.php'>varmı<span>gelen</span>?</a>
					
				</div>
				<!--end: Logo -->
					
				<!--start: Navigation -->
				<div class='span9'>
					
					<div class='navbar navbar-inverse'>
			    		<div class='navbar-inner'>
			          		<a class='btn btn-navbar' data-toggle='collapse' data-target='.nav-collapse'>
			            		<span class='icon-bar'></span>
			            		<span class='icon-bar'></span>
			            		<span class='icon-bar'></span>
			          		</a>
			          		<div class='nav-collapse collapse'>
			            		<ul class='nav'>";
			            		if ($name=="index"){
				            		echo "<li class='active'>
			                			<a href='index.php'>Anasayfa</a>
			              			</li>";
			              			if (isset($_SESSION['sessionemail'])){
			              				echo "<li><a href='add.php'>Ilan Ekle</a></li>";
			              			}
			              			echo "<li><a href='list.php'>Aktif Ilanlar</a></li>";
			              			if (isset($_SESSION['sessionemail'])){
				              			echo"<li class='dropdown'>
				                			<a href='profile.php' class='dropdown-toggle' data-toggle='dropdown'>Profilim <strong>(";
				                			echo fnDecrypt($_SESSION['sessionname'], "6eb598ac1356f82a91efe59f0e17be57");
				                			
				                			echo ")</strong><b class='caret'></b></a>
				                			<ul class='dropdown-menu'>
				                  				<li><a href='profile.php#ilanlarim'>Ilanlarim</a></li>
				                  				<li><a href='profile.php#gelenler'>Gelen Teklifler</a></li>
												<li><a href='profile.php#tekliflerim'>Benim Tekliflerim</a></li>
												<li><a href='profile.php#ayarlarim'>Ayarlar</a></li>
												<li class='divider'></li>
												<li><a href='logout.php'>Cikis yap</a></li>
				                			</ul>
				              			</li>";
			              			} else {
				              			echo "<li><a href='register.php'>Uye Ol</a></li>
				              			<li class='dropdown'>
								            <a class='dropdown-toggle' href='#' data-toggle='dropdown'>Giris Yap <strong class='caret'></strong></a>
								            <div class='dropdown-menu' style='padding: 15px; padding-bottom: 0px;'>
								              <form action='./functions/login.php' method='post' accept-charset='UTF-8'>
												  <input id='user_username' style='margin-bottom: 15px;' type='text' name='inputEmail' size='30' placeholder='Mail adresin?'/>
												  <input id='user_password' style='margin-bottom: 15px;' type='password' name='inputPassword' size='30' placeholder='Sifren?'/>
												  <input id='user_remember_me' style='float: left; margin-right: 10px;' type='checkbox' name='inputRemember' value='1' />
												  <label class='string optional' for='user_remember_me'> Hatirla beni! N'olur</label>
												 
												  <input class='btn btn-primary' style='clear: left; width: 100%; height: 32px; font-size: 13px;' type='submit' name='submit' value='Giris' />
												</form>
								            </div>
								          </li>";
			              			}								
									echo"<li><a href='blog.php'>Blog</a></li>
									<li><a href='contactus.php'>Iletisim</a></li>";
			            		} else if ($name=="add"){
				            		echo "<li>
			                			<a href='index.php'>Anasayfa</a>
			              			</li>";
			              			if (isset($_SESSION['sessionemail'])){
			              				echo "<li class='active'><a href='add.php'>Ilan Ekle</a></li>";
			              			}
			              			echo "<li><a href='list.php'>Aktif Ilanlar</a></li>";
			              			if (isset($_SESSION['sessionemail'])){
				              			echo"<li class='dropdown'>
				                			<a href='profile.php' class='dropdown-toggle' data-toggle='dropdown'>Profilim <strong>(";
				                			echo fnDecrypt($_SESSION['sessionname'], "6eb598ac1356f82a91efe59f0e17be57");
				                			
				                			echo ")</strong><b class='caret'></b></a>
				                			<ul class='dropdown-menu'>
				                  				<li><a href='profile.php#ilanlarim'>Ilanlarim</a></li>
				                  				<li><a href='profile.php#gelenler'>Gelen Teklifler</a></li>
												<li><a href='profile.php#tekliflerim'>Benim Tekliflerim</a></li>
												<li><a href='profile.php#ayarlarim'>Ayarlar</a></li>
												<li class='divider'></li>
												<li><a href='logout.php'>Cikis yap</a></li>
				                			</ul>
				              			</li>";
			              			} else {
				              			echo "<li><a href='register.php'>Uye Ol</a></li>
				              			<li class='dropdown'>
								            <a class='dropdown-toggle' href='#' data-toggle='dropdown'>Giris Yap <strong class='caret'></strong></a>
								            <div class='dropdown-menu' style='padding: 15px; padding-bottom: 0px;'>
								              <form action='./functions/login.php' method='post' accept-charset='UTF-8'>
												  <input id='user_username' style='margin-bottom: 15px;' type='text' name='inputEmail' size='30' placeholder='Mail adresin?'/>
												  <input id='user_password' style='margin-bottom: 15px;' type='password' name='inputPassword' size='30' placeholder='Sifren?'/>
												  <input id='user_remember_me' style='float: left; margin-right: 10px;' type='checkbox' name='inputRemember' value='1' />
												  <label class='string optional' for='user_remember_me'> Hatirla beni! N'olur</label>
												 
												  <input class='btn btn-primary' style='clear: left; width: 100%; height: 32px; font-size: 13px;' type='submit' name='submit' value='Giris' />
												</form>
								            </div>
								          </li>";
			              			}								
									echo"<li><a href='blog.php'>Blog</a></li>
									<li><a href='contactus.php'>Iletisim</a></li>";
			            		} else if ($name=="list"){
				            		echo "<li>
			                			<a href='index.php'>Anasayfa</a>
			              			</li>";
			              			if (isset($_SESSION['sessionemail'])){
			              				echo "<li><a href='add.php'>Ilan Ekle</a></li>";
			              			}
			              			echo "<li class='active'><a href='list.php'>Aktif Ilanlar</a></li>";
			              			if (isset($_SESSION['sessionemail'])){
				              			echo"<li class='dropdown'>
				                			<a href='profile.php' class='dropdown-toggle' data-toggle='dropdown'>Profilim <strong>(";
				                			echo fnDecrypt($_SESSION['sessionname'], "6eb598ac1356f82a91efe59f0e17be57");
				                			
				                			echo ")</strong><b class='caret'></b></a>
				                			<ul class='dropdown-menu'>
				                  				<li><a href='profile.php#ilanlarim'>Ilanlarim</a></li>
				                  				<li><a href='profile.php#gelenler'>Gelen Teklifler</a></li>
												<li><a href='profile.php#tekliflerim'>Benim Tekliflerim</a></li>
												<li><a href='profile.php#ayarlarim'>Ayarlar</a></li>
												<li class='divider'></li>
												<li><a href='logout.php'>Cikis yap</a></li>
				                			</ul>
				              			</li>";
			              			} else {
				              			echo "<li><a href='register.php'>Uye Ol</a></li>
				              			<li class='dropdown'>
								            <a class='dropdown-toggle' href='#' data-toggle='dropdown'>Giris Yap <strong class='caret'></strong></a>
								            <div class='dropdown-menu' style='padding: 15px; padding-bottom: 0px;'>
								              <form action='./functions/login.php' method='post' accept-charset='UTF-8'>
												  <input id='user_username' style='margin-bottom: 15px;' type='text' name='inputEmail' size='30' placeholder='Mail adresin?'/>
												  <input id='user_password' style='margin-bottom: 15px;' type='password' name='inputPassword' size='30' placeholder='Sifren?'/>
												  <input id='user_remember_me' style='float: left; margin-right: 10px;' type='checkbox' name='inputRemember' value='1' />
												  <label class='string optional' for='user_remember_me'> Hatirla beni! N'olur</label>
												 
												  <input class='btn btn-primary' style='clear: left; width: 100%; height: 32px; font-size: 13px;' type='submit' name='submit' value='Giris' />
												</form>
								            </div>
								          </li>";
			              			}								
									echo"<li><a href='blog.php'>Blog</a></li>
									<li><a href='contactus.php'>Iletisim</a></li>";
			            		} else if ($name=="profile"){
			            			echo "<li>
			                			<a href='index.php'>Anasayfa</a>
			              			</li>";
			              			if (isset($_SESSION['sessionemail'])){
			              				echo "<li><a href='add.php'>Ilan Ekle</a></li>";
			              			}
			              			echo "<li><a href='list.php'>Aktif Ilanlar</a></li>";
			              			if (isset($_SESSION['sessionemail'])){
				              			echo"<li class='dropdown active'>
				                			<a href='profile.php' class='dropdown-toggle' data-toggle='dropdown'>Profilim <strong>(";
				                			echo fnDecrypt($_SESSION['sessionname'], "6eb598ac1356f82a91efe59f0e17be57");
				                			
				                			echo ")</strong><b class='caret'></b></a>
				                			<ul class='dropdown-menu'>
				                  				<li><a href='profile.php#ilanlarim'>Ilanlarim</a></li>
				                  				<li><a href='profile.php#gelenler'>Gelen Teklifler</a></li>
												<li><a href='profile.php#tekliflerim'>Benim Tekliflerim</a></li>
												<li><a href='profile.php#ayarlarim'>Ayarlar</a></li>
												<li class='divider'></li>
												<li><a href='logout.php'>Cikis yap</a></li>
				                			</ul>
				              			</li>";
			              			} else {
				              			echo "<li><a href='register.php'>Uye Ol</a></li>
				              			<li class='dropdown'>
								            <a class='dropdown-toggle' href='#' data-toggle='dropdown'>Giris Yap <strong class='caret'></strong></a>
								            <div class='dropdown-menu' style='padding: 15px; padding-bottom: 0px;'>
								              <form action='./functions/login.php' method='post' accept-charset='UTF-8'>
												  <input id='user_username' style='margin-bottom: 15px;' type='text' name='inputEmail' size='30' placeholder='Mail adresin?'/>
												  <input id='user_password' style='margin-bottom: 15px;' type='password' name='inputPassword' size='30' placeholder='Sifren?'/>
												  <input id='user_remember_me' style='float: left; margin-right: 10px;' type='checkbox' name='inputRemember' value='1' />
												  <label class='string optional' for='user_remember_me'> Hatirla beni! N'olur</label>
												 
												  <input class='btn btn-primary' style='clear: left; width: 100%; height: 32px; font-size: 13px;' type='submit' name='submit' value='Giris' />
												</form>
								            </div>
								          </li>";
			              			}								
									echo"<li><a href='blog.php'>Blog</a></li>
									<li><a href='contactus.php'>Iletisim</a></li>";
			            		} else if ($name=="blog"){
				            		echo "<li>
			                			<a href='index.php'>Anasayfa</a>
			              			</li>";
			              			if (isset($_SESSION['sessionemail'])){
			              				echo "<li><a href='add.php'>Ilan Ekle</a></li>";
			              			}
			              			echo "<li><a href='list.php'>Aktif Ilanlar</a></li>";
			              			if (isset($_SESSION['sessionemail'])){
				              			echo"<li class='dropdown'>
				                			<a href='profile.php' class='dropdown-toggle' data-toggle='dropdown'>Profilim <strong>(";
				                			echo fnDecrypt($_SESSION['sessionname'], "6eb598ac1356f82a91efe59f0e17be57");
				                			
				                			echo ")</strong><b class='caret'></b></a>
				                			<ul class='dropdown-menu'>
				                  				<li><a href='profile.php#ilanlarim'>Ilanlarim</a></li>
				                  				<li><a href='profile.php#gelenler'>Gelen Teklifler</a></li>
												<li><a href='profile.php#tekliflerim'>Benim Tekliflerim</a></li>
												<li><a href='profile.php#ayarlarim'>Ayarlar</a></li>
												<li class='divider'></li>
												<li><a href='logout.php'>Cikis yap</a></li>
				                			</ul>
				              			</li>";
			              			} else {
				              			echo "<li><a href='register.php'>Uye Ol</a></li>
				              			<li class='dropdown'>
								            <a class='dropdown-toggle' href='#' data-toggle='dropdown'>Giris Yap <strong class='caret'></strong></a>
								            <div class='dropdown-menu' style='padding: 15px; padding-bottom: 0px;'>
								              <form action='./functions/login.php' method='post' accept-charset='UTF-8'>
												  <input id='user_username' style='margin-bottom: 15px;' type='text' name='inputEmail' size='30' placeholder='Mail adresin?'/>
												  <input id='user_password' style='margin-bottom: 15px;' type='password' name='inputPassword' size='30' placeholder='Sifren?'/>
												  <input id='user_remember_me' style='float: left; margin-right: 10px;' type='checkbox' name='inputRemember' value='1' />
												  <label class='string optional' for='user_remember_me'> Hatirla beni! N'olur</label>
												 
												  <input class='btn btn-primary' style='clear: left; width: 100%; height: 32px; font-size: 13px;' type='submit' name='submit' value='Giris' />
												</form>
								            </div>
								          </li>";
			              			}								
									echo"<li class='active'><a href='blog.php'>Blog</a></li>
									<li><a href='contactus.php'>Iletisim</a></li>";
			            		} else if ($name=="contactus"){
				            		echo "<li>
			                			<a href='index.php'>Anasayfa</a>
			              			</li>";
			              			if (isset($_SESSION['sessionemail'])){
			              				echo "<li><a href='add.php'>Ilan Ekle</a></li>";
			              			}
			              			echo "<li><a href='list.php'>Aktif Ilanlar</a></li>";
			              			if (isset($_SESSION['sessionemail'])){
				              			echo"<li class='dropdown'>
				                			<a href='profile.php' class='dropdown-toggle' data-toggle='dropdown'>Profilim <strong>(";
				                			echo fnDecrypt($_SESSION['sessionname'], "6eb598ac1356f82a91efe59f0e17be57");
				                			
				                			echo ")</strong><b class='caret'></b></a>
				                			<ul class='dropdown-menu'>
				                  				<li><a href='profile.php#ilanlarim'>Ilanlarim</a></li>
				                  				<li><a href='profile.php#gelenler'>Gelen Teklifler</a></li>
												<li><a href='profile.php#tekliflerim'>Benim Tekliflerim</a></li>
												<li><a href='profile.php#ayarlarim'>Ayarlar</a></li>
												<li class='divider'></li>
												<li><a href='logout.php'>Cikis yap</a></li>
				                			</ul>
				              			</li>";
			              			} else {
				              			echo "<li><a href='register.php'>Uye Ol</a></li>
				              			<li class='dropdown'>
								            <a class='dropdown-toggle' href='#' data-toggle='dropdown'>Giris Yap <strong class='caret'></strong></a>
								            <div class='dropdown-menu' style='padding: 15px; padding-bottom: 0px;'>
								              <form action='./functions/login.php' method='post' accept-charset='UTF-8'>
												  <input id='user_username' style='margin-bottom: 15px;' type='text' name='inputEmail' size='30' placeholder='Mail adresin?'/>
												  <input id='user_password' style='margin-bottom: 15px;' type='password' name='inputPassword' size='30' placeholder='Sifren?'/>
												  <input id='user_remember_me' style='float: left; margin-right: 10px;' type='checkbox' name='inputRemember' value='1' />
												  <label class='string optional' for='user_remember_me'> Hatirla beni! N'olur</label>
												 
												  <input class='btn btn-primary' style='clear: left; width: 100%; height: 32px; font-size: 13px;' type='submit' name='submit' value='Giris' />
												</form>
								            </div>
								          </li>";
			              			}								
									echo"<li><a href='blog.php'>Blog</a></li>
									<li class='active'><a href='contactus.php'>Iletisim</a></li>";
			            		}
								

			            		echo "</ul>
			          		</div>
			        	</div>
			      	</div>
					
				</div>	
				<!--end: Navigation -->
					
			</div>
			<!--end: Row -->
			
		</div>
		<!--end: Container-->			
			
	</header>
	<!--end: Header-->";

    }
    
    function showFooter(){
	    echo "<!-- start: Footer Menu -->
		<div id='footer-menu' class='hidden-tablet hidden-phone'>
	
			<!-- start: Container -->
			<div class='container'>
				
				<!-- start: Row -->
				<div class='row'>
	
					<!-- start: Footer Menu Logo -->
					<div class='span2'>
						<div id='footer-menu-logo'>
							<div id='logo-chart'></div><a class='brand' href='#'>varmi<span>gelen</span>?</a>
						</div>
					</div>
					<!-- end: Footer Menu Logo -->
	
					<!-- start: Footer Menu Links-->
					<div class='span9'>
						
						<div id='footer-menu-links'>
	
							<ul id='footer-nav'>
	
								<li><a href='index.php'>anasayfa</a></li>
	
								<li><a href='add.php'>ilan ekle</a></li>
	
								<li><a href='list.php'>listele</a></li>
	
								<li><a href='profile.php'>profilim</a></li>
								
								<li><a href='contactus.php'>iletisim</a></li>
	
							</ul>
	
						</div>
						
					</div>
					<!-- end: Footer Menu Links-->
	
					<!-- start: Footer Menu Back To Top -->
					<div class='span1'>
							
						<div id='footer-menu-back-to-top'>
							<a href='#'></a>
						</div>
					
					</div>
					<!-- end: Footer Menu Back To Top -->
				
				</div>
				<!-- end: Row -->
				
			</div>
			<!-- end: Container  -->	
	
		</div>	
		<!-- end: Footer Menu -->
	
		<!-- start: Footer -->
		<div id='footer'>
			
			<!-- start: Container -->
			<div class='container'>
				
				<!-- start: Row -->
				<div class='row'>
	
					<!-- start: About -->
					<div class='span3'>
						
						<h3>O da kim? Hani nerde?</h3>
						<p>
							Varmıgelen ekibi, Sabancı Üniversitesi çatısı altında yolları kesişen on dört kişilik bir gruptur. Farklı hayatları, farklı ilgi alanları olan bu ekip, varmigelen.com kullanıcılarına daha eğlenceli ve daha hesaplı alternatif bir ulaşım olanağı sunmak için bir araya geldi.
						</p>
							
					</div>
					<!-- end: About -->
	
					<!-- start: Photo Stream -->
					<div class='span3'>
						
						<h3>Buradayiz aslinda.</h3>
						<div id='small-map-container'><a href='contactus.html'></a></div>
						<iframe id='small-map' width='210' height='210' frameborder='0' scrolling='yes' marginheight='0' marginwidth='0' src='https://maps.google.pl/maps?f=q&source=s_q&hl=pl&geocode=&q=Los+Angeles,+Kalifornia,+Stany+Zjednoczone&aq=0&oq=Los&sll=50.143066,18.85267&sspn=0.057207,0.168915&t=m&ie=UTF8&hq=&hnear=Los+Angeles,+Hrabstwo+Los+Angeles,+Kalifornia,+Stany+Zjednoczone&ll=34.052234,-118.243685&spn=0.036979,0.084457&z=14&iwloc=near&output=embed'></iframe>
						
					</div>
					<!-- end: Photo Stream -->
	
					<div class='span6'>
					
						<!-- start: Follow Us -->
						<h3>Bizi takip edin!</h3>
						<ul class='social-grid'>
							<li>
								<div class='social-item'>				
									<div class='social-info-wrap'>
										<div class='social-info'>
											<div class='social-info-front social-twitter'>
												<a href='http://twitter.com/varmigelen'></a>
											</div>
											<div class='social-info-back social-twitter-hover'>
												<a href='http://twitter.com/varmigelen'></a>
											</div>	
										</div>
									</div>
								</div>
							</li>
							<li>
								<div class='social-item'>				
									<div class='social-info-wrap'>
										<div class='social-info'>
											<div class='social-info-front social-facebook'>
												<a href='http://facebook.com/varmigelen'></a>
											</div>
											<div class='social-info-back social-facebook-hover'>
												<a href='http://facebook.com/varmigelen'></a>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li>
								<div class='social-item'>				
									<div class='social-info-wrap'>
										<div class='social-info'>
											<div class='social-info-front social-flickr'>
												<a href='http://beta.varmigelen.com/blog.php'></a>
											</div>
											<div class='social-info-back social-flickr-hover'>
												<a href='http://beta.varmigelen.com/blog.php'></a>
											</div>	
										</div>
									</div>
								</div>
							</li>
							
						</ul>
						<!-- end: Follow Us -->
						<div class=\"fb-like\" data-href=\"http://www.varmigelen.com\" data-send=\"false\" data-width=\"450\" data-show-faces=\"false\"></div>
						<!-- start: Newsletter -->
						<form id='newsletter'>
							<h3>\"Hemen paylasmak istiyorum!\" diyenlere...</h3>
							<label for='newsletter_input'>@:</label>
							<input type='submit' id='newsletter_submit' style='float:right' value='paylas yahu'>
							<input type='text' id='newsletter_input' name='share'/>
							
						</form>
						<!-- end: Newsletter -->
					
					</div>
					
				</div>
				<!-- end: Row -->	
				
			</div>
			<!-- end: Container  -->
	
		</div>
		<!-- end: Footer -->
	
		<!-- start: Copyright -->
		<div id='copyright'>
		
			<!-- start: Container -->
			<div class='container'>
			
				<div class='span12'>
					<p>
						&copy; 2012, <a href='http://www.varmigelen.com'>varmigelen</a>. Designed by <a href='http://www.desigyn.com'>Desigyn</a> Coding Studios.		
					</p>
				</div>
		
			</div>
			<!-- end: Container  -->
			
		</div>	
		<!-- end: Copyright -->
	
	<!-- start: Java Script -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src='js/jquery-1.8.2.js'></script>
	<script src='js/bootstrap.js'></script>
	<script src='js/isotope.js'></script>
	<script src='js/jquery.imagesloaded.js'></script>
	<script src='js/flexslider.js'></script>
	<script src='js/carousel.js'></script>
	<script src='js/jquery.cslider.js'></script>
	<script src='js/slider.js'></script>
	<script src='js/fancybox.js'></script>
<script type='text/javascript' src='js/jquery.validate.js'></script>
<script type='text/javascript' src='js/additional-methods.js'></script>
<script type='text/javascript' src='js/validation.js'></script>
	<script defer='defer' src='js/custom.js'></script>
	<!-- end: Java Script -->
	
	</body>
	</html>
	<!-- Localized -->";
    }
    
    ?>