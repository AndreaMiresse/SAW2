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
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../PHPMailer/src/Exception.php';
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';


    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Port = 465;
    $mail->Username = 'nuts25500@gmail.com';
    $mail->Password = 'gadf pkhd trbu cvqx';
    $mail->SMTPSecure = "ssl";
    $sql = "SELECT * FROM user WHERE newsletter=1";
    $result = $con->query($sql);
    while($row = $result->fetch_assoc()){
        if($row['newsletter']==1){ 
            $mail->From = "nuts25500@gmail.com"; 
            $mail->FromName = "SawSporty"; //To address and name 
            $mail->addAddress($row['Email']);//Recipient name is optional
            $mail->addReplyTo("nuts25500@gmail.com", "Reply"); 
            $mail->isHTML(true); 
            $mail->Subject = $_POST['nome_evento']; 
            $mail->Body = "
                <p>Hey, secondo noi potrebbe interessarti questo evento :</p>
                <a href='https://saw21.dibris.unige.it/~S4968197/evento_singolo.php?message=" . urlencode($_POST['nome_evento']) . "'>clicca qui</a>";
            $mail->AltBody = "This is the plain text version of the email content"; 
            if(!$mail->send()) {
                $_SESSION['error']="Mailer Error: " . $mail->ErrorInfo; 
                header("location: ../Amm_Eventi.php"); 
                exit();
            }
        }
        $mail->clearAddresses();
        $mail->clearCCs();
        $mail->clearBCCs();
        $mail->clearReplyTos();
    }
    $con->close();
    $_SESSION['success']="Mail inviate con successo";
    header("location: ../Amm_Eventi.php"); 
    exit();
?>