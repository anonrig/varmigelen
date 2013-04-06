<?php include "config.php";
	  include "functions.php"; 
	  
  if (!isset($_SESSION['sessionemail'])){
    //header("Location: login.php?msg=login");
  }
  	showHeader("Yeni ilan ekle | varmigelen?", "carPooling sayfasina hosgeldiniz.", "carpooling");
	
	showNavbar("add");
?>

	<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-stats ico-white"></i>Yeni ilan mi eklemek istiyorsun?</h2>

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
		
				<div class="span8">
					
					<!-- start: About Us -->
					<div id="about">
						<div class="title"><h3>Ilan eklemeliyim!</h3></div>
						<?php 

						  if (isset($_REQUEST['msg'])) {
						  	$msg = $_REQUEST['msg'];
							  if ($msg == "fail"){
							    echo "<div class='alert alert-error'><strong>HATA:</strong> Veritabanina eklenirken bir problem ile karsilasindi.</div>";
							  }
						  
						  }
						  $query = mysql_query("Select * from locations name ORDER BY name");
						  $query2 = mysql_query("Select * from locations name ORDER BY name");
						  
						?>
			<form method="post" action="functions/add.php" id="addForm" class="form-horizontal" >
				<fieldset>
			      <div class="control-group">
			      <label class="control-label" for="fromLoc">Lütfen yolculuğunuzun başlangıç ve bitiş yerlerini yazın.</label>
			        
			      <div class="controls">
			        <select class="combobox" id="fromLoc" name="fromLoc">
					  <option>Nereden?</option>
					  <option>-------</option>
					<?php 
					  while($row = mysql_fetch_array($query)){
				      $name=$row['name'];
				      echo "<option value='$name'>$name</option>";
				      }
				    ?>
				    </select>
					
					<select class="combobox" id="toLoc" name="toLoc">
						  <option>Nereye?</option>
						  <option>-------</option>
						  <?php 
						  while($row = mysql_fetch_array($query2)){
					      $name=$row['name'];
					      echo "<option value='$name'>$name</option>";
					      }
					    ?>
					</select>
				  </div>
				  </div>
			
			
				  <div class="control-group">
				    <label class="control-label" for="carStatus">Lütfen arabalı olup olmadığınızı yazınız.</label>
			
				    <div class="controls">
			        <label class="radio">
			          <input type="radio" name="optionsRadios" name="withCar" id="withCar" value="1" checked>
			          Sürücüyüm.
			        </label>
			        <label class="radio">
			          <input type="radio" name="optionsRadios" name="withoutCar" id="withoutCar" value="2">
			          Yolcuyum.
			        </label>
			        <label class="radio">
			          <input type="radio" name="optionsRadios" name="withTaxi" id="withTaxi" value="3">
			          Taksi.
			        </label>
			        </div>
			      </div>
			      
			      	<div class="control-group">
			      	<label class="control-label" for="seatCapacity">Peki ya aracınızın kapasitesi nedir? (Sürücü hariç)</label>
			        
				    <div class="controls">
			        <input type="text" name="seatCapacity" placeholder="Kaç kişilik bir araç?" rel="popover" data-content="Aracinizin kac kisilik oldugunu yazin." data-original-title="Kac kisilik?">
			        </div>
			        </div>
			
			        <div class="control-group">
				      <label class="control-label" for="dayNum">Hangi gün ve saat kaçta buluşmak istiyorsunuz?</label>
				
				      <div class="controls">
				        <div class="input-append date" id="dp3" data-date="<?php //echo NOW(); ?>" data-date-format="dd-mm-yyyy">
				          <input type="date" name="dayNum" placeholder="Hangi gün?" readonly><span class="add-on"><i class="icon-calendar"></i></span>
				        </div>
				        <div class="input-append bootstrap-timepicker-component">
				          <input class="timepicker-1 input" type="time" name="timeNum" placeholder="Yola cikis saatiniz"><span class="add-on"><i class="icon-time"></i></span>
				        </div>
				      </div>
				    </div>
			
				    <div class="control-group">
				      <label class="control-label" for="extras">Daha söylecekleriniz mi var? </label>
			        
				      <div class="controls">
					      <textarea class="input-large" name="noteText" id="noteText" placeholder="Eklemek istediklerinizi buraya yazabilirsiniz." rel="popover" data-content="Eklemek istediklerinizi buraya yazabilirsiniz." data-original-title="Not"></textarea>
				    </div>
				    </div>
				    
				    <div class="control-group">
				    	<label class="control-label" for="phoneNumber">Telefonunuzu yazın.</label>
				    	
				    	<div class="controls">
				    		<input type="number" name="phoneNumber" placeholder="Cep telefonunuz" rel="popover" data-content="Size ulasabilmek icin numaranizi birakmanizi oneririz." data-original-title="Telefon numarasi?"></textarea>
				    	</div>
				    </div>
			  	
				  <div class="control-group">
				  	<div class="controls">
				  		<button type="submit" class="btn btn-success" name="submit">verdim gitti!</button>
				  	</div>
				  </div>
			  
			 </fieldset>
			</form>

					</div>	
					<!-- end: About Us -->					
				
				</div>	
				
				<div class="span4">
					
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

	<script>
		$(function(){
			window.prettyPrint && prettyPrint();
			$('#dp1').datepicker({
				format: 'mm-dd-yyyy'
			});
			$('#dp2').datepicker();
			$('#dp3').datepicker();
			$('#dp3').datepicker();
			$('#dpYears').datepicker();
			$('#dpMonths').datepicker();
			
			
			var startDate = new Date(2012,1,20);
			var endDate = new Date(2012,1,25);
			$('#dp4').datepicker()
				.on('changeDate', function(ev){
					if (ev.date.valueOf() > endDate.valueOf()){
						$('#alert').show().find('strong').text('The start date can not be greater then the end date');
					} else {
						$('#alert').hide();
						startDate = new Date(ev.date);
						$('#startDate').text($('#dp4').data('date'));
					}
					$('#dp4').datepicker('hide');
				});
			$('#dp5').datepicker()
				.on('changeDate', function(ev){
					if (ev.date.valueOf() < startDate.valueOf()){
						$('#alert').show().find('strong').text('The end date can not be less then the start date');
					} else {
						$('#alert').hide();
						endDate = new Date(ev.date);
						$('#endDate').text($('#dp5').data('date'));
					}
					$('#dp5').datepicker('hide');
				});
		});
	</script>
	 <script type="text/javascript">
        $(document).ready(function () { 
            $('.timepicker-default').timepicker();

            $('.timepicker-1').timepicker({
                minuteStep: 1,
                template: 'modal',
                showSeconds: false,
                showMeridian: false
            });

            $('.timepicker-2').timepicker({
                minuteStep: 5,
                showInputs: false,
                disableFocus: true
            });

            $('.timepicker-3').timepicker({
                minuteStep: 1,
                secondStep: 5,
                showInputs: false,
                template: 'modal',
                modalBackdrop: true,
                showSeconds: false,
                showMeridian: false
            });

            $('.timepicker-4').timepicker({
                template: false,
                showInputs: false,
                minuteStep: 5
            });
        });
    </script>
    
<?php showFooter(); ?>