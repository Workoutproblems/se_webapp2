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
          // POSSIBLE BUG username =? $del;
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

     //  REMOVE LINK, SAME AS REMOVING AN ADMIN
     if (isset($_POST['deletelink'])) {

          $del = $_POST['deletelink'];
          $query = "DELETE FROM `links` WHERE `links`.`id` = '$del'";
          if ($conn->query($query)) {
               echo "Success, link removed.<br>";
          }
          else {
               echo "did not remove link.<br>";
          }

     }

     if (isset($_POST['addlink'])) {

          $linkaddress = $_POST['addlink'];
          $linktype = $_POST['linktype'];
          // STILL NEED A LINK TYPE...
          $query = "INSERT INTO `links` (`address`, `LinkType`) VALUES ('$linkaddress', $linktype)";
          
          if ($result = $conn->query($query)) {
               echo "New link created.<br>";
          }else {
               echo "error inserting link.<br>";
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
     <meta charset="UTF-8">
     <title>Login</title>
     <link rel="stylesheet" type="text/css" href="styles.css">
     <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">
     <title>People DB</title>

</head>

<body>


     <div id="heading" class="jumbotron">
          <h1>Welcome to the Admin Section</h1>
     </div>


     <div id="logoutBtn" class="">

          <a href="logout.php">
               <button class="btn btn-large btn-danger">Log Out</button>
          </a>

     </div>
     <?php 
     if(!count($records)){
               echo 'No records';
     } else {
     ?>
     <div class="container">

          <h3>Admins</h3>
          <table class="table table-striped">
               <thead>
                    <tr>
                         <th col="scope">Name</th>
                         <th col="scope">Pass</th>
                         <th col="scope">Type</th>
                         <th col="scope">Created</th>
                    </tr>
               </thead>
               <tbody>
                    <?php 
                         foreach ($records as $r) {
                         ?>
                    <tr>
                         <td>
                              <?php echo $r->first_name; ?>
                         </td>
                         <td>
                              <?php echo $r->last_name; ?>
                         </td>
                         <td>
                              <?php echo $r->bio; ?>
                         </td>
                         <td>
                              <?php echo $r->created; ?>
                         </td>
                         <td>
                              <?php echo $r->twitter_handel; ?>
                         </td>
                    </tr>
                    <?php 
                         }
                         ?>
               </tbody>
          </table>
     </div>

     <?php 
     }
     ?>
     <hr>



     <div class="container">
          <?php 
     if(!count($links)){
               echo 'No records';
     } else {
     ?>
          <table class="table table-striped">
               <thead>
                    <tr>
                         <th col="scope">Link ID</th>
                         <th col="scope">Links</th>
                         <th col="scope">Link Type</th>
                    </tr>
               </thead>
               <tbody>
                    <?php 
                         foreach ($links as $r) {
                         ?>
                    <tr>
                         <td>
                              <?php 
                              echo "$r->id";
                              ?>
                         </td>

                         <td>
                              <?php 
                              echo "<a target='_blank' href='". $r->address ."'>". $r->address."</a>";
                              ?>
                         </td>

                         <td>
                              <?php 
                              echo "$r->LinkType";
                              ?>
                         </td>

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
     </div>



     <form id="AdminAdd" class="form-group container" action="" method="post">
          <h2>Please enter information for the admin you wish to add.</h2>
          <div class="field">
               <label for="first_name">Insert name of Admin to add</label>
               <input type="text" name="first_name" class="form-control" id="first_name" autocomplete="off">
          </div>

          <div class="field">
               <label for="last_name">Please enter the password for the above Admin</label>
               <input type="text" name="last_name" class="form-control" id="last_name" autocomplete="off">
          </div>

          <div class="field">
               <label for="bio">Enter the Admin Type</label>
               <input class="form-control" name="bio" id="bio"></input>
          </div>

          <input id="insertBtn" class="form-control btn btn-primary" type="submit" value="Insert Admin">

          <div class="field">
               <label for="bio">Insert name of Admin to delete</label>
               <input class="form-control" type="text" name="Name" id="Name"></textarea>
          </div>
          <input id="insertBtn" class="form-control btn btn-danger" type="submit" value="Delete Admin">

     </form>

     <hr>

     <form id="LinkAdd" class="form-group container" action="" method="post">
          <h2>Please enter information for the links you wish to add.</h2>

          <div class="field">
               <label for="bio">Add Link </label>
               <input class="form-control" type="text" name="addlink" id="addlink">
               <p>(Please make sure to add https:// before the link)</p>
          </div>
          <div class="field">
               <label for="bio">Link Type</label>
               <input class="form-control" type="text" name="linktype" id="linktype">
               <p>(Determines which Admin gets which link)</p>
          </div>
          <input id="insertBtn" class="form-control btn btn-primary" type="submit" value="Add Link">

     </form>

     <form id="LinkAdd" class="form-group container" action="" method="post">


          <div class="field">
               <label for="bio">Link ID</label>
               <input class="form-control" type="text" name="deletelink" id="deletelink">
               <p>(Insert Link ID you wish to delete from above table)</p>
          </div>
          <input id="insertBtn" class="form-control btn btn-danger" type="submit" value="Delete Link">

     </form>

</body>

</html>