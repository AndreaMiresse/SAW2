<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header('location:login.php');
    }
    include 'connection.php';
    $stmt=$con->prepare("SELECT * FROM user WHERE User_id= ?");
    $stmt->bind_param("i",$_SESSION['user_id']);
    $stmt->execute();
    $result=$stmt->get_result();
    $row=$result->fetch_assoc();
?>

<!DOCTYPE html>

    <head>
        <title>Home</title>
        <?php include 'head.php';?>
        <?php include 'nav.php';?>
        <link  rel="stylesheet" type="text/css" href="./css/home.css">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    </head>


    <body>

        <form action="registration.php" method="post"> <!-- bisogna usare quello fornito dalla prof -->
                <br><div class="text-center">
                <input type="text" name="firstname" placeholder=<?php echo $row['Name']?>><br><br>
                </div>
                <div class="text-center">
                <input type="text" name="lastname" placeholder=<?php echo $row['Surname']?>><br><br>
                </div>
                <div class="text-center">
                <input type="email" name="email" placeholder=<?php echo $row['Email']?>><br><br>
                </div>
                <div class="text-center">
                <input type="password" name="pass" placeholder=" Password"><br><br>
                </div>
                <div class="text-center">
                <input type="password" name="confirm" placeholder=" Conferma password"><br><br>
                </div>
                <div class="text-center">
                <input type="submit" name="submit" value="Salva"><br>
                </div>
            </form>

    </body>
         


</html>


