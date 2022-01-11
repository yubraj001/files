<?php
session_start();
if(!isset($_SESSION["Saved_userId"])){
    header("Location:index.php");
}
include 'function/functions.php';
$pdo = pdo_connect_mysql();
$msg = '';

$stmt = $pdo->prepare('SELECT * FROM book WHERE bid = ?');
        $stmt->execute([$_GET['id']]);
        $book = $stmt->fetch(PDO::FETCH_ASSOC);
        $available = $book['available'];
        $available += $_GET['no'];
$stmt = $pdo->prepare('UPDATE book SET available = ? WHERE bid = ?');
        $stmt->execute([$available, $_GET['id']]);
$stmt = $pdo->prepare('DELETE FROM issue_book WHERE transaction_id = ?');
        $stmt->execute([$_GET['tid']]);

header("Location: home.php")
?>