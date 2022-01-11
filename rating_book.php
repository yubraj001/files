<?php
session_start();
if(!isset($_SESSION["Saved_userId"])){
    header("Location:index.php");
}
$id=$_GET['id'];
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>NCIT Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/all.css"/>
  </head>
  <body>
    <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">NCIT Library</label>
      <ul>
      <li><a class="active" href="home.php">Home</a></li>
        <li><a href="rating.php">Rate a Book</a></li>
        <li><a href="borrowed.php">Borrowed</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
    <div class="content read">
    <form action="process_rating.php?id=<?=$id?>" method="post">
        
        <label for="rate">Give Rating:</label>
        <select name="rate" id="rate" style="width:200px; padding:10px; font:14px;">
        <option value="">--- Choose a rating ---</option>
            <option value="1">Positive</option>
            <option value="0">Negative</option>
        </select>
        <input type="submit" value="Submit" style="width:80px; padding:10px; font:14px; background:#3f69a8; border:none; cursor: pointer; color:#ffffff;">
    </form>
    </div>
  </body>
</html>