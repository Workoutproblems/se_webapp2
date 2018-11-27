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

     <title>People DB</title>

</head>
<body>
     <h3>People</h3>
     <?php echo $_SESSION['usern']; ?>
     <?php 
     if(!count($records)){
               echo 'No records';
     } else {
     ?>
          <table>
               <thead>
                    <tr>
                         <th>Adresses</th>

                    </tr>
               </thead>
               <tbody>
                         <?php 
                         foreach ($records as $r) {
                         
                         if ($r->LinkType == $_SESSION['usern']) {
                         ?>
                              <tr>
                                   <td><?php echo $r->address; ?></td>

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