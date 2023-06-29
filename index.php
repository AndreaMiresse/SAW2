<?php 
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
    
<head>
    <?php include 'head.php';?>
    <title>SawCospito</title>
</head>

<body>

    <?php
        include ('navIndex.php');
    ?>

    <br>


    <div class="container">
        
        <div class="row">

            <div class="col-12 col-md-4">
                <h1>Let's play</h1>
                <p>Con Sporty puoi organizzare e partecipare ad eventi sportivi nei tuoi dintorni.
                <br><br>Inizia subito a giocare!</p>

            </div>
            
            <div class="col-12 col-md-8">
                <img src="sawIndex.png" alt="immagini di grandi sportivi" class="img-fluid mx-auto d-block">
            </div>
        </div>  

        <div class="row">
            <div class="col-12 col-md-5 order-2 order-md-1">
                <img src="sawIndex.png" alt="immagini di grandi sportivi" width="1536" height="1536">
            </div>

            <div class="col-12 col-md-7 order-1 order-md-2">
                <h1>Come loro ma nella tua community</h1>
                <p>Sei un nuovo utente? <a href="signup.php">Registrati</a> per poter accedere al sito.</p>
                <p>Sei già registrato? <a href="login.php">Accedi</a> con il tuo account.</p>
            </div>
        </div>

    </div>


    <!--<div class="container-fluid" name='description'>

        <div class="container-fluid">
            <h1>Benvenuto su SawCospito</h1>
            <p>Sei un nuovo utente? <a href="signup.php">Registrati</a> per poter accedere al sito.</p>
            <p>Sei già registrato? <a href="login.php">Accedi</a> se sei già registrato.</p>
        </div>

        <div class="container-fluid" name='img'>
            <img src="sawIndex.png" alt="saw">
        </div>

    </div>-->


<?php include 'script.php';?>


</body>
    
    
</html>

