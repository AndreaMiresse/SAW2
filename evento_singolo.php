<?php 
session_start();
if(isset($_SESSION['user_id'])){//se la sessione è settata fai
    $utente = $_SESSION['user_id'];
}
else{
    throw new RuntimeException("non sei loggato");
    header("Location: login.php");
}
 
require_once ('scripts\connection.php');
    
    $nome = $_GET['message'];
    $stmt =$con->prepare("SELECT * FROM evento WHERE nome_evento LIKE ? ");// possibile % da aggiungere
    $stmt->bind_param("s", $nome);
    $stmt->execute();
    $result = $stmt->get_result();//potremmo passare id evento per evitare doppioni


?>
<!DOCTYPE html>
    <head>
        <title>Home</title>
        <?php require_once 'head.php';?>
        <?php require_once 'nav.php';?>
        <?php require_once 'scripts\script.php';?>
        <link  rel="stylesheet" type="text/css" href="./css/home.css">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    </head>
    <body>
        <?php 
            if($row= $result->fetch_assoc() ){
                $iscrizione = $row['nome_evento'];
                echo "<div class='container'>";
                echo "<h3> ". $row['nome_evento'] ."</h3>";
                echo "<p> ". $row['descrizione'] ."</p>";
                echo "<p> ". $row['luogo'] ."</p>";
            }
            ?>
    </body>
</html>

