<?php 
$pagetitle= "Process";
if (isset($_GET["sec"])) {
	if ($_GET["sec"] == "select") {
		$pagetitle = "Select";
	}
}
include ("connection/db.php");
include ("inc/processheader.php");


?>

                <!--end header begin tabs-->
        <div class="col-lg-8">
          <div class="resp-tabs-container">
            <form class="form-horizontal" action="booking.php" method="POST">
            <?php 
            
            if(isset($_GET['from_city'])===true 
			  && isset($_GET['to_city'])===true
              && isset($_GET['count_a'])===true 
			  && isset($_GET['count_c'])===true 
			  && isset($_GET['class'])===true) {
              
              $from = $_GET['from_city'];
              $to = $_GET['to_city'];
              $class = $_GET['class'];
              $counta = $_GET['count_a'];
              $countc = $_GET['count_c'];
			  
			  
			  /* Flight search One Trip with booking form*/

              if(isset($_GET['departure_date'])===true && empty($_GET['return_date'])===true) {
				  
			  $departdate = $_GET['departure_date'];
			  
              echo '<h2>Flights from '.$from.' to '.$to.'</h2>';
              $query = "SELECT * FROM `flight_search` WHERE `from_city`= '$from' AND `to_city` = '$to'";
              $result = mysqli_query($conn, $query);
              if($result) {
              if(mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {?>
			  <h3>Please choose your desired flight from the list below</h3><br>
                <table class="table">
                  <thead>
                  <tr>
                    <th>Flight No</th>
					<th>Departure Date</th>
                    <th>Departure Time</th>
                    <th>Arrival Time</th>
                    <th>Price</th>
                  </tr>-
                  </thead>
                  <tbody>
                  <tr>
                   <td><input type="radio" name="chose_to" value="<?php echo $row['fno']; ?>"/><?php echo $row['fno']; ?></td>
                   <td><?php echo $row['departure_date']; ?></td>				   
                   <td><?php echo $row['departure_time']; ?></td>
                   <td><?php echo $row['arrival_time']; ?></td>
                   <td><?php echo $row['e_price']; ?></td>
				   </tr>
                </tbody>
              </table>
                <?php } ?>
              <input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
              <input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
			  		<br>
					<br>
	                <h4>Please fill in your details below and proceed to book your flight</h4>
	                <div class="form-group">
		                <div class="col-lg-12">
		                  <label class="control-label" for="focusedInput">Name: </label>
		                  <input class="form-control" name="name" id="puname">
		                </div>
		            </div>
					<div class="form-group">
		                <div class="col-lg-12">
		                  <label class="control-label" for="focusedInput">Surname: </label>
		                  <input class="form-control" name="surname" id="psuname">
		                </div>
		            </div>
					 <div class="form-group">
		                <div class="col-lg-12">
		                  <label class="control-label" for="focusedInput">ID no. : </label>
		                  <input class="form-control" name="id_number" id="puphno">
		                </div>
		            </div>
		            <div class="form-group">
		                <div class="col-lg-12">
		                  <label class="control-label" for="focusedInput">Phone: </label>
		                  <input class="form-control" name="phone_number" id="puphno">
		                </div>
		            </div>
		            <div class="form-group">
		                <div class="col-lg-12">
		                  <label class="control-label" for="focusedInput">Address: </label>
		                  <input class="form-control" name="address" id="puadd">
		                </div>
		            </div>
		            <div class="form-group">
		                <div class="col-lg-12">
		                  <label class="control-label" for="focusedInput">Email: </label>
		                  <input class="form-control" name="email" id="email">
		                </div>
		            </div>
					<div class="form-group">
		                <div class="col-lg-12">
		                  <label class="control-label" for="focusedInput">Bank Card: </label>
		                  <input class="form-control" maxlength="16" name="card_number" id="card">
		                </div>
		            </div>
					<div class="form-group">
		                <div class="col-lg-12">
		                  <label class="control-label" for="focusedInput">CVV: </label>
		                  <input class="form-control" maxlength="3" name="cvv" id="cvv">
		                </div>
		            </div>
              <center><button type="submit" id="class" name="class" value="<?php echo $class; ?>" class="btn btn-primary">Book Flights</button></center>
              <?php
            } else { echo 'No flights found';}
          }
              else {  die(mysqli_error($conn)); }
			  
          } 
		  
		  
		  /* Flight search Round Trip with booking form*/
		  
          else if(isset($_GET['return_date'])===true && isset($_GET['departure_date'])===true) {
			  $returndate = $_GET['return_date'];
			  $departdate = $_GET['departure_date'];

			  
			  echo '<h2>Flights from '.$from.' to '.$to.'</h2>';
              $query1 = "SELECT * FROM `flight_search` WHERE `from_city`= '$from' AND `to_city` = '$to'";
              $result1 = mysqli_query($conn, $query1);
              if($result1) {
              if(mysqli_num_rows($result1) > 0) {
              while($row1 = mysqli_fetch_assoc($result1)) {
                ?>
                <table class="table">
                  <thead>
                  <tr>
                    <th>Flight No</th>
					<th>Departure Date</th>
                    <th>Departure Time</th>
                    <th>Arrival Time</th>
                    <th>Price</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                   <td><input type="radio" required name="chose_to" value="<?php echo $row1['fno']; ?>"/><?php echo $row1['fno']; ?></td>
				   <td><?php echo $row1['departure_date']; ?></td>	
                   <td><?php echo $row1['departure_time']; ?></td>
                   <td><?php echo $row1['arrival_time']; ?></td>
                   <td><?php echo $row1['e_price']; ?></td>
                  </tr>
                </tbody>
                </table>
                <?php }
            } else { echo 'No flights found';}
          }
			  
			  
			  echo '<h2>Flights from '.$to.' to '.$from.'</h2>';
              $query2 = "SELECT * FROM `flight_search` WHERE `from_city`= '$to' AND `to_city` = '$from'";
              $result2 = mysqli_query($conn, $query2);
              if($result2) {
              if(mysqli_num_rows($result2) > 0) {
              while($row2 = mysqli_fetch_assoc($result2)) {
                ?>
                <table class="table">
                  <thead>
                  <tr>
                    <th>Flight No</th>
					<th>Departure Date</th>
                    <th>Departure Time</th>
                    <th>Arrival Time</th>
                    <th>Price</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                   <td><input type="radio" required name="chose_fro" value="<?php echo $row2['fno']; ?>"/><?php echo $row2['fno']; ?></td>
				   <td><?php echo $row2['departure_date']; ?></td>	
                   <td><?php echo $row2['departure_time']; ?></td>
                   <td><?php echo $row2['arrival_time']; ?></td>
                   <td><?php echo $row2['e_price']; ?></td>
                  </tr>
                </tbody>
                </table>
                <?php }?>
              <input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
              <input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
			  		<h3>If you a guest user please Register and proceed to book your ticket</h3>
					  <a href ="register.php">Register here</a>
					  <br></br>
	                <h4>Passenger Billing Details :</h4>
	                <div class="form-group">
		                <div class="col-lg-12">
		                  <label class="control-label" for="focusedInput">Name: </label>
		                  <input class="form-control" name="name" id="puname">
		                </div>
		            </div>
					<div class="form-group">
		                <div class="col-lg-12">
		                  <label class="control-label" for="focusedInput">Surname: </label>
		                  <input class="form-control" name="surname" id="psuname">
		                </div>
		            </div>
					 <div class="form-group">
		                <div class="col-lg-12">
		                  <label class="control-label" for="focusedInput"> ID no.: </label>
		                  <input class="form-control" name="id_number" id="puphno">
		                </div>
		            </div>
		            <div class="form-group">
		                <div class="col-lg-12">
		                  <label class="control-label" for="focusedInput">Phone: </label>
		                  <input class="form-control" name="phone_number" id="puphno">
		                </div>
		            </div>
		            <div class="form-group">
		                <div class="col-lg-12">
		                  <label class="control-label" for="focusedInput">Address: </label>
		                  <input class="form-control" name="address" id="puadd">
		                </div>
		            </div>
		            <div class="form-group">
		                <div class="col-lg-12">
		                  <label class="control-label" for="focusedInput">Email: </label>
		                  <input class="form-control" name="email" id="email">
		                </div>
		            </div>
					<div class="form-group">
		                <div class="col-lg-12">
		                  <label class="control-label" for="focusedInput">Bank Card: </label>
		                  <input class="form-control" maxlength="16" name="card_number" id="card">
		                </div>
		            </div>
					<div class="form-group">
		                <div class="col-lg-12">
		                  <label class="control-label" for="focusedInput">CVV :</label>
		                  <input class="form-control" maxlength="3" name="cvv" id="cvv">
		                </div>
		            </div>
              <center><button type="submit" id="class" value="<?php echo $class; ?>" name="class" class="btn btn-primary">Book Flights</button></center>
              <?php
            } else { echo 'No flights found';}
          }
              else {  die(mysql_error($conn)); }
          } 
         }
         
          else { ?>
            </form>
          </div>
        </div>
      
    <?php } ?>
				
      

<?php include ("inc/footer.php"); ?>