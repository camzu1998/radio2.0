<?php
	session_start();
    unset($_SESSION['Aktyw']);

	session_unset();
	@header('Location: index.php');
?>
