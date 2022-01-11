

<?php
session_start();
unset($_SESSION['Saved_userId']);
unset($_SESSION['sid']);
session_destroy();
header("Location:index.php");
?>