<?php
session_start();

setcookie('username', true, time() - 3600, '/');

unset($_SESSION['name']);
unset($_SESSION['username']);
header('Location: ../index.php');
exit(0);
?>
