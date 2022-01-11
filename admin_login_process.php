<?php
 $conn = mysqli_connect("localhost", "root", "", "library");

 
 /* login user code*/
 
  if (isset($_POST['login'])) {
	  
	  $userName = $_POST['username'];
	  $password = $_POST['password'];
 
	  if ($userName != "" && $password != "") {
		  $sql = "SELECT username FROM user WHERE username = '{$userName}' AND password ='{$password}' ";
		  $checkUserId = mysqli_query($conn, $sql) or die('error');
 
		  if (mysqli_num_rows($checkUserId) > 0) {
			      session_start();
				  $_SESSION["Saved_adminId"] = $userName;
				  header("location: admin.php");
				  exit();
		  }else{
			  ?>
			  <script>
				  alert('UserName & password not matched!');
				  window.history.back();
			  </script>
			 <?php
		  }
 
	  }else{
		  ?>
			 <script>
				  alert('Fill all the details');
				  window.history.back();
			 </script>
		  <?php
	  }
 
  }
 

?>