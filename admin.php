<?php 
session_start();
if((isset($_SESSION['user_id'])) && ($_SESSION['admin']==1)){//se la sessione è settata fai
    $utente = $_SESSION['user_id'];
}
else{
    $_SESSION['error']="Non puoi accedere a questa pagina";
    if(isset($_SESSION['user_id'])){
        header("Location: home.php");
        exit();
    }
    else{
        header("Location: login.php");
        exit();
    }
}
    
?>
<!DOCTYPE html>

    <head>
        <title>Home</title>
        <?php require_once 'head.php';?>
        <?php require_once 'nav.php';?>
        <?php require_once 'scripts/connection.php';?>
        <?php require_once 'scripts/script.php';?>
        <link  rel="stylesheet" type="text/css" href="./css/home.css">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    </head>
    <body>

        <div class="center">
        <br><br><br><h2 style="margin-top: auto">AREA AMMINISTRATIVA</h2><br><br><br>
        </div>

        <div class="center">  
        <button class="button" onclick="window.location.href='Amm_Eventi.php';">
            Gestione Eventi
        </button>
        </div>

        <div class="center">
        <button class="button" onclick="window.location.href='Amm_Utenti.php';">
            Gestione Utenti
        </button>
        </div>
        
    </body>
</html>