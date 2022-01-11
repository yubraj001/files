<?php
session_start();
if(!isset($_SESSION["Saved_adminId"])){
    header("Location:index.php");
}
include 'function/functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
   
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    
    $isbn = isset($_POST['isbn']) ? $_POST['isbn'] : '';
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $author = isset($_POST['author']) ? $_POST['author'] : '';
    $publisher = isset($_POST['publisher']) ? $_POST['publisher'] : '';
    $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d');
    $category = isset($_POST['category']) ? $_POST['category'] : '';
    $qty = isset($_POST['no']) ? $_POST['no'] : '';
    $available = isset($_POST['no']) ? $_POST['no'] : '';
    $rate = 0;
    // Insert new record into the books table
    $stmt = $pdo->prepare('INSERT INTO book VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$id, $isbn, $title, $author, $publisher, $created, $category, $qty, $available, $rate]);
    // Output message
    $msg = 'Created Successfully!';
    header("Location:admin.php");
}
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>NCIT Libary </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="css/main2.css">
    <link rel="stylesheet" href="css/all.css"/>
  </head>
  <body>
    
    <div class="content update">
	<h2>Add a Book</h2>
    <form action="addbook.php" method="post">
        <label for="id">Book ID</label>
        <label for="isbn">ISBN</label>
        <input type="text" name="id" placeholder="26" value="auto" id="id">
        <input type="text" name="isbn" placeholder="ISBN" id="isbn">
        <label for="title">Book Title</label>
        <label for="author">Author</label>
        <input type="text" name="title" placeholder="Book Title" id="title">
        <input type="text" name="author" placeholder="Mr Jon Doe" id="author">
        <label for="publisher">Publisher</label>
        <label for="created">Date Published</label>
        <input type="text" name="publisher" placeholder="Publisher" id="publisher">
        <input type="datetime-local" name="created" value="<?=date('Y-m-d')?>" id="created">
        <label for="category">Category</label>
        <label for="qty">No of Copies</label>
        <input type="text" name="category" placeholder="category" id="category">
        <input type="number" name="no" placeholder="No of copies" id="qty">
        <input type="submit" value="Add">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>
  </body>
</html>