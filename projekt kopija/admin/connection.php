<?php 
  
$conn = ""; 
   
try { 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "flight";
     
   
    $conn = new PDO( 
        "mysql:host=$servername; dbname=flight", 
        $username, $password
    ); 
      
   $conn->setAttribute(PDO::ATTR_ERRMODE, 
                    PDO::ERRMODE_EXCEPTION); 
} 
catch(PDOException $e) { 
    echo "Connection failed: " . $e->getMessage(); 
} 
  
?> 