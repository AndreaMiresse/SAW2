<?php 
session_start();
if(isset($_SESSION['user_id'])){//se la sessione è settata fai
    $utente = $_SESSION['user_id'];
    $name= $_SESSION['name'];
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



    <body> <p class="text-center" style="font-size: 50px; font-weight: bold;"> Sei pronto per la tua prossima sfida?</p>

    <div class="container" style="margin-top: 2%; padding-bottom: 2%">

        <div id="carouselExampleCaptions" class="carousel carousel-dark slide" data-bs-ride="false">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            
            <div class="carousel-inner">
                <div class="carousel-item active">
                <div class="card-group">

                    <div class="card" style="width: 22rem; height: auto">
                        <img class="card-img-top" src="seiStatoBrasilato.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Calcio</h5>
                            <p class="card-text">Che sia a 5, 7 o 11, se ami il calcio troverai un sacco di partite per dimostrare il tuo valore!</p>
                        </div>
                        </div>

                    <div class="card" style="width: 22rem; ">
                    <img class="card-img-top" src="seiStatoBrasilato.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Basket</h5>
                        <p class="card-text">Se tirare la tripla decisiva non ti desta alcuna preoccupazione, clicca e scopri le prossime partite in programma</p>
                    </div>
                    </div>

                    <div class="card" style="width: 22rem;">
                    <img class="card-img-top" src="seiStatoBrasilato.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Tennis</h5>
                        <p class="card-text">Federer vs Nadal, Borg vs McEnroe, Williams vs Sharapova, se anche tu sei alla ricerca del tuo grande rivale sei nel posto giusto</p>
                    </div>
                    </div>
                
                </div>
                </div>

                <div class="carousel-item">
                    <div class="card-group">
                    <div class="card" style="width: 22rem; height: auto">
                        <img class="card-img-top" src="seiStatoBrasilato.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Calcio</h5>
                            <p class="card-text">Che sia a 5, 7 o 11, se ami il calcio troverai un sacco di partite per dimostrare il tuo valore!</p>
                        </div>
                        </div>

                    <div class="card" style="width: 22rem; ">
                    <img class="card-img-top" src="seiStatoBrasilato.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Basket</h5>
                        <p class="card-text">Se tirare la tripla decisiva non ti desta alcuna preoccupazione, clicca e scopri le prossime partite in programma</p>
                    </div>
                    </div>

                    <div class="card" style="width: 22rem;">
                    <img class="card-img-top" src="seiStatoBrasilato.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Tennis</h5>
                        <p class="card-text">Federer vs Nadal, Borg vs McEnroe, Williams vs Sharapova, se anche tu sei alla ricerca del tuo grande rivale sei nel posto giusto</p>
                    </div>
                    </div>
                
                </div>
                </div>
                
                <div class="carousel-item">
                <div class="card-group">
                    <div class="card" style="width: 22rem; height: auto">
                        <img class="card-img-top" src="seiStatoBrasilato.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Calcio</h5>
                            <p class="card-text">Che sia a 5, 7 o 11, se ami il calcio troverai un sacco di partite per dimostrare il tuo valore!</p>
                        </div>
                        </div>

                    <div class="card" style="width: 22rem; ">
                    <img class="card-img-top" src="seiStatoBrasilato.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Basket</h5>
                        <p class="card-text">Se tirare la tripla decisiva non ti desta alcuna preoccupazione, clicca e scopri le prossime partite in programma</p>
                    </div>
                    </div>

                    <div class="card" style="width: 22rem;">
                    <img class="card-img-top" src="seiStatoBrasilato.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Tennis</h5>
                        <p class="card-text">Federer vs Nadal, Borg vs McEnroe, Williams vs Sharapova, se anche tu sei alla ricerca del tuo grande rivale sei nel posto giusto</p>
                    </div>
                    </div>
                
                </div>
                </div>

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                </div>

        </div>

        <!-- <div class="container">

        <div class="row">
                <div class="col d-flex justify-content-center">
                 <div class="card" style="width: 22rem; height: auto">
                    <img class="card-img-top" src="seiStatoBrasilato.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Calcio</h5>
                        <p class="card-text">Che sia a 5, 7 o 11, se ami il calcio troverai un sacco di partite per dimostrare il tuo valore!</p>
                    </div>
                    </div>   
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="card" style="width: 22rem; ">
                    <img class="card-img-top" src="seiStatoBrasilato.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Basket</h5>
                        <p class="card-text">Se tirare la tripla decisiva non ti desta alcuna preoccupazione, clicca e scopri le prossime partite in programma</p>
                    </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                <div class="card" style="width: 22rem;">
                    <img class="card-img-top" src="seiStatoBrasilato.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Tennis</h5>
                        <p class="card-text">Federer vs Nadal, Borg vs McEnroe, Williams vs Sharapova, se anche tu sei alla ricerca del tuo grande rivale sei nel posto giusto</p>
                    </div>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 5%; margin-bottom: 2%">
                <div class="col d-flex justify-content-center">
                 <div class="card" style="width: 22rem; height: auto">
                    <img class="card-img-top" src="seiStatoBrasilato.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Calcio</h5>
                        <p class="card-text">Che sia a 5, 7 o 11, se ami il calcio troverai un sacco di partite per dimostrare il tuo valore!</p>
                    </div>
                    </div>   
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="card" style="width: 22rem;">
                    <img class="card-img-top" src="seiStatoBrasilato.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Basket</h5>
                        <p class="card-text">Se tirare la tripla decisiva non ti desta alcuna preoccupazione, clicca e scopri le prossime partite in programma</p>
                    </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                <div class="card" style="width: 22rem;">
                    <img class="card-img-top" src="seiStatoBrasilato.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Tennis</h5>
                        <p class="card-text">Federer vs Nadal, Borg vs McEnroe, Williams vs Sharapova, se anche tu sei alla ricerca del tuo grande rivale sei nel posto giusto</p>
                    </div>
                    </div>
                </div>
            </div>
        </div> -->
        
        <?php include 'script.php';?>

    </body>

</html>