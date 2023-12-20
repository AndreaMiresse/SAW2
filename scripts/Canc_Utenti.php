<?php 
    session_start();
    
    if((isset($_SESSION['user_id'])) && ($_SESSION['admin']==1)){//se la sessione è settata fai
        $utente = $_SESSION['user_id'];
    }
    else{
        echo '<script type="text/javascript"> 
            alert("OHHH DOVE CAZZO VUOI ANDRAE CRETINO?");
            location="home.php";
        </script>';
    }
    require_once "connection.php";
    $sql="DELETE FROM user WHERE User_id={$_POST['id']}";
    $result = $con->query($sql);
    if($result){
        echo "<script>
        alert('Utente cancellato!');
        window.location.href='../Amm_Utenti.php';
        </script>";
    
        
    }
    else{
        echo "<script>
        alert('Errore, sei scarso');
        window.location.href='../Amm_Utenti.php';
    </script>";
    
    }
?>