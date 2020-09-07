<?php
$pagetitle = "Ticket Search";

include ("connection/db.php");
include("inc/header.php");

?>

	<!--end header begin tabs-->
	
	<div class="resp-tabs-container">
			<div name = class="tab-1 resp-tab-content roundtrip">
				<form action="process.php" method="get">
					<div class="from">
						<h3>From</h3>
						<select class="cities" name="from_city" value="<?php if(isset($_GET['from_city'])) { echo htmlentities ($_GET['from_city']); } else echo '';?>">
							<option name="" value="Mostar">Mostar</option>
							<option name="" value="Dubrovnik">Dubrovnik</option>
						 </select>
					</div>
					<div class="to">
						<h3>To</h3>
						<select class="cities" name="to_city" value="<?php if(isset($_GET['to_city'])) { echo htmlentities ($_GET['to_city']); } else echo '';?>">
						<option name="" value="Dubrovnik">Dubrovnik</option>
							<option name="" value="Mostar">Mostar</option>
						 </select>
					</div>
					<div class="clear"></div>
					<div class="date">
						<div class="depart">
							<h3>Depart</h3>
							<input  id="datepicker" name="departure_date" type="text" value="mm/dd/yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
						</div>
						<div class="return">
							<h3>Return</h3>
							<input  id="datepicker1" name="return_date" type="text" value="mm/dd/yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
						</div>
						<div class="clear"></div>
					</div>
					<div class="class">
						<h3>Class</h3>
						<select id="w3_country1" name = "class" onchange="change_country(this.value)" class="frm-field required">
							<option name = "economy" value="Economy">Economy</option>    
							<option name = "business" value="Business">Business</option>   
							<option name = "first_class" value="First Class">First Class</option>   						
						</select>
					</div>
					<div class="clear"></div>
					<div class="numofppl">
						<div class="adults">
							<h3>Adult:(12+ yrs)</h3>
							<div class="quantity"> 
								<div class="quantity-select">                           
								  <select class="age" name="count_a">
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="0">2</option>
									<option value="1">3</option>
									<option value="0">4</option>
									<option value="1">5</option>
								  </select>
								</div>
							</div>
						</div>
						<div class="child">
							<h3>Child:(2-11 yrs)</h3>
							<div class="quantity"> 
								<div class="quantity-select">                           
								  <select class="age" name="count_c">
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="0">2</option>
									<option value="1">3</option>
									<option value="0">4</option>
									<option value="1">5</option>
								  </select>
								</div>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
					<input type="submit" value="Search Flights" name = "submit">
				</form>						
			</div>		
			<div class="tab-1 resp-tab-content oneway">
				<form action="process.php" method="get">
					<div class="from">
						<h3>From</h3>
						<select class="cities" name="from_city" value="<?php if(isset($_GET['from_city'])) { echo htmlentities ($_GET['from_city']); } else echo '';?>">
							<option name="" value="Mostar">Mostar</option>
							<option name="" value="Dubrovnik">Dubrovnik</option>
						 </select>
					</div>
					<div class="to">
						<h3>To</h3>
						<select class="cities" name="to_city" value="<?php if(isset($_GET['to_city'])) { echo htmlentities ($_GET['to_city']); } else echo '';?>">
							<option name="" value="Dubrovnik">Dubrovnik</option>
							<option name="" value="Mostar">Mostar</option>
						 </select>
					</div>
					<div class="clear"></div>
					<div class="date">
						<div class="depart">
							<h3>Depart</h3>
							<input class="date" id="datepicker2" name="departure_date" type="text" value="mm/dd/yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
						</div>
						<div class="return">
							<!--<h3>Return</h3>-->
							<input  id="datepicker1" name="return_date" type="hidden" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
						</div>
					</div>
					<div class="class">
						<h3>Class</h3>
						<select id="w3_country1" name = "class" onchange="change_country(this.value)" class="frm-field required">
							<option name = "economy" value="Economy">Economy</option>  
							<option name = "business" value="Business">Business</option>   
							<option name = "first_class" value="First Class">First Class</option>		
						</select>

					</div>
					<div class="clear"></div>
					<div class="numofppl">
						<div class="adults">
							<h3>Adult:(12+ yrs)</h3>
							<div class="quantity"> 
								<div class="quantity-select">                           
								  <select class="age" name="count_a">
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="0">2</option>
									<option value="1">3</option>
									<option value="0">4</option>
									<option value="1">5</option>
								  </select>
								</div>
							</div>
						</div>
						<div class="child">
							<h3>Child:(2-11 yrs)</h3>
							<div class="quantity"> 
								<div class="quantity-select">                           
								  <select class="age" name="count_c">
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="0">2</option>
									<option value="1">3</option>
									<option value="0">4</option>
									<option value="1">5</option>
								  </select>
								</div>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
					<input type="submit" value="Search Flights" name = "submit">
				</form>	
			 </div>
		</div>
								
			
	<!-- end tabs and begin footer-->
    
   <?php include("inc/footer.php"); ?>