<?php
session_start();
if(!isset($_SESSION["Saved_userId"])){
    header("Location:index.php");
}
include 'function/functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        $stmt = $pdo->prepare('SELECT * FROM book WHERE bid = ?');
        $stmt->execute([$_GET['id']]);
        $book = $stmt->fetch(PDO::FETCH_ASSOC);
        $rate = $book['rate'];
        $rate += isset($_POST['rate']) ? $_POST['rate'] : '';
        
        // Update the record
        $stmt = $pdo->prepare('UPDATE book SET rate = ? WHERE bid = ?');
        $stmt->execute([$rate, $_GET['id']]);
        header("Location: home.php");
   
} else {
    exit('No ID specified!');
}}
?>