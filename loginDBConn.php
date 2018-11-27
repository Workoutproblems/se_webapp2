<?php
//$conn = new mysqli('localhost', 'root', 'root', 'login');

// Nabil
$conn = new mysqli('localhost', 'user2', 'Hershey@2018', 'login');


//  DB connection check.
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}
else {
     echo 'connection successful<br>';
}
?>