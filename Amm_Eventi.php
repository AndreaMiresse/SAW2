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
    $sql = "SELECT * FROM evento";
    $result= $con->query($sql);
    $con->close();
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
        echo "<h5>Eventi da approvare</h5><br>";
            $flag=0;
            while($row = $result->fetch_assoc()){
                if($row['approvato']==0){
                    $flag=1;
                    echo "<div class='card' style='width: 18rem;'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>" . htmlspecialchars($row['nome_evento']) . "</h5>";
                    echo "<p class='card-text'>" . htmlspecialchars($row['luogo']) . "</p>";
                    echo "<p class='card-text'>" . htmlspecialchars($row['id']) . "</p>";
                    echo "</div>";
                    echo "</div>";
                    echo"<form action='scripts\Up_Eventi.php' method='post'>";
                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                    echo"<input type='submit' name='submit' value='Approva'>";
                    echo"</form>"; 
                }    
            }
            if($flag==0){
                echo "<h5>Non ci sono eventi da approvare</h5>";
            }
                
    ?>
        

</body>
</html>