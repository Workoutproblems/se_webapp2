<?php 
     //  password required.
//     $db = new mysqli('localhost', 'root', 'root', 'app');

//Nabil
$db = new mysqli('localhost', 'user2', 'Hershey@2018', 'app');


     if ($db->connect_errno) {
          echo $db->connect_error;
          die("Unable to reach db");
     }


?>