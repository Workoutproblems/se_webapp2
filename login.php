<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>Login</title>
   <link rel="stylesheet" type="text/css" href="styles.css">
   <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
      crossorigin="anonymous">
</head>

<body>

   <form class="form-control" action="process.php" method="POST">
      <div class="container-fluid" id="loginbox">

         <h1>Please Log in below</h1>
         <div class="container" id="logincred">
            <label id="usr">Username:</label>
            <input type="text" id="user" name="user" />

            <label id="pwd">Password:</label>
            <input type="password" id="pass" name="pass" />

            <button type="submit" class="btn btn-lg btn-primary" id="btn" value="Login">Log In</button>
         </div>

      </div>

   </form>
</body>

</html>