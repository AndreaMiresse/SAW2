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
    
?>
<!DOCTYPE html>

    <head>
        <title>Home</title>
        <?php require_once 'head.php';?>
        <?php require_once 'nav.php';?>
        <?php require_once 'scripts/script.php';?>
        <link  rel="stylesheet" type="text/css" href="./css/home.css">
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
    <p class="text-center" style="font-size: 50px; font-weight: bold; margin-bottom: 0px; margin-top: 0px;"> Sei pronto per la tua prossima sfida?</p>
    

    <div id="carousel" class="container" style="margin-top: 0px; padding-bottom: 5px">

        <div id="carouselExampleCaptions" class="carousel carousel-dark slide" data-bs-ride="false">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            
            <div class="carousel-inner">
                <div class="carousel-item active">
                <div class="card-group">

                    <div class="card text-center" style="width: 22rem; height: auto">
                        <img class="card-img-top" src="media/calcio.jpg" alt="Card image cap">
                        <div class="card-body">
                        <button onclick="window.location='search.php?search=1'" style="width: -webkit-fill-available; border: 0; background-color: whitesmoke"><div class="icon"><span class="material-symbols-outlined">sports_soccer</span></div></button>
                            <h5 class="card-title">Calcio</h5>
                            <p class="card-text">Che sia a 5, 7 o 11, se ami il calcio troverai un sacco di partite per dimostrare il tuo valore!</p>
                        </div>
                        </div>

                    <div class="card text-center" style="width: 22rem; ">
                    <img class="card-img-top" src="media/basket.jpg" alt="Card image cap">
                    <div class="card-body">
                        <button onclick="window.location='search.php?search=3'" style="width: -webkit-fill-available; border: 0; background-color: whitesmoke"><div class="icon"><span class="material-symbols-outlined">sports_basketball</span></div></button>
                        <h5 class="card-title">Basket</h5>
                        <p class="card-text">Se tirare la tripla decisiva non ti desta alcuna preoccupazione, clicca e scopri le prossime partite in programma</p>
                    </div>
                    </div>

                    <div class="card text-center" style="width: 22rem;">
                    <img class="card-img-top" src="media/tennis.jpeg" alt="Card image cap">
                    <div class="card-body">
                    <button onclick="window.location='search.php?search=2'" style="width: -webkit-fill-available; border: 0; background-color: whitesmoke"><div class="icon"><span class="material-symbols-outlined">sports_tennis</span></div></button>
                        <h5 class="card-title">Tennis</h5>
                        <p class="card-text">Federer vs Nadal, Borg vs McEnroe, Williams vs Sharapova, se anche tu sei alla ricerca del tuo grande rivale sei nel posto giusto</p>
                                            </div>
                                            </div>
                                        
                                        </div>
                                        </div>


                                        <div class="carousel-item">
                                        <div class="card-group">
                                        <div class="card text-center" style="width: 22rem; height: auto">
                                                <img class="card-img-top" src="media/swimming.webp" alt="Card image cap">
                                                <div class="card-body">
                                                <button onclick="window.location='search.php?search=4'" style="width: -webkit-fill-available; border: 0; background-color: whitesmoke"><div class="icon"><span class="material-symbols-outlined">sports_soccer</span></div></button>
                                                    <h5 class="card-title">Nuoto</h5>
                                                    <p class="card-text">Che sia a 5, 7 o 11, se ami il calcio troverai un sacco di partite per dimostrare il tuo valore!</p>
                                                </div>
                                                </div>

                                            <div class="card text-center" style="width: 22rem; ">
                                            <img class="card-img-top" src="media/pingpongsport.avif" alt="Card image cap">
                                            <div class="card-body">
                                                <button onclick="window.location='search.php?search=5'" style="width: -webkit-fill-available; border: 0; background-color: whitesmoke"><div class="icon"><span class="material-symbols-outlined">sports_basketball</span></div></button>
                                                <h5 class="card-title">Ping Pong</h5>
                                                <p class="card-text">Se tirare la tripla decisiva non ti desta alcuna preoccupazione, clicca e scopri le prossime partite in programma</p>
                                            </div>
                                            </div>

                                            <div class="card text-center" style="width: 22rem;">
                                            <img class="card-img-top" src="media/baseball.jpg" alt="Card image cap">
                                            <div class="card-body">
                                            <button onclick="window.location='search.php?search=6'" style="width: -webkit-fill-available; border: 0; background-color: whitesmoke"><div class="icon"><span class="material-symbols-outlined">sports_tennis</span></div></button>
                                                <h5 class="card-title">Baseball</h5>
                                                <p class="card-text">Se ti emoziona la tensione di una partita dei New York Yankees e l'abilità di battere di Babe Ruth, non perdere le prossime partite di baseball. Clicca qui per saperne di più.</p>
                                            </div>
                                            </div>
                                        
                                        </div>
                                        </div>

                                        <div class="carousel-item">
                                        <div class="card-group">
                                        <div class="card text-center" style="width: 22rem; height: auto">
                                                <img class="card-img-top" src="media/rugby.webp" alt="Card image cap">
                                                <div class="card-body">
                                                <button onclick="window.location='search.php?search=7'" style="width: -webkit-fill-available; border: 0; background-color: whitesmoke"><div class="icon"><span class="material-symbols-outlined">sports_soccer</span></div></button>
                                                    <h5 class="card-title">Rugby</h5>
                                                    <p class="card-text">Se ti piace la grinta dei All Blacks e sogni di partecipare al Sei Nazioni, scopri i prossimi incontri di rugby qui.</p>
                                                </div>
                                                </div>

                                            <div class="card text-center" style="width: 22rem; ">
                                            <img class="card-img-top" src="media/volleyball.webp" alt="Card image cap">
                                            <div class="card-body">
                                                <button onclick="window.location='search.php?search=8'" style="width: -webkit-fill-available; border: 0; background-color: whitesmoke"><div class="icon"><span class="material-symbols-outlined">sports_basketball</span></div></button>
                                                <h5 class="card-title">Pallavolo</h5>
                                                <p class="card-text">Se ti ispira la potenza di Ivan Zaytsev e il talento di Paolo Egonu, scopri le prossime partite di pallavolo qui.</p>
                                            </div>
                                            </div>

                                            <div class="card text-center" style="width: 22rem;">
                                            <img class="card-img-top" src="media/golf.jpg" alt="Card image cap">
                                            <div class="card-body">
                                            <button onclick="window.location='search.php?search=9'" style="width: -webkit-fill-available; border: 0; background-color: whitesmoke"><div class="icon"><span class="material-symbols-outlined">sports_tennis</span></div></button>
                                                <h5 class="card-title">Golf</h5>
                                                <p class="card-text">Se ammiri la precisione di Tiger Woods e sogni di giocare nel Masters, clicca qui per scoprire i prossimi tornei di golf in programma.</p>
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

                                

                                <div class="center">
                                <button type="button" class="button" onclick="window.location ='eventi.php'">Vedi tutti gli eventi</button>
                                </div>
                                <p class="text-left" style="font-size: 50px; font-weight: bold; margin-bottom: 0px; margin-top: 1rem; margin-left: 1rem;">Ti senti propositivo?</p>

                                <div class="container" style="padding-bottom: 2%; margin-left: 20px; margin-right: 20px;">
                                    <div class="row">
                                        <div class="col-4">
                                            <p style="font-size: 22px; font-weight: medium; margin-bottom: 0px; margin-top: 1rem; margin-left: 1rem;">Non trovi quello che cerchi?<br>O semplicemente vuoi organizzarti a tuo modo? <br>Crea un evento,invita i tuoi amici e preparati a trovarne di nuovi!</p>
                                            <div class="center">
                                            <button type="button" class="button" onclick="window.location ='Crea_eventi.php'">Crea un evento</button>
                                            </div>
                                        </div>

                                        
                                        <div class="col-8">
                                            <img src="seiStatoBrasilato.jpg" alt="" style="height: 50%; width: 50%; height: auto; margin-top: 0px; margin-bottom: 0px;">
                                        </div> 
                                            
                                        
                                    </div>
                                </div>


                                

                            </body>

                        </html>
