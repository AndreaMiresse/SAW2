<?php 
session_start();
if((isset($_SESSION['user_id'])) && ($_SESSION['admin']==1)){//se la sessione è settata fai
    $utente = $_SESSION['user_id'];
}
else{
    if(isset($_SESSION['user_id'])){
        header("Location: home.php");
        exit();
    }
    else{
        header("Location: login.php");
        exit();
    }
}
    require_once ('scripts/connection.php');
    $sql = "SELECT * FROM user";
    $result= $con->query($sql);
?>



    <!DOCTYPE html>
    <head>
        <title>Amm_utenti</title>
        <?php require_once 'head.php';?>
        <?php require_once 'nav.php';?>
        <?php include 'scripts/script.php';?>
        <link  rel="stylesheet" type="text/css" href="./css/home.css">
        <link  rel="stylesheet" type="text/css" href="./css/login.css">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    </head>
    <body>
    <div class="center" style="margin-top: 20px">
    <h2>AREA AMMINISTRATIVA</h2>
    </div>
    <?php
        if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
            echo "<div class='alert alert-danger text-center' role='alert'>".$_SESSION['error']."</div>";
            unset($_SESSION['error']);
        }
        if(isset($_SESSION['success']) && !empty($_SESSION['success'])){
            echo "<div class='alert alert-success' role='alert'>".$_SESSION['success']."</div>";
            unset($_SESSION['success']);
        }
        while($row = $result->fetch_assoc()){
            echo "<div class='center'>";
            echo "<div class='card' style='width: 18rem;'>";
            echo "<div class='card-body'>";
            echo "<p class='card-title'>Nome: " .$row['Name']. "</p>";
            echo "<p class='card-text'>Cognome: " . $row['Surname']. "</p>";
            echo "<p class='card-text'>Email: " . $row['Email'] . "</p>";
            echo "</div>";
            echo "</div>";
            echo"<form action='scripts/Canc_Utenti.php' method='post'>";
            echo "<input type='hidden' name='id' value='" . $row['User_id'] . "'>";
            echo"<input type='submit' name='submit' value='Ban'>";
            echo"</form>"; 
            echo "</div>";
        }
    ?>
