<?php include "config.php";
	  include "functions.php"; 
	  
  if (!isset($_SESSION['sessionemail'])){
    //header("Location: login.php?msg=login");
  }
  	showHeader("Aktif Ilanlar | varmigelen?", "carPooling sayfasina hosgeldiniz.", "carpooling");
	
	showNavbar("list");
	
	  $todaysdate=date("Y-m-d",time()+25200);
	  $todaystime=date("H:i:s", time()+25200);
	  $num = mysql_query("SELECT COUNT(*) FROM announces WHERE isDeleted=0 AND dayNum >= '$todaysdate'");
	  $count = mysql_fetch_array($num, MYSQL_BOTH);
	  $count = $count[0];
	  $page=1;
	  if($count % 10 != 0) {
	    $page = (int)(($count/10)+1);
	  }
	  else {
	    $page = (int)($count/10);
	  }
	  $current=1;
	  if(is_int($_REQUEST['page'])){
		  echo"girdi"; die();
	  }
	  if(isset($_REQUEST['page'])) {
	    $current = $_REQUEST['page'];
	  } else {
	    $current = 1;
	  }
	  $c = ($current*10)-10;
	  $result = mysql_query("select * from announces WHERE isDeleted=0 AND dayNum >= '$todaysdate' order by dayNum asc limit ".$c.", 10");
	  $resultnum=mysql_num_rows($result);
	  //echo $resultnum;
	  $latest = mysql_query("select * from announces WHERE isDeleted=0 AND dayNum >= '$todaysdate' order by dayNum asc limit 3");
	  $latestnum=mysql_num_rows($latest);
?>

	<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-stats ico-white"></i>Aktif Ilanlar</h2>
				
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
					
					<!-- start: About Us -->
					<div id="about">
						<div class="title"><h3>Aktif ilanlar</h3></div>
						<table class="table table-hover">
					<tr>
				      <td>#</td>
				      <td></td>
				      <td>Baslangıç</td>
				      <td>Varış</td>
				      <td>Saat</td>
				      <td>Tarih</td>
				      <td></td>
				    </tr>
				    
				    <?php
				    $i=1;
				       while($row = mysql_fetch_array($latest)){
					      $id=$row['id'];
					      $fromLoc=$row['fromLoc'];
					      $toLoc=$row['toLoc'];
					      $timeNum=$row['timeNum'];
					      $dayNum=$row['dayNum'];
					      $aStatus=$row['aStatus'];
					      
					      if ($aStatus == "1"){
					        echo "<tr class = 'error'><td>$i</td><i class='icon-remove'></i><td>$fromLoc</td><td>$toLoc</td><td>$timeNum</td><td>$dayNum</td><td></td><td><a href='./show.php?id=$id'><button type='submit' class='btn'>Bilgi</button></a></td></tr>";
					      }else {
					        echo "<tr class='success'><td>$i</td><td><i class='icon-ok'></i></td><td>$fromLoc</td><td>$toLoc</td><td>$timeNum</td><td>$dayNum</td><td><a href='./show.php?id=$id'><button type='submit' class='btn'>Bilgi</button></a></td></tr>";
					      }
					      $i++;
					    }
					?>
				</table>

						
					</div>	
					<!-- end: About Us -->	
					
					<!-- start: About Us -->
					<div id="about">
						<div class="title"><h3>Tum ilanlar</h3></div>
						<table class="table table-hover">
  <tr>
    
      <td>#</td>
      <td></td>
      <td>Baslangıç</td>
      <td>Varış</td>
      <td>Saat</td>
      <td>Tarih</td>
       <td></td>
    
  </tr>
    <?php 
    if ($current == 1) {
      $i = 1;
    } else {
      $i=((($current-1)*10) +1);
    }
    while($row = mysql_fetch_array($result)){
      $id=$row['id'];
      $fromLoc=$row['fromLoc'];
      $toLoc=$row['toLoc'];
      $timeNum=$row['timeNum'];
      $dayNum=$row['dayNum'];
      $aStatus=$row['aStatus'];
      
      if ($aStatus == "1"){
        echo "<tr class = 'error'><td>$i</td><i class='icon-remove'></i><td>$fromLoc</td><td>$toLoc</td><td>$timeNum</td><td>$dayNum</td><td></td><td><a href='./show.php?id=$id'><button type='submit' class='btn'>Bilgi</button></a></td></tr>";
      }else {
        echo "<tr class='success'><td>$i</td><td><i class='icon-ok'></i></td><td>$fromLoc</td><td>$toLoc</td><td>$timeNum</td><td>$dayNum</td><td><a href='./show.php?id=$id'><button type='submit' class='btn'>Bilgi</button></a></td></tr>";
      }
        
      
      $i++;
    }
    ?>
</table>

<div class="pagination pagination-centered">
		  <ul>
		  <?php
			  if($current==1)
			  	echo "<li class=\"active\"><a href=\"#\">Onceki</a></li>\n";
			  else
			  	echo "<li><a href=\"?page=".($current-1)."\">Onceki</a></li>\n";
			  for($i=1; $i <= $page; $i++){
				  if($i==$current)
				  	echo "<li class=\"active\"><a href=\"#\">$i</a></li>\n";
				  else
				  	echo "<li><a href=\"?page=$i\">$i</a></li>\n";
			  }
			  
			  if($current==$page)
			  	echo "<li class=\"active\"><a href=\"#\">Sonraki</a></li>\n";
			  else
			  	echo "<li><a href=\"?page=".($current+1)."\">Sonraki</a></li>\n";
		  ?>
</ul>
		  
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