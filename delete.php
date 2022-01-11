<?php
include 'function/functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
$stmt = $pdo->prepare('DELETE FROM book WHERE bid = ?');
$stmt->execute([$_GET['id']]);
header('Location: admin.php');
?>