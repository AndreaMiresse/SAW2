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
    require_once 'scripts/connection.php';
    $sql = "SELECT * FROM evento";
    $result= $con->query($sql);
?>
<!DOCTYPE html>

    <head>
        <title>Eventi</title>
        <?php require_once 'head.php';?>
        <?php require_once 'nav.php';?>
        <?php require_once 'scripts/script.php';?>
        <link  rel="stylesheet" type="text/css" href="./css/home.css">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    </head>
    <body>
        <?php
            $flag=0;
            echo "<div class='center' style='height: 30px'></div>";
            while($row = $result->fetch_assoc()){
                if($row['approvato']==1){
                    $flag=1;
                    $nome=$row['nome_evento'];
                    echo "<div class='center'>";
                    echo "<div class='card' style='width: 18rem;'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'><a href='evento_singolo.php?message=" . urlencode($nome) . "'>" . $row['nome_evento'] . "</a></h5>";                   
                    echo "<p class='card-text'>" . $row['luogo'] . "</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            }
            if($flag==0){
                echo "<h1>Non ci sono eventi</h1>";
            }
        ?>
    </body>
</html>