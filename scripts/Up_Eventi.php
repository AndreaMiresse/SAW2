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
    $sql= "UPDATE evento SET approvato=1 WHERE id={$_POST['id']}";
    $result = $con->query($sql);
    if($result){
        echo "<script>
        alert('Evento approvato!');
        window.location.href='../Amm_Eventi.php';
        </script>";
    
        
    }
    else{
        echo "<script>
        alert('Errore, sei scarso');
        window.location.href='../Amm_Eventi.php';
    </script>";
    
    }
    
?>