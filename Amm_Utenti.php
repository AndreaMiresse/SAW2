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
    require_once ('scripts\connection.php');
    $sql = "SELECT * FROM user";
    $result= $con->query($sql);
?>
    <!DOCTYPE html>
    <head>
        <title>Home</title>
        <?php require_once 'head.php';?>
        <?php require_once 'nav.php';?>
        <?php include 'scripts\script.php';?>
        <link  rel="stylesheet" type="text/css" href="./css/home.css">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    </head>
    <body>
    <h2>AREA AMMINISTRATIVA Cospito libero</h2>
    <?php
        while($row = $result->fetch_assoc()){
            echo "<div class='card' style='width: 18rem;'>";
            echo "<div class='card-body'>";
            echo "<p class='card-title'>Nome: " .$row['Name']. "</p>";
            echo "<p class='card-text'>Cognome: " . $row['Surname']. "</p>";
            echo "<p class='card-text'>Email: " . $row['Email'] . "</p>";
            echo "</div>";
            echo "</div>";
            echo"<form action='scripts\Canc_Utenti.php' method='post'>";
            echo "<input type='hidden' name='id' value='" . $row['User_id'] . "'>";
            echo"<input type='submit' name='submit' value='Ban'>";
            echo"</form>"; 
        }
    ?>
