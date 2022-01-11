<?php include_once'header1.php'?>


<?php
session_start();

include 'function/functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
   
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    // Insert new record into the books table
    $stmt = $pdo->prepare('INSERT INTO student VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$id, $name, $username, $password, $email, $phone]);
    // Output message
    $msg = 'Created Successfully!';
    header("Location:index.php");
}
?>
    <div class="content update">
	<h2></h2>
    <form action="signup.php" method="post">
        <label for="id">Student ID</label>
        <label for="name">Student Name</label>
        <input type="text" name="id" placeholder="Student ID" value="" id="id">
        <input type="text" name="name" placeholder="Student Name" id="name">
        <label for="username">Username</label>
        <label for="password">Password</label>
        <input type="text" name="username" placeholder="Username" id="username">
        <input type="password" name="password" placeholder="Password" id="password">
        <label for="email">Email</label>
        <label for="phone">Phone No.</label>
        <input type="email" name="email" placeholder="Email" id="email">
        <input type="text" name="phone" placeholder="Phone No." id="phone">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>
  </body>
</html>