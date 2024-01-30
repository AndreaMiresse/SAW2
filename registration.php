<?php
	session_start();
	if(isset($_SESSION['user_id'])){//se sei loggato non puoi accedere
        $_SESSION['error']="Non puoi accedere alla pagina di registrazione ";
		header("Location: home.php");
		exit();
    }
	require_once 'scripts/functions.php';
	Signup();
?>