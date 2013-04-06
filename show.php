<?php include "config.php";
	  include "functions.php"; 

  $ilanid = mysql_real_escape_string($_GET['id']);
  
  $result = mysql_query("SELECT * FROM announces WHERE id = '$ilanid' AND isDeleted=0");
  $numrows=mysql_num_rows($result);
  
  if ($numrows==0){
	  header("Location: ./index.php");
  }
      $row = mysql_fetch_array($result);
      $id=$row['id'];
      $creatorId=$row['creatorId'];
      $createdTime=$row['createdTime'];
      $seatCapacity=$row['seatCapacity'];
      $fromLoc=$row['fromLoc'];
      $toLoc=$row['toLoc'];
      $carStatus=$row['carStatus'];
      $noteText=$row['noteText'];
      $timeNum=$row['timeNum'];
      $dayNum=$row['dayNum'];
      $phoneNumber=$row['phoneNumber'];
      $aStatus=$row['aStatus']; 
  
      $usertablosu = mysql_query("SELECT a.id, u.name, uP.aID, uP.uID, a.dayNum, a.fromLoc, a.toLoc, a.carStatus, uP.carStatus, uP.userStatus
FROM announces a, userPoolLinker uP, users u
WHERE a.id = uP.aID
AND u.id = uP.uID
AND a.id =". $id);
	$didRejected=false;
	$useralreadyexists=false; //ilana daha once teklif gondermis mi
	$carexists=false; //arabali olan biri var mi
	  $activeUsers = array();
	  
	  if (mysql_num_rows($usertablosu) != 0 ) {
		  while($rowptr = mysql_fetch_array($usertablosu)){
		  	if (($rowptr['userStatus']) == 1 ){
	              $activeUsers[username][]=fnDecrypt($rowptr['name'], "6eb598ac1356f82a91efe59f0e17be57");
	              $activeUsers[id][]=$rowptr['uID'];
	              $activeUsers[car][]=$rowptr['carStatus'];
	              if ($activeUsers[id][$i] == $_SESSION['sessionid']){
		              $useralreadyexists=true;
	              }
	              if ($activeUsers[car][$i]==1){
		              $carexists=true;
	              } 
	           $i++;   
	         } else if (($rowptr['uID'] == $_SESSION['sessionid'] )) {
		         $didRejected = true;
	         }    
            }
       }
	  
	$query=mysql_query("SELECT * FROM users WHERE id='$creatorId'");
	$row = mysql_fetch_array($query);
	$encryptedName=$row['name'];
	$encryptedEmail=$row['email'];
	$creatorName=ucwords(fnDecrypt($encryptedName, "6eb598ac1356f82a91efe59f0e17be57"));
	$creatorEmail=fnDecrypt($encryptedEmail, "6eb598ac1356f82a91efe59f0e17be57");
	
	$remainingSeat = $seatCapacity-$i; //kalan koltugun hesaplanmasi
	
	$desc = "$creatorName $fromLoc'dan $toLoc'a gidiyor, ve yolculugu icin arkadas ariyor. Haydi var mi gelen?";
  	showHeader("Aktif Ilanlar | varmigelen?", $desc , "carpooling");
	
	showNavbar("list");
	
?>
	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=249369395185414";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


	<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-stats ico-white"></i><?php echo $creatorName; echo ": Yol arkadaşım olur musunuz?";
	    ?>
</h2>
				
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
					<?php if(isset($_GET['msg'])){
					if($_GET['msg']=="requestsent"){
					echo "<div class='alert alert-success'><b>Tebrikler, ilan sahibine teklif gonderdiniz.</b> Kabul edilmesi durumunda ilana ekleneceksiniz.</div>";}}?>
					<!-- start: About Us -->
					<div id="about">
						<div class="title"><h3><?php echo $creatorName; echo " diyor ki:";
	    ?>
</h3></div>

					<form method="post" action="./functions/show.php" id="addForm" >
  

					<div class="row-fluid">
					      <div class="span4">
					       Ne zaman gidecekler?
					      </div>
					      <div class="span4">
					        <i class="icon-home"></i> <span class="input-large uneditable-input"><?php echo "$fromLoc";?></span><br>
					        <i class="icon-move"></i> <span class="input-large uneditable-input"><?php echo "$toLoc";?></span>
					      </div>
					</div>
					  </br>
					<div class="row-fluid">
						  <div class="span4">
					        Lütfen arabalı olup olmadığınızı yazınız.
					      </div>
					      <div class="span4">
					        <label class="radio">
					           <?php if ($carStatus == 1){
					            echo "<input type='radio' name='optionRadios' name='withCar' value='1' checked> Arabaliyim, yolcu ariyorum." ;
					          } else if ($carStatus == 3){
					          	echo "<input type='radio' name='optionRadios' name='taxi' value='3' checked> Taksiyle gitmek istiyorum.";
					          } else {
					            echo "<input type='radio' name='optionRadios' name='withoutCar' value='2' checked> Arabasizim.";
					          }?>
					
					        </label>
					      </div>
					</div>
					  <br>
					<div class="row-fluid">
					      <div class="span4">
					        Peki ya aracınızın kapasitesi nedir?</br>
					        (Sürücü Hariç)
					      </div>
					      <div class="span4">
					       <i class="icon-check"></i> <span class="input-large uneditable-input"><?php echo "$seatCapacity";?></span>
					      </div>
					
					</div>
					  </br>
					<div class="row-fluid">
					      <div class="span4">
					        Hangi gün ve saat kacta buluşmak istiyorsunuz?
					      </div>
					      <div class="span4">
					        <span class="add-on"><i class="icon-calendar"></i></span> <span class="input-large uneditable-input"><?php echo "$dayNum";?></span><br>
					        <span class="add-on"><i class="icon-time"></i></span> <span class="input-large uneditable-input"><?php echo "$timeNum";?></span>
					      </div>
					</div>
					  </br>
					<div class="row-fluid">
					      <div class="span4">
					        Daha söylecekleriniz mi var? <br>
					        Telefonunuzu ve/ya eklemek istediklerinizi yazın.
					      </div>
					      <div class="span4">	
					      	<i class=" icon-user"></i> <input type="number" name="phoneNumber" placeholder="<?php echo "$phoneNumber";?>" readonly></textarea><br>
					      	<i class="icon-info-sign"></i> <textarea rows="5" cols="4" class="input-large" name="noteText" id="noteText" placeholder="<?php echo "$noteText";?>" readonly></textarea>
					      </div>
					</div>
					<div class="row-fluid">
						<div class="span4">
						Paylaşmak ister misin?</div>
						<div class="span4">
						<div class="fb-send" data-href="http://beta.varmigelen.com/show.php?id=<?php echo $ilanid; ?>" data-font="lucida grande"></div>
						<br>
						<a href="https://twitter.com/share" class="twitter-share-button" data-via="varmigelen" data-lang="tr">Tweetle</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					    <!-- Place this tag where you want the +1 button to render. -->
					</br>
					<div class="g-plusone" data-size="medium"></div>
					
					<!-- Place this tag after the last +1 button tag. -->
					<script type="text/javascript">
					  (function() {
					    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
					    po.src = 'https://apis.google.com/js/plusone.js';
					    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
					  })();
					</script>
						</div>
					</div>
					<br>
					
					      <?php 
					    echo "<input type='hidden' name='id' value='$ilanid' />";
					      
					    if(!($creatorId == $_SESSION['sessionid']) && isset($_SESSION['sessionid']) ){
					    echo "<div class='row-fluid'><div class='span8'>";
					     if (!($didRejected)){
						     if ($carStatus == 1) { //arabali
							     if ($remainingSeat > 0 && (!$useralreadyexists)) {
								     echo "<button type='add' class='btn' value='ekle' name='addMe'>Beni ekle!</button>";
							     } else {
								     //yer kalmadi.
							     }
							     
						     } else if ($carStatus == 2) { //arabasiz
							    if ($carexists == true && !$useralreadyexists) {
								    echo "<button type='add' class='btn' value='ekle' name='addMe'>Beni ekle!</button>";
							    } else {
							    	if (!$useralreadyexists){
									    if ($remainingSeat == 1) {
										    echo "<button type='submit' class='btn' value='araba' name='addCarHost'>Arabam var</button>";
									    } else if ($remainingSeat > 1) {
										    echo "<button type='add' class='btn' value='ekle' name='addMe'>Beni ekle!</button>";
										    echo "<button type='submit' class='btn' value='araba' name='addCarHost'>Arabam var</button>";
									    } else {
										    //yer kalmadi.
									    }
								    }
							    }
							    
						     } else if ($carStatus == 3) { //taksiyle
							     if ($remainingSeat > 0 && $useralreadyexists) {
								     echo "<button type='add' class='btn' value='ekle' name='addMe'>Beni ekle!</button>";
							     } else {
								     //bisey yapma
							     }
						     }
						  } else { //rejected before
							  //bir sey yapma.
						  }
						  echo "<button type='submit' class='btn' value='spam' name='spamPost'>Sorun bildir</button></div></div>";
      					      
						}
					      ?>
					      
					</form>
	
					<div class="fb-comments" data-href="http://beta.varmigelen.com/show.php?id=<?php echo $ilanid; ?>" data-width="600" data-num-posts="4"></div>	
					</div>	
					<!-- end: About Us -->				
				
				</div>	
				
				<div class="span3">
					
					<!-- start: Sidebar -->
					<div id="sidebar">

						<!-- start: Testimonials-->

						<div class="testimonial-container">
						<?php if ($creatorId == $_SESSION['sessionid']){
					    echo "<div class='title'><h3>Sayfa yaraticisisiniz!</h3></div><div class='alert'>Isterseniz <a href='edit.php?id=$id'>buraya</a> tiklayarak sayfanizi degistirebilirsiniz.</div>";
					  } else {
						  echo "<div class='row-fluid'>"; 
						  if ($remainingSeat == 0) { echo "<div class='title'><h3>UZGUNUZ!</h3></div><div class='alert alert-error'><strong>UZGUNUZ:</strong> Bu ilandaki butun bos koltuklar kapildi.</div>";} 
						  else { echo "<div class='title'><h3>IYI HABER!</h3></div><div class='alert alert-success'>Bu ilanda hala bos bir alan var.</div>"; echo "</div>";} 
					  }
					  ?>
					  
						<div class="title"><h3>Firsati kacirma!</h3></div>
						
						<strong><?php echo $creatorName; ?></strong> <?php echo $dayNum; ?> tarihinde saat <?php echo $timeNum; ?>'de <strong><?php echo $fromLoc; ?></strong>'dan <strong><?php echo $toLoc; ?></strong>'a gidiyor. Aracinin kapasitesi <?php echo $seatCapacity; ?> ancak kalan koltuk sayisi <?php echo $remainingSeat; ?>. 
							<!-- start: Tabs -->
						<div class="title"><h3>Bilgi</h3></div>

						<ul class="tabs-nav">
							<li><a href="#tab2"><i class="mini-ico-list"></i> Ilan Sahibi</a></li>
							<li><a href="#tab3"><i class="mini-ico-pencil"></i> Katilanlar(<?php echo $seatCapacity-$remainingSeat . "/" . $seatCapacity; ?>)</a></li>
						</ul>

						<div class="tabs-container">
							<div class="tab-content" id="tab2"><a href='/profile.php?id=<?php echo $creatorId; ?>'><?php echo $creatorName; ?></a> <br> <?php echo $creatorEmail; ?> </div>
							<div class="tab-content" id="tab3">
							<?php    
							
							if ($i != 0 ) {
								for ( $j=0; $j < $i; $j++){
									if ($activeUsers[car][$j]==1){
							              echo "<li><a href='/profile.php?id=" . $activeUsers[id][$j] . "'>" . $activeUsers[username][$j] . " <span class='label label-success'>Araba sahibi</span></a></li>";
						              } else {
							              echo "<li><a href='/profile.php?id=" . $activeUsers[id][$j] . "'>" . $activeUsers[username][$j] . "</a></li>";
						              }
								}
					       } else {
						     echo "Suanlik bu ilana katilan bir kullanici yok. Belki sen olabilirsin? Bak fikir yurutuyorum simdi. Nasil olur?";
						   }           
								
								
							?>
              
						</div>
						<!-- end: Tabs -->
							
						</div>
						<!-- end: Testimonials-->
						<div class="fb-like-box" data-href="http://www.facebook.com/varmigelen" data-width="272" data-show-faces="true" data-stream="false" data-border-color="#FFFFFF"  data-header="false"></div>
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