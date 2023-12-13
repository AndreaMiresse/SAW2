<?php



function Validate() : void {
	if((empty($_POST['firstname']))|| (empty($_POST['lastname']))|| (empty($_POST['email']))|| (empty($_POST['pass']))|| (empty($_POST['confirm'])) ){
		throw new RuntimeException("un campo è vuoto");
	}
	else{
		$_POST['firstname'] = htmlspecialchars($_POST['firstname']);
		$_POST['lastname'] =  htmlspecialchars($_POST['lastname']);
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


function Signup() : void{
    if($_SERVER["REQUEST_METHOD"] == "POST"){// se la richiesta è post vai avanti
		if($_POST['pass'] != $_POST['confirm']){
			throw new RuntimeException("Le password non coincidono");
		}
        Validate();
        $_POST["confirm"] = htmlspecialchars($_POST["confirm"]);
        $_POST["confirm"] = trim($_POST["confirm"]);
        include ('connection.php');
        // controllo sulla data di nascita
    
        $stmt = $con->prepare("SELECT * FROM user where email=? "); // controllo se ci sono gia utenti con la stessa email
        $stmt->bind_param("s", $_POST['email']);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        if($result->num_rows === 0) {
            $password=$_POST['pass'];
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $con->prepare("INSERT INTO user(Name,Surname,Email,Pass) VALUES(?,?,?,?)"); // preparo la query
            $stmt->bind_param("ssss", $_POST['firstname'], $_POST['lastname'], $_POST['email'], $hash); // passo ai parametri i valori
            $stmt->execute();
           
    
            //$con->query("INSERT INTO user VALUES('".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."','$hash','".$_POST['Birth_date']."','0')");
            $_SESSION['user_id']= $stmt->insert_id;
            $_SESSION['name']= $_POST['firstname'];
            //da settare la sessione una volta registrato
            $stmt->close();
            $con->close(); //ho aggiunto queste close ma non so se servono per forza, in teoria penso sia meglio chiudere le connessioni
            
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
    
}

function ValidateUpdate() : void{

    if((empty($_POST['pass'])) ^ (empty($_POST['confirm']))){
        throw new RuntimeException("Per modificare la password inserisci e conferma la nuova password");
    }
    if($_POST['pass'] != $_POST['confirm']){
        throw new RuntimeException("Le password non coincidono");
    }
    $_POST['firstname'] = htmlspecialchars($_POST['firstname']);
    $_POST['lastname'] =  htmlspecialchars($_POST['lastname']);
    $_POST['email'] =htmlspecialchars($_POST['email']);
    $_POST['pass'] = htmlspecialchars($_POST['pass']);
    $_POST["confirm"] = htmlspecialchars($_POST["confirm"]);
    $_POST["confirm"] = trim($_POST["confirm"]);
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
    if(!empty($_POST['email'])){
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            throw new RuntimeException('Formato dell\'email non valido');
        }
    }

}

function Update() : void{

    if($_SERVER["REQUEST_METHOD"] == "POST"){// se la richiesta è post vai avanti

        ValidateUpdate();

        include ('connection.php');
        // controllo sulla data di nascita
    
        $stmt = $con->prepare("SELECT * FROM user where email=? "); // controllo se ci sono gia utenti con la stessa email
        $stmt->bind_param("s", $_SESSION['email']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row=$result->fetch_assoc();
        $stmt->close();
        if($result->num_rows === 1) {
            $password=$_POST['pass'];
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $con->prepare("UPDATE user SET Name=?, Surname=?, Email=?, Pass=? WHERE User_id=?"); // preparo la query
            $stmt->bind_param("ssssi", $_POST['firstname'], $_POST['lastname'], $_POST['email'], $hash, $_SESSION['user_id']); // passo ai parametri i valori
            $stmt->execute();
            $stmt->close();
            $con->close(); //ho aggiunto queste close ma non so se servono per forza, in teoria penso sia meglio chiudere le connessioni
    
            header("Location: ..\profile.php"); // da aggiornare con prepared statement!!!
        }
        else{
            echo "email già in uso, riprova";
            header("Location: ..\profile.php");
            $con->close();
        }
        //LA PASSWORD VA MESSA DUE VOLTE PER CONFERMA
        
    }	
    
}

function Validate_Evento(): void{
    if($_SERVER["REQUEST_METHOD"] == "POST"){// se la richiesta è post vai avanti
        if((empty($_POST['nome_evento']))|| (empty($_POST['luogo']))||(empty($_POST['n_par_max']))|| (empty($_POST['id_sport']))) {
            throw new RuntimeException("un campo è vuoto");
        }
        else{
            $_POST['nome_evento'] = htmlspecialchars($_POST['nome_evento']);
            $_POST['luogo'] =  htmlspecialchars($_POST['luogo']);
            $_POST['n_par_max'] =htmlspecialchars($_POST['n_par_max']);
            $_POST['id_sport'] = htmlspecialchars($_POST['id_sport']);
            $_POST['nome_evento'] = trim($_POST['nome_evento']);
            $_POST['luogo'] =  trim($_POST['luogo']);
            $_POST['n_par_max'] = trim($_POST['n_par_max']);
            $_POST['id_sport'] = trim($_POST['id_sport']);
            if((!preg_match("/^[a-zA-Z ]*$/",$_POST['nome_evento']))){
                throw new RuntimeException('Formato del nome non valido');
            }
            if(!preg_match("/^[a-zA-Z ]*$/",$_POST['luogo'])){
                throw new RuntimeException('Formato del luogo non valido');
            }
            if(!preg_match("/^[0-9]*$/",$_POST['n_par_max'])){
                throw new RuntimeException('Formato del numero partecipanti non valido');
            }
            if(!preg_match("/^[0-9]*$/",$_POST['id_sport'])){
                throw new RuntimeException('Formato dell\'id sport non valido');
            }
        }
       }


}


function Crea_Evento() : void{
    if($_SERVER["REQUEST_METHOD"] == "POST"){// se la richiesta è post vai avanti
        Validate_Evento();
        include ('connection.php');
        $zero=0;
        $stmt = $con->prepare("INSERT INTO evento(nome_evento, luogo, n_par_max, n_par_corr, id_sport) VALUES(?,?,?,?,?)"); // preparo la query
        $stmt->bind_param("ssiii", $_POST['nome_evento'], $_POST['luogo'], $_POST['n_par_max'],$zero, $_POST['id_sport']); // passo ai parametri i valori
        $stmt->execute();
        $stmt->close();
        $con->close(); //ho aggiunto queste close ma non so se servono per forza, in teoria penso sia meglio chiudere le connessioni
        header("Location: home.php"); // da aggiornare con prepared statement!!!
    }
}