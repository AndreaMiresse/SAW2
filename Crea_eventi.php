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
        <?php require_once 'scripts\connection.php';?>
        <?php require_once 'scripts\script.php';?>
        <link  rel="stylesheet" type="text/css" href="./css/home.css">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    </head>

    <body>
    <h2>Crea il tuo evento</h2>
    <form action="creazione_Evento.php"  method="post">
        <div class="text-center">    
                <input type="text" name="nome_evento" placeholder="Nome evento">
                </div><br>
                <div class="text-center">
                <input type="text" name="luogo" placeholder="Luogo">
                </div><br>
                <div class="text-center">
                <input type="text-center" name="n_par_max" placeholder="Numero partecipanti">
                <div class="text-center"><br>

                <label for="id_sport">Scegli lo sport:</label>
                <select id="id_sport" name="id_sport" >
                <?php
                    $sql = "SELECT id,nome FROM sport";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        echo '<option value="" selected>...</option>';
                        while($row = $result->fetch_assoc()) {
                            echo '<option value="'.$row["id"].'">'.$row["nome"].'</option>';
                        }
                    } else {
                    echo "0 results";
                    }
                    $con->close();
                ?>
                
                </select>
                </div><br>
                <div class="text-center">
                <label for="description">Description:</label>
                <textarea id="descrizione" name="descrizione" rows="4" cols="50" maxlenght="150"></textarea>
                </div><br>
                <div class="text-center">
                    
                <input type="submit" name="submit" value="Crea evento">
                </div>
    </form>

    </body>