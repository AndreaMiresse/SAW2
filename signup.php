<?php


if($_SERVER["REQUEST_METHOD"] == "POST"){// se la richiesta è post vai avanti
    Validate();
    include ('connection.php');
    // controllo sulla data di nascita

	$stmt = $con->prepare("SELECT * FROM user where email=? "); // controllo se ci sono gia utenti con la stessa email
	$stmt->bind_param("s", $_POST['email']);
	$stmt->execute();
	$result = $stmt->get_result();
	if($result->num_rows === 0) {
    	$password=$_POST['pass'];
	    $hash = password_hash($password, PASSWORD_DEFAULT);
		$stmt = $con->prepare("INSERT INTO user(firstname,lastname,Email,Pass) VALUES(?,?,?,?)"); // preparo la query
		$stmt->bind_param("sssss", $_POST['firstname'], $_POST['lastname'], $_POST['email'], $hash); // passo ai parametri i valori
		$stmt->execute();
		$stmt->close();
		$con->close(); //ho aggiunto queste close ma non so se servono per forza, in teoria penso sia meglio chiudere le connessioni

    	//$con->query("INSERT INTO user VALUES('".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."','$hash','".$_POST['Birth_date']."','0')");
		$_SESSION['user_id']= $stmt->insert_id;
		//da settare la sessione una volta registrato
		header("Location: home.php"); // da aggiornare con prepared statement!!!
	}
	else{
		echo "email già in uso, riprova";
		header("Location: signup.php");
		$stmt->close();
		$con->close();
	}
	//LA PASSWORD VA MESSA DUE VOLTE PER CONFERMA
	
	

}
 
function Validate() : void {
	if((empty($_POST['firstname']))|| (empty($_POST['lastname']))|| (empty($_POST['email']))|| (empty($_POST['pass']))|| (empty($_POST['confirm'])) ){
		throw new RuntimeException("un campo è vuoto");
	}
	else{
		$_POST['firstname'] = htmlspecialchars($_POST['firstname']);
		$_POST['lastname'] =  htmlspecialchars($_POST['lasttname']);
		$_POST['email'] =htmlspecialchars($_POST['email']);
		$_POST['pass'] = htmlspecialchars($_POST['pass']);
		$_POST['firstname'] = trim($_POST['firstname']);
		$_POST['lastname'] =  trim($_POST['lastname']);
		$_POST['email'] = trim($_POST['email']);
		$_POST['pass'] = trim($_POST['pass']);
		if((!preg_match("/^[a-zA-Z]*$/",$_POST['firstname']))){
			throw new RuntimeException('Formato del nome non valido');
		}
		if(!preg_match("/^[a-zA-Z]*$/",$_POST['lastname'])){
			throw new RuntimeException('Formato del cognome non valido');
		}
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			throw new RuntimeException('Formato dell\'email non valido');
		}

	}
}
    session_start();
?>
<!DOCTYPE html>
<head>
    <?php include 'head.php';?>
	<link rel="stylesheet" href="./signup.css" type="text/css">
    <title>Register</title>
</head>
    
<body>

    <?php
        include ('navIndex.php');
    ?>

	<div class="form">
		<h1>Registrati</h1>
		<form action="registration.php" method="post"> <!-- bisogna usare quello fornito dalla prof -->
			<input type="text" name="firstname" placeholder="Nome"><br><br>
			<input type="text" name="lastname" placeholder="Cognome"><br><br>
			<input type="email" name="email" placeholder="Email"><br><br>
			<input type="password" name="pass" placeholder="Password"><br><br>
			<input type="password" name="confirm" placeholder="Conferma password"><br><br>
			<input type="submit" name="submit" value="Registrati"><br>
  		</form> 

	</div>

</body>

</html>

