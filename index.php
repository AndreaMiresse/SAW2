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

    <br>


    <div class="container" name="indexGrid">
        
        <div class="row">

            <div class="col-12 col-md-4">
                <h1>Let's play</h1>
                <p>Con Sporty puoi organizzare e partecipare ad eventi sportivi nei tuoi dintorni.
                <br><br>Inizia subito a giocare!</p>
                </p>

            </div>
            
            <div class="col-12 col-md-8">
                <img src="seiStatoBrasilato.jpg" alt="immagini di grandi sportivi" class="img-fluid mx-auto d-block">
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

    <button type="button" class="btn btn-primary rounded-circle p-2" id="back-to-top" style="position: fixed; bottom: 20px; right: 20px; display: none; width: 50px; height: 50px; border-color: black; border-width: 2px">
    <i class="fas fa-arrow-up"></i>
    </button>
<!--Usiamo Javacript con HTML -->
<script>
    //Prendiamo il bottone
    var backToTopButton = document.getElementById("back-to-top");

    // Quando scrolla più di 20px dal top del documento, mostra il bottone
    window.onscroll = function() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            backToTopButton.style.display = "block";
        } else {
            backToTopButton.style.display = "none";
        }
    };

    // Al click torna in cima al documento
    backToTopButton.onclick = function() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    };
</script>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
    
    
</html>

