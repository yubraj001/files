<?php include_once'header1.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/login.css">
    <title>NCIT Libary</title>
</head>
<body>


<div class="login">
  <h2 class="active"> sign in Admin</h2>

  
  <form method="post" action="admin_login_process.php">
<input type="text" class="text" name="username">
     <span>username</span>

    <br>
    
    <br>

    <input type="password" class="text" name="password">
    <span>password</span>
    <br>

    
    
    <input type="submit" name="login" value="Login" class="signin">
      


    <hr>

    
  </form>

</div>
</body>
</html>
