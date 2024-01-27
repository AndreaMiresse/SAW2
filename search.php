<?php 
session_start();
if(isset($_SESSION['user_id'])){//se la sessione è settata fai
    $utente = $_SESSION['user_id'];
}
else{
    throw new RuntimeException("non sei loggato");
    header("Location: login.php");
}
 
require_once ('scripts/connection.php');
    
    $search = $_GET['search'];
    $search = htmlspecialchars($search);
    $search = trim($search);
    $search= "%".$search."%";
    $stmt =$con->prepare("SELECT * FROM evento WHERE nome_evento LIKE ? or luogo LIKE ? or id_sport LIKE ?");// possibile % da aggiungere
    $stmt->bind_param("sss", $search, $search, $search);
    $stmt->execute();
    $result = $stmt->get_result();


?>
<!DOCTYPE html>

    <head>
        <title>Search</title>
        <?php require_once 'head.php';?>
        <?php require_once 'nav.php';?>
        <?php include 'scripts/script.php';?>
        <link  rel="stylesheet" type="text/css" href="./css/home.css">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    </head>


    <body>
    <?php 
        if($result->num_rows === 0){
            echo "<div class='alert alert-danger' role='alert'>Nessun risultato</div>";
        }
        else{
            $approvati=0;
            while($row = $result->fetch_assoc()){
                if($row['approvato'] == 1){
                $approvati=1;
                echo "<div class='card' style='width: 18rem;'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . htmlspecialchars($row['nome_evento']) . "</h5>";
                echo "<p class='card-text'>" . htmlspecialchars($row['luogo']) . "</p>";
                echo "</div>";
                echo "</div><br>";
                }
            }
            if($approvati==0){
                echo "<div class='alert alert-danger' role='alert'>Nessun risultato</div>";
            }
        }
    ?>
</body>
