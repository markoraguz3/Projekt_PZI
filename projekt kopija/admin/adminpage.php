<div class="header-box">
    <h2 style="color:white;"><p style="position:relative; top:20px;">Welcome admin</p></h2>
    <button style="float:right; color:white;"><a href="../index.php">Home</a></button>
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col">
    <table class="admin-tab">
 <h2>Users who already booked flight!</h2>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flight";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT u_id, name, surname, email, phone_number, address FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Name</th><th>Surname</th><th>Email</th><th>Phone number</th><th>Address</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["u_id"]. 
             "</td><td>" . $row["name"]. 
             "</td><td>" . $row["surname"]. 
             "</td><td>" . $row["email"]. 
             "</td><td>" . $row["phone_number"].
             "</td><td>" . $row["address"].
             "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>



</body>
</html>

</body>
</html>

