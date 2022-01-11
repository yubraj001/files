<?php include_once'header.php'?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

div.main{
  position: relative;
  height: 60%;
  width: 500px;
  margin: auto;
  padding: 60px 60px;
}
input[type=text], select, textarea {
  width: 100%;
  padding: 5px;
  border: 1px solid #ccc;
  border-radius: 4px;
  background-color: transparent;
  color: white;
  box-sizing: border-box;

  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: transparent;
  padding: 20px;
}
</style>
</head>
<body>
<div class="main">

<h3>Contact US</h3>

<div class="container">
  <form action="/action_page.php">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

    <label for="email">E-mail</label>
    <input type="text" id="email" name="E-mail" placeholder="Your E-mail address..">
    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:135px"></textarea>

    <input type="submit" value="Submit">
  </form>
</div>
</div>

</body>
</html>
