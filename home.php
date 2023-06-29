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
        <title>Home</title>
        <?php include 'head.php';?>
        <?php include 'nav.php';?>
    </head>

    <body> 
    
        <p> Hello Cospito</p> 
        <form id="logout" action="logout.php" method="post">
            <input type="submit" value="Logout">
        </form>

    <?php include 'script.php';?>

    </body>

</html>