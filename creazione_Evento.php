<?php
    session_start();
    if(isset($_SESSION['user_id'])){//se la sessione è settata fai
        $utente = $_SESSION['user_id'];
    }
    else{
        throw new RuntimeException("non sei loggato");
        header("Location: login.php");
    }
    require_once 'scripts\functions.php';
    Crea_Evento();
?>