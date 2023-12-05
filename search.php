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
    
    $search = $_GET['search'];
    $search = htmlspecialchars($search);
    $search = trim($search);
    $search= "%".$search."%";
    $stmt =$con->prepare("SELECT * FROM evento WHERE nome_evento LIKE ? or luogo LIKE ?");// possibile % da aggiungere
    $stmt->bind_param("ss", $search, $search);
    $stmt->execute();
    $result = $stmt->get_result();


    




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
    <?php 
        if($result->num_rows === 0){
            echo "Nessun risultato";
        }
        else{
            $row = $result->fetch_assoc();
            echo $row['luogo'];
        }
    ?>





</body>