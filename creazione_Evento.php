<?php
    session_start();
    if(isset($_SESSION['user_id'])){//se la sessione è settata fai
        $utente = $_SESSION['user_id'];
    }
    else{
        $_SESSION['error']="Accedi per vedere la pagina";
        header("Location: login.php");
        exit();
    }
    require_once 'scripts/functions.php';
    Crea_Evento();
?>