<?php 
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
    
<head>
    <?php include 'head.php';?>
</head>

<body>

    <?php
        include ('navIndex.php');
    ?>
    <div class="container-fluid" name='describition'>
    
    <br>
    <br>
    <br>
    <div class="container-fluid" name='description'>

        <h1>Benvenuto su SawCospito</h1>
        <p>Sei un nuovo utente? <a href="signup.php">Registrati</a> per poter accedere al sito.</p>
        <p>Sei già registrato? <a href="login.php">Accedi</a> se sei già registrato.</p>

    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
    
    
</html>

