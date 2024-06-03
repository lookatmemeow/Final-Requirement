<?php 

$conn= new mysqli('localhost','u593341949_dev_tinoy','20181301Tinoy','u593341949_db_tinoy')or die("Could not connect to mysql".mysqli_error($con));
// $conn= new mysqli('localhost','541609','myMEOWandonly143','541609')or die("Could not connect to mysql".mysqli_error($con));
// $conn= new mysqli('localhost','u593341949_dev_tinoy','0181301Tinoy','593341949_db_tinoy')or die("Could not connect to mysql".mysqli_error($con));

// $servername = "localhost";
// $username = "u593341949_dev_tinoy";
// $password = "20181301Tinoy";
// $dbname = "u593341949_db_tinoy";


$conn2;
try {
    $conn2 = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
