<?php
session_start();
// Johnny
include_once 'loginDBConn.php';


//  Get credentials


$username = $_POST['user'];
$password = $_POST['pass'];



//  Login SQL
$query = "SELECT * FROM users WHERE username = '$username'";


if ($result = $conn->query($query)) {

     $res = $result->fetch_assoc();

      //  If IT Admin logs in, Display all links and users.
     if ($username == 'admin' && $password == $res['password']) {
           header('Location: index.php');
           die();

     }
     else if ($username == $res['username'] && $password == $res['password']) {
          
          header('Location:indexAdmins.php');
          die();
            //  Display all users
            $query = "SELECT * FROM users";

          //   if ($result = $conn->query($query)) {
                 
          //         echo 'Welcome '.$username.'<br>';

          //         while ($row = $result->fetch_assoc()) {
          //               printf("%s %s %s %s", $row["id"], $row["username"], $row['password'], $row['AdminType'].'<br>');
          //         }
          //   }


            //  Display all links.
            $query2 = "SELECT * FROM links";

            $results = $conn->query($query2);

            while($res = $results->fetch_assoc()) {

                  printf("%s %s %s", $res['id'], $res['address'], $res['LinkType'].'<br>');
            }


            //  Delete Link form and button
            ?>

            <form action="process.php" method="POST">
                  <td><input type="text" name="deleteLink"></td>
                  <input type="submit" name="Remove" value="Remove"/>
            </form>

            <?php

            if (isset($_POST['deleteLink'])) {

                  echo "Going to remove: ".$_POST['deleteLink']."<br>";
            }


 
            $result->free();
      }

     //  If regular Admins check in, display only their links
     // else if ($res['username']==$username && $res['password']==$password) {
           
     //       echo 'Welcome '.$username.'<br>';
     //       //printf('%s',$res['username'].'<br>');

     //       $type = $res['AdminType'];

     //        //  Display Admin links
     //        $query2 = "SELECT * FROM links WHERE LinkType = $type";

     //        $results = $conn->query($query2);

     //        while($res = $results->fetch_assoc()) {

     //              printf("%s", $res['address'].'<br>');
     //        }
            
     // }
      
     //  Empty input check.
      else if (empty($username) || empty($password)) {

            header('Location:login.php');
            die();
     }

     //  Incorrect input check.
     else {

          header('Location:login.php');
          die();
     }
}

?>