<?php
	session_start();
    unset($_SESSION['AdminLogin']);
	session_unset();
	@header('Location: index.php');
?>
