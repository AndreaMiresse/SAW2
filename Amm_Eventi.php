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
    require_once 'scripts/connection.php';
    $sql = "SELECT * FROM evento";
    $result= $con->query($sql);
?>

<!DOCTYPE html>

<head>
    <title>Amm_Eventi</title>
    <?php require_once 'head.php';?>
    <?php require_once 'nav.php';?>
    <?php include 'scripts/script.php';?>
    <link  rel="stylesheet" type="text/css" href="./css/home.css">
    <link  rel="stylesheet" type="text/css" href="./css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>
<body>
   <?php
   if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
        echo "<div class='alert alert-danger text-center' role='alert'>".$_SESSION['error']."</div>";
        unset($_SESSION['error']);
    }
    if(isset($_SESSION['success']) && !empty($_SESSION['success'])){
        echo "<div class='alert alert-success' role='alert'>".$_SESSION['success']."</div>";
        unset($_SESSION['success']);
    }
    ?> 
    <div class="center" style="margin-top: 20px">
    <h2>AREA AMMINISTRATIVA</h2>
    </div>
    <?php
        echo "<div class='center'>";
        echo "<h5>Eventi da approvare</h5><br>";
        echo"</div>";
            $flag=0;
            while($row = $result->fetch_assoc()){
                if($row['approvato']==0){
                    $flag=1;
                    echo "<div class='center'>";
                    echo "<div class='card' style='width: 18rem;'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'><a href='evento_singolo.php?message=" . urlencode($row['nome_evento']) . "'>" . $row['nome_evento'] . "</a></h5>";   
                    echo "<p class='card-text'>" . $row['luogo']. "</p>";
                    echo "</div>";
                    echo "</div>";
                    echo"<form action='scripts/Up_Eventi.php' method='post'>";
                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                    echo"<input type='submit' name='submit' value='Approva'>";
                    echo"</form>";
                    echo"</div>";
                }    
            }
            if($flag==0){
                echo "<div class='center'>";
                echo "<h5>Non ci sono eventi da approvare</h5>";
                echo"</div>";
            }
            echo "<div class='center'>";
            echo "<h5>Eventi approvati</h5><br>";
            echo"</div>";
            $sql = "SELECT * FROM evento";
            $result= $con->query($sql);
            $con->close();
            $flag=0;
            while($row = $result->fetch_assoc()){
                if($row['approvato']==1){
                    $flag=1;
                    echo "<div class='center'>";
                    echo "<div class='card' style='width: 18rem;'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'><a href='evento_singolo.php?message=" . urlencode($row['nome_evento']) . "'>" . $row['nome_evento'] . "</a></h5>";   
                    echo "<p class='card-text'>" . htmlspecialchars($row['luogo']) . "</p>";
                    echo "</div>";
                    echo "</div>";
                    echo"<form action='scripts/Canc_Eventi.php' method='post'>";
                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                    echo"<input type='submit' name='submit' value='Elimina'>";
                    echo"</form>";
                    //bottone per newsletter
                    echo"<form action='scripts/email.php' method='post'>";
                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                    echo "<input type='hidden' name='nome_evento' value='" . $row['nome_evento'] . "'>";
                    echo"<input type='submit' name='submit' value='Invia mail'>";
                    echo"</form>";
                    echo"</div>";

                }    
            }
            if($flag==0){
                echo "<div class='center'>";
                echo "<h5>Non ci sono eventi approvati</h5>";
                echo"</div>";
            }
                
    ?>
        

</body>
</html>