<?php 
session_start();
if(isset($_SESSION['user_id'])){//se la sessione è settata fai
    $utente = $_SESSION['user_id'];
}
else{
    throw new RuntimeException("non sei loggato");
    header("Location: login.php");
}
?>

<!DOCTYPE html>

    <head>
        <title>Search</title>
        <?php require_once 'head.php';?>
        <?php require_once 'nav.php';?>
        <link  rel="stylesheet" type="text/css" href="./css/home.css">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    </head>

    <body>
    <h2>Crea il tuo evento</h2>
    <form action="stocazzo.php"  method="post">
    </form>

    </body>