<?php
	session_start();
	if(isset($_SESSION['user_id'])){//se la sessione è settata fai
        $_SESSION['error']="Non puoi accedere alla pagina di registrazione ";
		header("Location: home.php");
		exit();
    }
	require_once 'scripts/functions.php';
	Signup();
?>