<?php
     session_start();
     error_reporting(0);
     require 'connect.php';
     require 'security.php';
     require 'loginDBConn.php';



     //  Get Users AdminType and record for filtering
     //$admin = $conn->query("S");

     if ($results = $conn->query("SELECT * FROM links")) {
          if ($results->num_rows) {
               while ($row = $results->fetch_object()) {
                    $records[] = $row;
               }
               $results->free();
          }
     }
     //echo '<pre>', print_r($records) ,'</pre>';
?>
<!DOCTYPE html>
<html>

<head>
     <meta charset="UTF-8">
     <link rel="stylesheet" type="text/css" href="styles.css">
     <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">
     <title>People DB</title>

</head>

<body>

     <div id="logoutBtn" class="">

          <a href="logout.php">
               <button class="btn btn-large btn-danger">Log Out</button>
          </a>

     </div>
     <div id="adminview" class="container">
          <!-- Prints out the name of the admin that has logged in. -->
          <div class="jumbotron" id="welcome">
               <?php echo "<h1>Welcome, ".$_SESSION['admin_name'].".</h1>"."<br> <h2>Your Admin Number is ".$_SESSION['usern']."</h2>"; ?>

          </div>

          <?php 
     if(!count($records)){
               echo 'No records';
     } else {
     ?>
          <div class="container">
               <table class="table table-striped">
                    <h2>Here are your links,</h2>
                    <thead>
                         <tr>
                              <th scope="col">Links</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php 
                         foreach ($records as $r) {
                         
                         if ($r->LinkType == $_SESSION['usern']) {
                         ?>
                         <tr>
                              <td>
                                   <?php 
                                   echo "<a target='_blank' href='". $r->address ."'>". $r->address."</a>"; 
                                   ?>
                              </td>

                         </tr>
                         <?php
                         }
                         
                         }
                         ?>
                    </tbody>
               </table>
               <?php 
     }
     ?>
               <hr>
          </div>

     </div>

</body>

</html>