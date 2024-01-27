<?php
    session_start();
?>

<!DOCTYPE html>
<head>
  <?php include 'head.php';?>
  <?php include 'navIndex.php';?>
  <link  rel="stylesheet" type="text/css" href="./css/login.css">
  <title>Login</title>

</head>

    <body>
    <?php
            if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
                        echo "<div class='alert alert-danger text-center' role='alert'>".$_SESSION['error']."</div>";
                        unset($_SESSION['error']);
            }
        ?>
        <div class="center" style="margin-top: 12%;">
            <h2 class="text-center" style="font-weight: bold;">Benvenuto in SawSporty!</h2>
            <h2 class="text-center" style="font-weight: 300;">Effettua il login per non perderti nessun evento!</h2>
        </div>

        <div class="center" style="margin-top: 2%;">
            <form name="login"  action="action_login.php" method="post">
                <div class="text-center">    
                <input type="email" name="email" placeholder=" Email">
                </div><br>
                <div class="text-center">
                <input type="password" name="pass" placeholder=" Password">
                </div><br>
                <div class="text-center">
                <input type="submit" name="submit" value="Login">
                </div>
            </form>
        </div>

        <?php include 'scripts/script.php';?>
    </body>
</html>