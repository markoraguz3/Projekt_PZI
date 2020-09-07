<?php
$pagetitle= "Booking";
include ("connection/db.php");
include ("inc/processheader.php");

?>

 <!--end header begin tabs-->

  	 <div class = 'about'>
		<?php
 
			  $name = $_POST['name'];
              $surname = $_POST['surname'];
              $idnumber = $_POST['id_number'];
              $phonenumber = $_POST['phone_number'];
              $address = $_POST['address'];
			  $email = $_POST['email'];
			  $cardnumber = $_POST['card_number'];
			  $cvv = $_POST['cvv'];
			  
			  /* Inserting user details into the database*/
 
		$sql = "INSERT INTO users (name, surname, id_number, phone_number, address, email, card_number, cvv)
				VALUES ('$name', '$surname', '$idnumber', '$phonenumber', '$address', '$email', '$cardnumber', $cvv)";
				
				
			  /* Selecting and displaying user details back to the user */
				
			 if(mysqli_query($conn, $sql)){

   $sql = "SELECT * FROM users WHERE name = '$name' AND  surname  = '$surname'  AND address = '$address' LIMIT 1";

if($result = mysqli_query($conn, $sql)){

    if(mysqli_num_rows($result) > 0){


        while($row = mysqli_fetch_array($result)){
			
			echo "Hey " . $row['name'] . " " . $row['surname'] . ". Below are your personal and flight details. A copy has been emailed to the email adress you have provided.";
			echo "<br><br>";
			
            echo "<div class = 'book'>";
                echo "Name: " . $row['name'] . "<br>";
                echo "Surname: " . $row['surname'] . "<br>";
                echo "Nat ID: " . $row['id_number'] . "</br>";
				echo "Phone: " . $row['phone_number'] . "</br>";
				echo "Email: " . $row['email'] . "</br>";
				echo "Address: " . $row['address'] . "</br>";
            echo "</div>";

        }

    } else{

        echo "No records matching your query were found.";

    }

}

} 

				/* Selecting and displaying flight details back to the user */

	if(isset($_POST['class'])===true && isset($_POST['count_a'])===true && isset($_POST['count_c'])===true) {


	if(isset($_POST['chose_to'])===true) {
		if(isset($_POST['chose_fro'])===true) {
			$to = $_POST['chose_to'];
			$fro = $_POST['chose_fro'];
			
				$counta = $_POST['count_a'];
				$countc = $_POST['count_c'];
				$class = $_POST['class'];
				$q1 = "SELECT * FROM `flight_search` WHERE `fno`='$to'";
				$r1 = mysqli_query($conn, $q1);
				while($row1 = mysqli_fetch_assoc($r1)) {
					echo '<legend>Your flight from '.$row1['from_city'].' to '.$row1['to_city'].'</legend>';
					echo "<div class = 'book'>";
					echo 'Flight Number: '.$row1['fno'].'<br>';
					echo 'Departure Date: '.$row1['departure_date'].'<br>';
					echo 'Departure Time: '.$row1['departure_time'].'<br>';
					echo 'Arrival Time: '.$row1['arrival_time'].'<br>';
					echo 'Number of Adults: '.$counta.'<br>';
					echo 'Number of Children: '.$countc.'<br><br>';
					$eat1 = $counta * $row1['e_price'];
					echo 'Cost of '.$counta.' adult(s): '.$counta.' * $. '.$row1['e_price'].' =  $. '.$eat1.'<br>';
					$ect1 = ($countc * $row1['e_price']) * 0.75;
					echo 'Cost of '.$countc.' child: 75% of '.$countc.' * $. '.$row1['e_price'].' = $. '.$ect1.'<br>';
					$etot1 = $eat1 + $ect1;
					echo '<legend>Cost of one trip is $. '.$etot1.'</legend><hr>';
					echo "<div>";
				}

				
				$q2 = "SELECT * FROM `flight_search` WHERE `fno`='$fro'";
				$r2 = mysqli_query($conn, $q2);
				while($row2 = mysqli_fetch_assoc($r2)) {
					echo '<legend>Your flight from '.$row2['from_city'].' to '.$row2['to_city'].'</legend>';
					echo "<div class = 'book'>";
					echo 'Flight Number: '.$row2['fno'].'<br>';
					echo 'Departure Date: '.$row2['departure_date'].'<br>';
					echo 'Departure Time: '.$row2['departure_time'].'<br>';
					echo 'Arrival Time: '.$row2['arrival_time'].'<br>';
					echo 'Number of Adults: '.$counta.'<br>';
					echo 'Number of Children: '.$countc.'<br><br>';
					$eat2 = $counta * $row2['e_price'];
					echo 'Cost of '.$counta.' adult(s): '.$counta.' * $. '.$row2['e_price'].' =  $. '.$eat2.'<br>';
					$ect2 = ($countc * $row2['e_price']) * 0.75;
					echo 'Cost of '.$countc.' child: 75% of '.$countc.' * $. '.$row2['e_price'].' = $. '.$ect2.'<br>';
					$etot2 = $eat2 + $ect2;
					echo '<legend>Cost of return trip is $. '.$etot2.'</legend><hr>';
					echo "<div>";
				}
				
				
					$etotr = $etot1 + $etot2;
					echo '<legend>Total cost of both the trips is $. '.$etotr.'</legend>';
				
			} 
		
		else {
			$to = $_POST['chose_to'];
			$counta = $_POST['count_a'];
			$countc = $_POST['count_c'];
			$class = $_POST['class'];
			$q1 = "SELECT * FROM `flight_search` WHERE `fno`='$to'";
			$r1 = mysqli_query($conn, $q1);
			while($row1 = mysqli_fetch_assoc($r1)) {
				echo '<legend>Your flight from '.$row1['from_city'].' to '.$row1['to_city'].'</legend>';
				echo "<div class = 'book'>";
				echo 'Flight Number: '.$row1['fno'].'<br>';
				echo 'Departure Date: '.$row1['departure_date'].'<br>';
				echo 'Departure Time: '.$row1['departure_time'].'<br>';
				echo 'Arrival Time: '.$row1['arrival_time'].'<br>';
				echo 'Number of Adults: '.$counta.'<br>';
				echo 'Number of Children: '.$countc.'<br><br>';
				$eat1 = $counta * $row1['e_price'];
				echo 'Cost of '.$counta.' adult(s): '.$counta.' * $. '.$row1['e_price'].' =  $. '.$eat1.'<br>';
				$ect1 = ($countc * $row1['e_price']) * 0.75;
				echo 'Cost of '.$countc.' child: 75% of '.$countc.' * $. '.$row1['e_price'].' = $. '.$ect1.'<br>';
				$etot1 = $eat1 + $ect1;
				echo '<legend>Total cost of trip is $. '.$etot1.'</legend>';
				echo "<div>";
					
			}
		}
	}
}


				
		?>
	</div>


		
		
		

		

<?php include ("inc/footer.php"); ?>