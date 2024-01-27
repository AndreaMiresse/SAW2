<?php 
    session_start();
    
    if((isset($_SESSION['user_id'])) && ($_SESSION['admin']==1)){//se la sessione è settata fai
        $utente = $_SESSION['user_id'];
    }
    else{
        if(isset($_SESSION['user_id'])){
            header("Location: home.php");
            exit();
        }
        else{
            header("Location: login.php");
            exit();
        }
    }
    require_once "connection.php";
    $sql="DELETE FROM user WHERE User_id={$_POST['id']}";
    $result = $con->query($sql);
    if($result){
        $_SESSION['success']="Utente bannato";
        header("Location: ../Amm_Utenti.php");
        exit();
    }
    else{
        $_SESSION['error']="Errore nel bannare l'utente";
        header("Location: ../Amm_Utenti.php");
        exit();
    }
?>