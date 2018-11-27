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
     <title>Login</title>
     <link rel="stylesheet" type="text/css" href="styles.css">
     <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">
     <title>People DB</title>

</head>

<body>
     <h3>People</h3>
     <?php echo $_SESSION['admin_name']."<br>".$_SESSION['usern']; ?>
     <?php 
     if(!count($records)){
               echo 'No records';
     } else {
     ?>
     <table class="table table-striped">
          <thead>
               <tr>
                    <th scope="col">Adresses</th>

               </tr>
          </thead>
          <tbody>
               <?php 
                         foreach ($records as $r) {
                         
                         if ($r->LinkType == $_SESSION['usern']) {
                         ?>
               <tr>
                    <td>
                         <?php echo $r->address; ?>
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

</body>

</html>