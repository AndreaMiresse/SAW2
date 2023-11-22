<?php
    session_start();
?>
<!DOCTYPE html>
<head>
    <?php require_once 'head.php';?>
	<link rel="stylesheet" href="./css/signup.css" type="text/css">
    <title>Register</title>
</head>
    
<body>
    <?php include ('navIndex.php');?>
		<h1 id="titr" class="text-center">Registrati</h1>
		<form action="registration.php" method="post"> <!-- bisogna usare quello fornito dalla prof -->
			<br><div class="text-center">
			<input type="text" name="firstname" placeholder=" Nome"><br><br>
			</div>
			<div class="text-center">
			<input type="text" name="lastname" placeholder=" Cognome"><br><br>
			</div>
			<div class="text-center">
			<input type="email" name="email" placeholder=" Email"><br><br>
			</div>
			<div class="text-center">
			<input type="password" name="pass" placeholder=" Password"><br><br>
			</div>
			<div class="text-center">
			<input type="password" name="confirm" placeholder=" Conferma password"><br><br>
			</div>
			<div class="text-center">
			<input type="submit" name="submit" value="Registrati"><br>
			</div>
  		</form>
</body>
</html>

