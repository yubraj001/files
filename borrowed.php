<?php
session_start();
if(!isset($_SESSION["Saved_userId"])){
    header("Location:index.php");
}
include 'function/functions.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();
        $stmt = $pdo->prepare('SELECT * FROM student WHERE username = ?');
        $stmt->execute([$_SESSION["Saved_userId"]]);
        $std = $stmt->fetch(PDO::FETCH_ASSOC);
        //$_SESSION['sid'] = $std['sid'];
// Prepare the SQL statement and get records from our books table
$stmt = $pdo->prepare('SELECT * FROM issue_book ORDER BY transaction_id');
$stmt->execute();
// Fetch the records so we can display them in our template.
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    
    <table>
        <thead>
            <tr>
                <td>#</td>
                <td>Copies Borrowed</td>
                <td>title</td>
                <td>Borrowed Date</td>
                <td>Return Date</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book): ?>
            <tr>
                <td><?=$book['transaction_id']?></td>
                <td><?=$book['no']?></td>
                <td><?=$book['title']?></td>
                <td><?=$book['b_date']?></td>
                <td><?=$book['r_date']?></td>
                <td class="actions">
                    <a href="return.php?id=<?=$book['bid']?>&tid=<?=$book['transaction_id']?>&no=<?=$book['no']?>" class="edit">Return</a>
                   
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
  </body>
</html>