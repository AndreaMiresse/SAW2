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
    $mail->Password = 'Deez.nuts69';
    $mail->SMTPSecure = "ssl";
    $sql = "SELECT * FROM user WHERE newsletter=1";
    $result = $con->query($sql);
    while($row = $result->fetch_assoc()){
        if($row['newsletter']==1){ 
            $mail->From = "nuts25500@gmail.com"; 
            $mail->FromName = "Admin"; //To address and name 
            $mail->addAddress($row['Email']);//Recipient name is optional
            $mail->addAddress($row['Email']); //Address to which recipient will reply 
            $mail->addReplyTo("reply@yourdomain.com", "Reply"); //CC and BCC 
            $mail->addCC("cc@example.com"); 
            $mail->addBCC("bcc@example.com"); //Send HTML or Plain Text email 
            $mail->isHTML(true); 
            $mail->Subject = "Subject Text"; 
            $mail->Body = "<i>Mail body in HTML</i>";
            $mail->AltBody = "This is the plain text version of the email content"; 
            if(!$mail->send()) {
                echo "Mailer Error: " . $mail->ErrorInfo; 
            } else { 
                echo "Message has been sent successfully"; 
            }
        }
    }    
?>