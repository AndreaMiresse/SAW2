<?php
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST"){// se la richiesta è post vai avanti
        ValidateLogin();
        include ('connection.php');
        $stmt = $con->prepare("SELECT * FROM user where email=? "); // preparo la query
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
                echo "password errata";
            }
            else{
                $_SESSION['user_id']= $row['User_id'];
                $_SESSION['name']=$_POST['firstname'];
                header("Location: home.php");
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

<!DOCTYPE html>
<head>
  <?php include 'head.php';?>
</head>

<body>
    <title>Login</title>

    <body>
        <form action="login.php" method="post">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="pass" placeholder="Password">
            <input type="submit" name="submit" value="Login">
        </form>
</html>