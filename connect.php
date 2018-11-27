<?php 
     //  password required.
     $db = new mysqli('localhost', 'root', 'root', 'app');



     if ($db->connect_errno) {
          echo $db->connect_error;
          die("Unable to reach db");
     }


?>