<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Login</title>
   <link rel="stylesheet" type="text/css" href="styles.css">
   <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
      crossorigin="anonymous">
</head>

<body>

   <div class="container-fluid" id="twosided">
      <div class="container" id="left">
         <div class="jumbotron" id="cname">
            <h1>MauveHouse Marketing Services</h1>
         </div>
      </div>

      <div class="container" id="loginbox">

         <form class="form-group" action="process.php" method="POST">
            <h2>Please Log in below</h2>
            <div class="container" id="logincred">
               <label id="usr">Username:</label>
               <input class="form-control" type="text" id="user" name="user" />

               <label id="pwd">Password:</label>
               <input class="form-control" type="password" id="pass" name="pass" />

               <button type="submit" class="btn btn-lg btn-primary" id="btn" value="Login">Log In</button>
            </div>
         </form>
      </div>
   </div>

</body>

</html>