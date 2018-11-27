<?php 
     error_reporting(0);
     require 'connect.php';
     require 'security.php';
     require 'loginDBConn.php';

     $records = array();

     if (!empty($_POST)) {
          if (isset($_POST['first_name'], $_POST['last_name'], $_POST['bio'])) {
               $first_name = trim($_POST['first_name']);
               $last_name = trim($_POST['last_name']);
               $bio = trim($_POST['bio']);


               //  INSERT 2nd DB
               // Add a user.
               if(!empty($first_name) && !empty($last_name) && !empty($bio))
               {
                    $query = "INSERT INTO `users` (`username`, `password`, `AdminType`) VALUES ('$first_name', '$last_name', '$bio')";
                    if ($result = $conn->query($query)) {
                         echo "New record created in users db<br>";
                    }else {
                         echo "error inserting in users db<br>";
                    }
               }




               if (!empty($first_name) && !empty($last_name) && !empty($bio)) {
                    $insert = $db->prepare("INSERT INTO `people` (`first_name`, `last_name`, `bio`, `created`) VALUES(?,?,?,NOW())");

                    $insert->bind_param('sss', $first_name, $last_name, $bio);

                    if ($insert->execute()) {
                         header('Location: index.php');
                         die();
                    }
               }
          }

     }

     if (isset($_POST['Name'])) {

     //  Delete a user 2nd DB.
     $del = $_POST['Name'];
      $query = "DELETE FROM `users` WHERE `users`.`username`='$del'";
      if ($conn->query($query)) {
           echo "Success deletion from users db<br>";
      }else {
           echo "did not delete from users db<br>";
      }


          $name = $_POST['Name'];
          $query = "DELETE FROM `people` WHERE `people`.`first_name`='$name'";
          if ($db->query($query)) {
               echo "Success deletion<br>";
          }else {
               echo "did not delete<br>";
          }
     }


     if ($results = $db->query("SELECT * FROM people")) {
          if ($results->num_rows) {
               while ($row = $results->fetch_object()) {
                    $records[] = $row;
               }
               $results->free();
          }
     }
     //echo '<pre>', print_r($records) ,'</pre>';
     if ($results = $conn->query("SELECT * FROM links")) {
          if ($results->num_rows) {
               while ($row = $results->fetch_object()) {
                    $links[] = $row;
               }
               $results->free();
          }
     }
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




     <h3>Links</h3>
     <?php 
     if(!count($links)){
               echo 'No records';
     } else {
     ?>
          <table>
               <thead>
                    <tr>
                         <th>Links</th>

                    </tr>
               </thead>
               <tbody>
                         <?php 
                         foreach ($links as $r) {
                         ?>
                              <tr>
                                   <td><?php echo $r->address; ?></td>

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











     <form action="" method="post">

          <div class="field">
               <label for="first_name">Name</label>
               <input type="text" name="first_name" id="first_name" autocomplete="off">
          </div>

          <div class="field">
               <label for="last_name">Pass</label>
               <input type="text" name="last_name" id="last_name" autocomplete="off">
          </div>

          <div class="field">
               <label for="bio">Type</label>
               <textarea name="bio" id="bio"></textarea>
          </div>

          <input type="submit" value="Insert Admin">

          <div class="field">
               <label for="bio">Name</label>
               <input type="text" name="Name" id="Name"></textarea>
          </div>
          <input type="submit" value="Delete Admin">

     </form>
</body>
</html>