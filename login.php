<?php
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST"){// se la richiesta è post vai avanti
        ValidateLogin();
        require_once ('scripts/connection.php');
        $stmt = $con->prepare("SELECT * FROM user where Email=? "); // preparo la query
        $stmt->bind_param("s", $_POST['email']); // passo ai parametri i valori
        $stmt->execute(); 
        $result = $stmt->get_result();
        if($result->num_rows === 0) {
            echo "email errata";
        }
        else{
            $row=$result->fetch_assoc();
            $hash = $row["Pass"];
            if(!password_verify($_POST['pass'], $hash)){
                echo"<div class='alert alert-danger' role='alert'>Email o password errata</div>";
            }
            else{
                if($row['admin']==1){
                    //login admin
                    $_SESSION['user_id']= $row['User_id'];
                    $_SESSION['name']=$row['Name'];
                    $_SESSION['admin']=$row['admin'];
                    $_SESSION['email']=$row['Email'];
                    header("Location: admin.php");
                }else{
                    //login user
                    $_SESSION['user_id']= $row['User_id'];
                    $_SESSION['name']=$row['Name'];
                    $_SESSION['email']=$row['Email'];
                    header("Location: home.php");
                }
               
            }
        }
    
    }

    function ValidateLogin() : void{

        if((empty($_POST['email'])) || (empty($_POST['pass']))){
            throw new RuntimeException("un campo è vuoto");
        }
        else{
            $_POST['email'] = trim($_POST['email']);
            $_POST['pass'] = trim($_POST['pass']);
            $_POST['email'] = htmlspecialchars($_POST['email']);
            $_POST['pass'] = htmlspecialchars($_POST['pass']);
        }
    }
   
?>
<script>
    function validateForm() {
        var myform=document.getElementById("login");
        for(i=0;i<myform.elements.lenght;i++){
            if (!strValue(myform.element[i].value)) {
            alert("Tutti i campi devono essere riempiti");
            return false;
        }
        }
    }
</script>
<!DOCTYPE html>
<head>
  <?php include 'head.php';?>
  <?php include 'navIndex.php';?>
  <link  rel="stylesheet" type="text/css" href="./css/login.css">
  <title>Login</title>

</head>

    <body>
        <div class="center" style="margin-top: 12%;">
            <h2 class="text-center" style="font-weight: bold;">Benvenuto in SawSporty!</h2>
            <h2 class="text-center" style="font-weight: 300;">Effettua il login per non perderti nessun evento!</h2>
        </div>

        <div class="center" style="margin-top: 2%;">
            <form name="login" onclick="return validateForm()" action="login.php" method="post">
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