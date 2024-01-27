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
    $sql="DELETE FROM evento WHERE id={$_POST['id']}";
    $result = $con->query($sql);
    if($result){
        $_SESSION['success']="Evento cancellato con successo";
        header("Location: ../Amm_Eventi.php");
        exit();
    }
    else{
        $_SESSION['error']="Errore nella cancellazione dell'evento";
        header("Location: ../Amm_Eventi.php");
        exit();
    }
?>