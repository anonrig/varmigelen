<?php include "config.php";
	  include "functions.php"; 
	  
  if (!isset($_SESSION['sessionemail'])){
    //header("Location: login.php?msg=login");
  }
  	showHeader("Yeni ilan ekle | varmigelen?", "carPooling sayfasina hosgeldiniz.", "carpooling");
	
	showNavbar("contactus");
?>

	<!-- start: Map -->
	<div>

		<!-- starts: Google Maps -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<div id="googlemaps-container-top"></div>
		<div id="googlemaps" class="google-map google-map-full"></div>
		<div id="googlemaps-container-bottom"></div>
		<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
		<script src="js/jquery.gmap.min.js"></script>
		<script type="text/javascript">
			$('#googlemaps').gMap({
				maptype: 'ROADMAP',
				scrollwheel: false,
				zoom: 15,
				markers: [
					{
						address: 'Sabanci University, Istanbul', // Your Adress Here
						html: '',
						popup: false,
					}

				],

			});
		</script>
		<!-- end: Google Maps -->
	</div>
	<!-- end: Map -->	
	
	<!-- start: Wrapper -->	
	<div id="wrapper">		

		<!-- start: Container -->	
		<div class="container">
			
			<!-- start: Row -->
			<div class="row">
			
				<!-- start: Contact Info -->
				<div class="span9">
					<div class="title"><h3>Var mi gelen nedir?</h3></div>
					<p>Otostop kalktı mı ? 20.yüzyıl nostaljisi olarak devam ediyor ama hala tesadüfe inanan romantikler ya da korkusuz cesurlar için..Siz ,siz olun önleminizi alın...</p>

					<p>Avrupa ve Kuzey Amerika'da uzun zamandır rağbet gören modern ulaşım kültürü 'car pooling' Türkiye'de de faaliyette . Kosmopolit bütün şehirlerde olduğu gibi trafik yorucu ve bıktırıcı olduğu için araç sahibi olmayı vazgeçtirecek servisler öne çıkıyor. Aynı çevrede oturup aynı istikamete gitmek isteyen sürücülerle yayaları buluşturan varmıgelen bu ulaşım kültürünü Türkiye'ye yaymayı hedefliyor.</p>
					
					<p>Varmıgelen Türkiye'de güvenilir hizmet veren bir servis olarak rotanızı ,zamanlamanızı iyi belirleyebileceğiniz gitmek istediğiniz yere en kısa zamanda gitmenizi sağlayacak ortak bir seyahat imkanı. Daha az trafik , daha az yakıt, daha ekonomik bir yaşam vadediyoruz. Masrafları paylaşarak tek arabada seyahat edeceğiniz bu servisin önemli bir ağı da güvenlik .Varmıgelen.com  üzerinden, paylaşacağınız aracın plakasını ve birlikte yolculuk edeceğiniz insanların telefon numarasını,e-posta adresini ve çalıştıkları kurumu görebileceksiniz site üzerinden oluşturdukları ''varmıgelen profil''lerinden. Masrafların nasıl karşılanacağı , ödemenin ne zaman ne şekilde olacağı yine sitemizdeki üyeler arasında belirlenecektir .Bunun yanı sıra sigara serbest mi ,ne tür müzik dinlenecek bu gibi detayları site kullanıcısı kurallar kısmında belirtecektir. Carpooling sistemi ulaşıma alternatif bir çözüm sunmuştur ,varmıgelen olarak bu çözümü sizlerle paylaşmak ve güvenilir bir ulaşım ağı oluşturup bu ulaşım kültürünü yaymak misyonumuzdur.</p>
				</div>
				<!-- end: Contact Info -->		

				<!-- start: Contact Form -->
				<div class="span3">
					<div class="title"><h3>Iletisim formu</h3></div>

					<!-- start: Contact Form -->
					<div>

						<form method="post" action="" id="contact-form">

							<fieldset>
								<div class="clearfix">
									<label for="name"><span>Isim Soyad:</span></label>
									<div class="input">
										<input style="margin-bottom:0px;" tabindex="1" size="18" id="name" name="inputUsername" type="text" value="">
									</div>
								</div>

								<div class="clearfix">
									<label for="email" style="margin-top:10px;"><span>Email:</span></label>
									<div class="input">
										<input tabindex="2" style="margin-bottom:0px;" size="25" id="email" name="inputEmail" type="text" value="" class="input-xlarge">
									</div>
								</div>

								<div class="clearfix">
									<label for="message" style="margin-top:10px;"><span>Mesajiniz:</span></label>
									<div class="input">
										<textarea tabindex="3" class="input-xlarge" style="margin-bottom:0px;" id="message" name="body" rows="7"></textarea>
									</div>
								</div>

								<div class="actions pull-right">
									<button tabindex="3" style="margin-top:15px;" type="submit" class="btn btn-succes btn-medium">Mesaj at!</button>
								</div>
							</fieldset>

						</form>

					</div>
					<!-- end: Contact Form -->

				</div>
				<!-- end: Contact Form -->
			
			</div>
			<!-- end: Row -->
			<div class="row">
			<!-- start: Contact Info -->
				<div class="title"><h3>Biz kimiz?</h3></div>
				<div class="spanprotector">
					<div class="span4">
	          			<div class="icons-box">
							<i class="ico-iphone ico-color circle-color big"></i>
							<div class="title"><h3>Selcuk Ozyurt</h3></div>
							<p>
								Sabanci Universitesi ekonomi bolumu ogretim gorevlisi. Girisimci.
							</p>
							<div class="clear"></div>
						</div>
	        		</div>

	        		<div class="span4">
	          			<div class="icons-box">
							<i class="ico-imac circle big"></i>
							<div class="title"><h3>Yagiz Nizipli</h3></div>
							<p>
								Bilgisayar muhendisligi 3. sinif ogrencisi. Muzisyen. Programci.
							</p>
							<div class="clear"></div>
						</div>
	        		</div>

	        		<div class="span4">
	          			<div class="icons-box">
							<i class="ico-ok ico-white circle-color-full big-color"></i>
							<div class="title"><h3>Mert Issever</h3></div>
							<p>
								Birinci sinif ogrencisi. Yelkenci. Muzisyen.
							</p>
							<div class="clear"></div>
						</div>
	        		</div>
	        	</div>
	        	<div class="spanprotector">
	        		<div class="span4">
	          			<div class="icons-box">
							<i class="ico-embed-close ico-color circle-color big"></i>
							<div class="title"><h3>Barış Yalın Uzunlu</h3></div>
							<p>
								Ekonomi 3. sınıf öğrencisi. Sanatsever. 
							</p>
							<div class="clear"></div>
						</div>
	        		</div>

	        		<div class="span4">
	          			<div class="icons-box">
							<i class="ico-shopping-cart circle big"></i>
							<div class="title"><h3>e-commerce</h3></div>
							<p>
								Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
							</p>
							<div class="clear"></div>
						</div>
	        		</div>

	        		<div class="span4">
	          			<div class="icons-box">
							<i class="ico-thumbs-up ico-white circle-color-full big-color"></i>
							<div class="title"><h3>Social Marketing</h3></div>
							<p>
								Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
							</p>
							<div class="clear"></div>
						</div>
	        		</div>
	        	</div>

				<!-- end: Contact Info -->	
			
			
			</div>
		</div>
		<!-- end: Container -->
				
  	</div>
	<!-- end: Wrapper  -->			

<!-- start: Java Script -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-1.8.2.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/isotope.js"></script>
<script src="js/jquery.imagesloaded.js"></script>
<script src="js/flexslider.js"></script>
<script src="js/carousel.js"></script>
<script src="js/jquery.cslider.js"></script>
<script src="js/slider.js"></script>
<script src="js/fancybox.js"></script>
<script defer="defer" src="js/custom.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/additional-methods.js"></script>
<script type="text/javascript" src="js/validation.js"></script>
<!-- end: Java Script -->


    
<?php showFooter(); ?>