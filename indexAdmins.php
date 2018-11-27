<?php 
     error_reporting(0);
     require 'connect.php';
     require 'security.php';
     require 'loginDBConn.php';



     if ($results = $db->query("SELECT * FROM people")) {
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
     <?php 
     if(!count($records)){
               echo 'No records';
     } else {
     ?>
          <table>
               <thead>
                    <tr>
                         <th>Name</th>
                         <th>Pass</th>
                         <th>Type</th>
                         <th>Created</th>
                    </tr>
               </thead>
               <tbody>
                         <?php 
                         foreach ($records as $r) {
                         ?>
                              <tr>
                                   <td><?php echo $r->first_name; ?></td>
                                   <td><?php echo $r->last_name; ?></td>
                                   <td><?php echo $r->bio; ?></td>
                                   <td><?php echo $r->created; ?></td>
                                   <td><?php echo $r->twitter_handel; ?></td>
                              </tr>
                         <?php 
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