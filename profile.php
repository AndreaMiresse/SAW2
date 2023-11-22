<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header('location:login.php');
    }
    include 'scripts\connection.php';
    include 'scripts\functions.php';
    include 'scripts\script.php';
    
    $stmt=$con->prepare("SELECT * FROM user WHERE User_id= ?");
    $stmt->bind_param("i",$_SESSION['user_id']);
    $stmt->execute();
    $result=$stmt->get_result();
    $row=$result->fetch_assoc();
    $stmt->close();




?>

<!DOCTYPE html>

    <head>
        <title>Il tuo profilo</title>
        <?php include 'head.php';?>
        <?php include 'nav.php';?>
        <link  rel="stylesheet" type="text/css" href="./css/home.css">
        <link rel="stylesheet" href="./css/signup.css" type="text/css">
        
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    </head>


    <body>


        <button class="button" onclick="updateLayout()">Modifica</button>
        <form id="formUpdate" action="scripts\update.php" method="post">
                <br><div class="text-center">
                <input type="text" name="firstname" placeholder="Nome" value=<?php echo $row['Name']?> readonly><br><br>
                </div>
                <div class="text-center">
                <input type="text" name="lastname" placeholder="Cognome" value=<?php echo $row['Surname']?> readonly><br><br>
                </div>
                <div class="text-center">
                <input type="email" name="email" placeholder="Email" value=<?php echo $row['Email']?> readonly><br><br>
                </div>
                <div class="text-center">
                <input type="password" name="pass" placeholder=" Password" readonly><br><br>
                </div>
                <div class="text-center">
                <input type="password" name="confirm" placeholder=" Conferma password" readonly><br><br>
                </div>
                <div class="text-center">
                <input type="submit" name="submit" value="Salva"><br>
                </div> 
            </form>

            <script>
                function updateLayout(){
                    var form = document.getElementById("formUpdate");
                    var inputs = form.getElementsByTagName("input");
                    for (var i = 0; i < inputs.length; i++){
                        inputs[i].readOnly = false;
                    }
                    
                   
                }
            </script>
                

    </body>
         


</html>


