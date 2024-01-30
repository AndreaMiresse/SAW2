<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        $_SESSION['error']="Devi prima accedere ";
        header('location:login.php');
        exit();
    }
    require_once 'scripts/connection.php';
    require_once 'scripts/functions.php';
    require_once 'scripts/script.php';
    
    $stmt=$con->prepare("SELECT * FROM user WHERE User_id= ?");
    $stmt->bind_param("i",$_SESSION['user_id']);
    $stmt->execute();
    $result=$stmt->get_result();
    $row=$result->fetch_assoc();
    $_SESSION['email']=$row['Email'];
    $stmt->close();
    $con->close();




?>

<!DOCTYPE html>

    <head>
        <title>Il tuo profilo</title>
        <?php require_once 'head.php';?>
        <?php require_once 'nav.php';?>
        <?php require_once 'scripts/script.php';?>
        <link  rel="stylesheet" type="text/css" href="./css/home.css">
        <link rel="stylesheet" href="./css/signup.css" type="text/css">
        
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
            <div class="text-center" style="margin-top: 20px">
            <button class="button" onclick="updateLayout()">Modifica</button>
            </div>
            <form id="formUpdate" action="update_profile.php" method="post">
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


