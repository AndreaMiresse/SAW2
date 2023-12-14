<?php 
session_start();
if((isset($_SESSION['user_id'])) && ($_SESSION['admin']==1)){//se la sessione è settata fai
    $utente = $_SESSION['user_id'];
}
else{
    echo '<script type="text/javascript"> 
        alert("OHHH DOVE CAZZO VUOI ANDRAE CRETINO?");
        location="home.php";
    </script>';
}
    
?>
<!DOCTYPE html>

    <head>
        <title>Home</title>
        <?php require_once 'head.php';?>
        <?php require_once 'nav.php';?>
        <?php require_once 'scripts\connection.php';?>
        <?php require_once 'scripts\script.php';?>
        <link  rel="stylesheet" type="text/css" href="./css/home.css">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    </head>
    <body>
        <h2>AREA AMMINISTRATIVA Cospito libero</h2>
        <button onclick="window.location.href='Amm_Eventi.php';">
            Gestione Eventi
        </button>
        <button onclick="window.location.href='Amm_Utenti';">
            Gestione Utenti
        </button>
    </body>
</html>