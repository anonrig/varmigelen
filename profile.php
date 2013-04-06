<?php include "config.php";
	  include "functions.php"; 
	  
  if (!isset($_SESSION['sessionemail'])){
    header("Location: login.php?msg=login");
  }
  
  	  $todaysdate=date("Y-m-d",time()+25200);

	  $result = mysql_query("SELECT *
	FROM announces
	WHERE isDeleted = 0
	AND dayNum >= '$todaysdate'
	AND creatorId =" .$_SESSION['sessionid']); 
	
	  $num = mysql_query("SELECT COUNT(*) FROM announces WHERE isDeleted=0 AND dayNum >= '$todaysdate' AND creatorId =" .$_SESSION['sessionid']);
	  
	  $benimtekliflerim = mysql_query("SELECT a.id, u.name, uP.aID, uP.uID, a.dayNum, a.fromLoc, a.toLoc, a.carStatus, uP.carStatus, uP.userStatus, uP.isChanged
	FROM announces a, userPoolLinker uP, users u
	WHERE a.id = uP.aID
	AND u.id = uP.uID
	AND isDeleted = 0
	AND dayNum >= '$todaysdate'
	AND u.id =" .$_SESSION['sessionid']);
	
	  $gelentekliflerim = mysql_query("SELECT a.id, u.username, u.name, u.email, a.dayNum, a.fromLoc, a.toLoc, a.supplyStatus, uP.carStatus, uP.userStatus, uP.uID, a.creatorId, uP.isChanged
	FROM users u, announces a, userPoolLinker uP
	WHERE uP.aID = a.id
	AND uP.uID = u.id
	AND isDeleted = 0
	AND dayNum >= '$todaysdate'
	AND a.creatorId =" .$_SESSION['sessionid']);

  	showHeader("Aktif Ilanlar | varmigelen?", "carPooling sayfasina hosgeldiniz.", "carpooling");
	
	showNavbar("profile");

?>

	<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-user ico-white"></i>Merhaba <strong><?php echo ucwords(fnDecrypt($_SESSION['sessionname'], "6eb598ac1356f82a91efe59f0e17be57")); ?></strong>!</h2>
				
			</div>
			<!-- end: Container  -->
			
		</div>	
				
	</div>
	<!-- end: Page Title -->

	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!--start: Container -->
    	<div class="container">
	
			<!--start: Row -->
	    	<div class="row">
		
				<div class="span9">
					  <?php 
					    if(isset($_REQUEST['msg'])){
						  $msg = $_REQUEST['msg'];
						  
						  if ($msg == "update"){
						    echo "<div class='alert alert-success'><strong>Basarili:</strong> Basariyla bilgilerinizi degistirdiniz.</div>";
						  } else if ($msg == "fail"){
						    echo "<div class='alert alert-error'><strong>Basarisiz:</strong> Bilgileriniz degistirilmedi.</div>";
						  } else if ($msg == "success"){
						    echo "<div class='alert alert-success'><strong>Basarili:</strong> Basariyla giris yaptiniz.</div>";
						  } else if ($msg == "update"){
						    echo "<div class='alert alert-success'><strong>Basarili:</strong> Bilgileriniz basariyla degistirildi.</div>";
						  } 
						}
						?>
					<!-- start: About Us -->
					<div id="about">
						<div class="title"><h3>Profilim</h3></div>
						
						<ul class="tabs-nav">
							<li><a href="#ilanlarim"><i class="mini-ico-list"></i> Ilanlarim</a></li>
							<li><a href="#gelenler"><i class="mini-ico-download"></i> Gelenler</a></li>
							<li><a href="#tekliflerim"><i class="mini-ico-upload"></i> Tekliflerim</a></li>
							<li><a href="#ayarlarim"><i class="mini-ico-wrench"></i> Ayarlarim</a></li>
						</ul>
						
						<div class="tabs-container">
							<div class="tab-content" id="ilanlarim">
								<table class="table table-hover">
							    <tr>
							      
							        <td>#</td>
							        <td></td>
							        <td>Baslangıç</td>
							        <td>Varış</td>
							        <td>Saat</td>
							        <td>Tarih</td>
							        <td>Bilgi/Sil</td>		        	        
							      
							    </tr>
							  <?php 
							        if ($num > 1){
							        $i = 1;
							      while($row = mysql_fetch_array($result)){
							        $dataId=$row['id'];
							        $fromLoc=$row['fromLoc'];
							        $toLoc=$row['toLoc'];
							        $timeNum=$row['timeNum'];
							        $dayNum=$row['dayNum'];
							        $aStatus=$row['aStatus'];
							        
							        if ($aStatus == "1"){
							          echo "<tr onclick='input' class='error' href='google.com'>";
							        }else {
							          echo "<tr onclick='input' class='success' href='google.com'>";
							        }
							        echo "
							        <input type='hidden' name='id' value='$dataId' />
							        <td>$i</td>";
							        
							        if ($aStatus== '1') {
								        echo "<td><i class='icon-remove'></i></td>";
							        } else {
								        echo "<td><i class='icon-ok'></i></td>";
							        }
							        echo "<td>$fromLoc</td>
							        <td>$toLoc</td>
							        <td>$timeNum</td>
							        <td>$dayNum</td>
							        <td>
							        <a href='./show.php?id=$dataId'><button type='submit' class='btn btn-info' name='git'><i class='mini-ico-search'></i></button></a>
							        <a href='./functions/delete.php?id=$dataId'><button type='submit' class='btn btn-info' name='submit'><i class='mini-ico-remove'></i></button>
							        </td>
							        </tr></a>";
							        $i++;
							      }
							      }
							  ?>
							  </table>

							</div>
							<div class="tab-content" id="gelenler">
								
								  <table class="table table-hover">
								    <tr>
								      
								        <td>#</td>
								        <td>Gonderen</td>
								        <td>Baslangıç</td>
								        <td>Varış</td>
								        <td>Tarih</td>
								        <td>Durumu</td>
								        <td>Kabul/Red</td>
								      
								    </tr>
								    
								        <?php 
								        $i = 1;
								      while($row = mysql_fetch_array($gelentekliflerim)){
								        $aId=$row['id'];
								        $userName=fnDecrypt($row['name'], "6eb598ac1356f82a91efe59f0e17be57");;
								        $fromLoc=$row['fromLoc'];
								        $toLoc=$row['toLoc'];
								        $dayNum=$row['dayNum'];
								        $supplyStatus=$row['supplyStatus'];
								        $uStatus=$row['userStatus'];
								        $carStatus=$row['carStatus'];
								        $uId=$row['uID'];
										$creatorId=$row['creatorId'];
										$isChanged=$row['isChanged'];
										
								        if ($uStatus == "0"){
								          $uStatus = "Reddedildi";
								          echo "<tr class='error'>";
								        }else if ($uStatus == "1") {
								          $uStatus = "Kabul Edildi.";
								          echo "<tr class='success'>";
								        } else if ($uStatus == "2"){
								          $uStatus = "Bekleniyor.";
								          echo "<tr>";
								        }
								        echo "<form method='post' action='functions/acceptordeny.php' name='postsForm'>
								        
								        <input type='hidden' name='aid' value='$aId' />
										<input type='hidden' name='uid' value='$uId' />
										<input type='hidden' name='creatorid' value='$creatorId' />
								        <td>$i</td>
								        <td>$userName</td>
								        <td>$fromLoc</td>
								        <td>$toLoc</td>
								        <td>$dayNum</td>";
								        
								        if ($carStatus == "3"){
								          echo "<td>Taksiyle</td>";
								        } else if($carStatus == "1"){
								          echo "<td>Arabalı</td>";
								        } else if($carStatus == "2"){
								          echo "<td>Arabasiz</td>";
								        }
								        //echo "<td>$isChanged $carStatus</td>";
								        if(!($isChanged == '1') && ($carStatus != 1)) {
									      
									        echo "<td><button class='btn btn-success' name='accept'><i class='icon-ok'></i></a></button> <button class='btn btn-danger' name='deny'><i class='icon-remove'></i></a></button></td></tr>";
								        } else {
									        echo "<td>$uStatus</td>";
								        }
								        $i++;      }
								  ?>
								  </table>
							</div>
							<div class="tab-content" id="tekliflerim">
								<table class="table table-hover">
							    <tr>
							      
							        <td>#</td>
							        <td>Baslangıç</td>
							        <td>Varış</td>
							        <td>Tarih</td>
							        <td>Araba</td>
							        <td>Durumu</td>
							        <td>Katıl</td>
							      
							    </tr>
							    
							    <?php 
							        $i = 1;
							      while($row = mysql_fetch_array($benimtekliflerim)){
							        $aId=$row['id'];
							        $fromLoc=$row['fromLoc'];
							        $toLoc=$row['toLoc'];
							        $dayNum=$row['dayNum'];
							        $uStatus=$row['userStatus'];
							        $carStatus=$row['carStatus'];
							        
							        if ($uStatus == "0"){
							          $uStatus = "Reddedildi";
							          echo "<tr class='error'>";
							        }else if ($uStatus == "1") {
							          $uStatus = "Kabul Edildi.";
							          echo "<tr class='success'>";
							        } else if ($uStatus == "2"){
							          $uStatus = "Bekleniyor.";
							          echo "<tr>";
							        }
							        echo "
							        <td>$i</td>
							        <td>$fromLoc</td>
							        <td>$toLoc</td>
							        <td>$dayNum</td>";
							        
							        if ($carStatus == "3"){
							          echo "<td>Taksiyle</td>";
							        } else if($carStatus == "1"){
							          echo "<td>Arabalı</td>";
							        } else if($carStatus == "2"){
							          echo "<td>Arabasiz</td>";
							        }
							        
							        echo "<td>$uStatus</td>";
							        echo "<td><a href='./show.php?id=$aId'><button class='btn'>Bilgi</button></td></a></tr>";
							        $i++;      }
							  ?>
							
							  </table>
							</div>
							<div class="tab-content" id="ayarlarim">
								
								 <form class="form-horizontal" action="./functions/profile.php" method="post">
								    <input type="hidden" name="id" value="<?php echo $_SESSION['sessionid'];?>">
								    <div class="control-group">
								      <label class="control-label" for="inputEmail">Email Adresin:</label>
								      <div class="controls">
								        <input type="text" name="inputEmail" value="<?php echo fnDecrypt($_SESSION['sessionemail'], "6eb598ac1356f82a91efe59f0e17be57");?>">
								      </div>
								    </div>
								     <div class="control-group">
								      <label class="control-label" for="inputUsername">Kullanıcı adın:</label>
								      <div class="controls">
								        <input type="text" name="inputUsername" value="<?php echo fnDecrypt($_SESSION['sessionusername'], "6eb598ac1356f82a91efe59f0e17be57");?>">
								      </div>
								    </div>
								    <div class="control-group">
								      <label class="control-label" for="inputName">Adın ve Soyadın</label>
								      <div class="controls">
								        <input type="text" name="inputName" value="<?php echo ucwords(fnDecrypt($_SESSION['sessionname'], "6eb598ac1356f82a91efe59f0e17be57"));?>">
								      </div>
								    </div>
								    <?php $enabled = false; if($enabled==true) { ?>
									    <div class="control-group">
									      <label class="control-label" for="inputbDay">Doğum tarihin:</label>
									      
									      <div class="controls"><div class="input-append date" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
									          <input type="date" name="inputbDay" value ="<?php echo $_SESSION['sessionbday'];?>"readonly><span class="add-on"><i class="icon-calendar"></i></span>
									      </div></div>
									    </div>
								    <?php } ?>
								    <div class="control-group">
								      <label class="control-label" for="inputschoolWork">Okulun/Çalıştığın yer:</label>
								      <div class="controls">
								        <input type="text" name="inputschoolWork" value="<?php echo fnDecrypt($_SESSION['sessionschoolwork'], "6eb598ac1356f82a91efe59f0e17be57");?>">
								        
								      </div>
								    </div>
								    <div class="control-group">
								      <label class="control-label" for="inputGender">Cinsiyetin:</label>
								      <div class="controls" >
								         <select class="combobox" name="inputGender">
										  <?php if ($_SESSION['sessiongender'] == "Bay"){?>
										  <option value="Bay">Erkek</option>
										  <option value="Bayan">Kadın</option>
										  <?php } else if ($_SESSION['sessiongender'] == "Bayan"){?>
										  <option value="Bayan">Kadın</option>
										  <option value="Bay">Erkek</option>
										  <?php } else { ?>
										  <option></option>
										  <option value="Bayan">Kadın</option>
										  <option value="Bay">Erkek</option>
										  <?php } ?>
									</select>
								    </div> 
								    </div>
								    <div class="control-group">
								      <div class="controls">
								        <button type="submit" name="submit" class="btn">Değiştir!</button>
								      </div>
								    </div>
								 </form>  

							</div>
              
						</div>

					</div>
					<!-- end: About Us -->	
					
									
				</div>	
				
				<div class="span3">
					
					<!-- start: Sidebar -->
					<div id="sidebar">

						<!-- start: Testimonials-->

						<div class="testimonial-container">

							<div class="title"><h3>Biliyor muydun?</h3></div>

								<div class="testimonials-carousel" data-autorotate="3000">

									<ul class="carousel">

										<li class="testimonial">
											<div class="testimonials">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</div>
											<div class="testimonials-bg"></div>
											<div class="testimonials-author">Lucas Luck, <span>CEO</span></div>
										</li>

										<li class="testimonial">
											<div class="testimonials">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</div>
											<div class="testimonials-bg"></div>
											<div class="testimonials-author">Lucas Luck, <span>CTO</span></div>
										</li>

										<li class="testimonial">
											<div class="testimonials">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</div>
											<div class="testimonials-bg"></div>
											<div class="testimonials-author">Lucas Luck, <span>COO</span></div>
										</li>

										<li class="testimonial">
											<div class="testimonials">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</div>
											<div class="testimonials-bg"></div>
											<div class="testimonials-author">Lucas Luck, <span>CMO</span></div>
										</li>

									</ul>

								</div>

							</div>

						<!-- end: Testimonials-->

					</div>
					<!-- end: Sidebar -->
					
				</div>
				
			</div>
			<!--end: Row-->
	
		</div>
		<!--end: Container-->
				
		<!--start: Container -->
    	<div class="container">	
      		
			<hr>
		
			<!-- start Clients List -->	
			<div class="clients-carousel">
		
				<ul class="slides clients">
					<li><img src="img/logos/1.png" alt=""/></li>
					<li><img src="img/logos/2.png" alt=""/></li>	
					<li><img src="img/logos/3.png" alt=""/></li>
					<li><img src="img/logos/4.png" alt=""/></li>
					<li><img src="img/logos/5.png" alt=""/></li>
					<li><img src="img/logos/6.png" alt=""/></li>
					<li><img src="img/logos/7.png" alt=""/></li>
					<li><img src="img/logos/8.png" alt=""/></li>
					<li><img src="img/logos/9.png" alt=""/></li>
					<li><img src="img/logos/10.png" alt=""/></li>		
				</ul>
		
			</div>
			<!-- end Clients List -->
		
			<hr>
		
		</div>
		<!--end: Container-->	

	</div>
	<!-- end: Wrapper  -->			

<?php showFooter(); ?>