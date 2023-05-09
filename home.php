<?php 
session_start();
if(isset($_SESSION['user_id'])){//se la sessione è settata fai
    $utente = $_SESSION['user_id'];
    echo $utente;
}
else{
    throw new RuntimeException("non sei loggato");
    header("Location: login.php");
}
    
?>
<!DOCTYPE html>
    <head>
        
        <title>Home</title>
        <link rel="stylesheet" href="style.css">
    </head>
<body> <p> Hello Cospito</p> </body>

</html>