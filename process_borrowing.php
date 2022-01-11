<?php
session_start();
if(!isset($_SESSION["Saved_userId"])){
    header("Location:index.php");
}
include 'function/functions.php';
$pdo = pdo_connect_mysql();
$msg = '';

if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        $stmt = $pdo->prepare('SELECT * FROM book WHERE bid = ?');
        $stmt->execute([$_GET['id']]);
        $book = $stmt->fetch(PDO::FETCH_ASSOC);
        $available = $book['available'];
        $title = $book['title'];
        $borrowed = isset($_POST['borrow']) ? $_POST['borrow'] : '';
        $available -= isset($_POST['borrow']) ? $_POST['borrow'] : '';
        
        // Update the record
        $stmt = $pdo->prepare('UPDATE book SET available = ? WHERE bid = ?');
        $stmt->execute([$available, $_GET['id']]);
        
        $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
        $no = $borrowed;
        $sid = $_SESSION['sid'];
        $bid = $_GET['id'];
        $b_date = date('Y-m-d');
        $rdat = $_POST['day'];
        $r_date = date('Y-m-d',strtotime("+$rdat day"));
        $stmt = $pdo->prepare('INSERT INTO issue_book VALUES (?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute([$id, $no, $sid, $bid, $title, $b_date, $r_date]);
        header("Location: home.php");
   
} else {
    exit('No ID specified!');
}}
?>