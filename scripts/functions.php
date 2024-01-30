<?php



//Validazione form di registrazione
function Validate() : void {
	if((empty($_POST['firstname'])) || (empty($_POST['lastname'])) || (empty($_POST['email'])) || (empty($_POST['pass'])) || (empty($_POST['confirm'])) ){
		$_SESSION['error'] = "un campo è vuoto";
        header("Location: signup.php");
        exit();
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
			$_SESSION['error'] = 'Formato del nome non valido';
            header("Location: signup.php");
            exit();
		}
		if(!preg_match("/^[a-zA-Z]*$/",$_POST['lastname'])){
			$_SESSION['error'] = 'Formato del cognome non valido';
            header("Location: signup.php");
            exit();
		}
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$_SESSION['error'] = 'Formato email non valido';
            header("Location: signup.php");
            exit();
		}

	}
}



//Signup() è la funzione che registra l'utente nel database
function Signup() : void{
    if($_SERVER["REQUEST_METHOD"] == "POST"){// se la richiesta è post vai avanti
		if($_POST['pass'] != $_POST['confirm']){
			$_SESSION['error'] = "Password e conferma password non corrispondono";
            header("Location: signup.php");
            exit();
		}
        Validate();
        $_POST["confirm"] = htmlspecialchars($_POST["confirm"]);
        $_POST["confirm"] = trim($_POST["confirm"]);
        include 'connection.php';
        $stmt = $con->prepare("SELECT * FROM user where email=? "); // controllo se ci sono gia utenti con la stessa email
        $stmt->bind_param("s", $_POST['email']);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        if($result->num_rows === 0) {
            $news=0;
            if(isset($_POST['newsletter'])){
                $news=1;//se si è iscritto alla newsletter allora news=1
            }
            $password=$_POST['pass'];
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $con->prepare("INSERT INTO user(Name,Surname,Email,Pass,newsletter) VALUES(?,?,?,?,?)"); // preparo la query
            $stmt->bind_param("ssssi", $_POST['firstname'], $_POST['lastname'], $_POST['email'], $hash,$news); // passo ai parametri i valori
            $stmt->execute();

            $_SESSION['user_id']= $stmt->insert_id;
            $_SESSION['name']= $_POST['firstname'];
            //da settare la sessione una volta registrato
            $stmt->close();
            $con->close(); //chiudo la connessione con il database
            
            header("Location: home.php");
            exit(); 
        }
        else{
            $stmt->close();
            $con->close();
            echo "email già in uso, riprova";
            header("Location: signup.php");
            exit();
        }  
    }	   
}


//Funzione che valida il form di update
function ValidateUpdate() : void{

    if((empty($_POST['pass'])) ^ (empty($_POST['confirm']))){
        $_SESSION['error'] = "un campo è vuoto";
        header("Location: signup.php");
        exit();
    }
    if($_POST['pass'] != $_POST['confirm']){
        $_SESSION['error'] = "Password e conferma password non corrispondono";
        header("Location: signup.php");
        exit();
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
    if((!preg_match("/^[a-zA-Z]*$/",$_POST['firstname'])) || (!preg_match("/^[a-zA-Z]*$/",$_POST['lastname']))){
        $_SESSION['error'] = "Formato nome o cognome non valido";
        header("Location: show_profile.php");
        exit();
    }
    
    if(empty($_POST['email'])){
        $_SESSION['error'] = "Mail vuota";
        header("Location: show_profile.php");
        exit();
    }

}



//Funzione che esegue l'operazione di update di un utente
function Update() : void{

    if($_SERVER["REQUEST_METHOD"] == "POST"){// se la richiesta è post vai avanti

        ValidateUpdate();

        require_once 'connection.php';
        if($_POST['email']===$_SESSION['email']){//se l'email non è stata modificata
            if(!empty($_POST['pass'])){
                //password modificata
                $password=$_POST['pass'];
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $con->prepare("UPDATE user SET Name=?, Surname=?, Pass=? WHERE User_id=?"); // preparo la query
                $stmt->bind_param("sssi", $_POST['firstname'], $_POST['lastname'], $hash, $_SESSION['user_id']); // passo ai parametri i valori
                $stmt->execute();
                $stmt->close();
                $con->close();
                $_SESSION['success'] = "Modifica effettuata con successo";
                header("Location: show_profile.php");
                exit();
            }
            else{
                //password non modificata
                $stmt = $con->prepare("UPDATE user SET Name=?, Surname=? WHERE User_id=?"); // preparo la query
                $stmt->bind_param("ssi", $_POST['firstname'], $_POST['lastname'], $_SESSION['user_id']); // passo ai parametri i valori
                $stmt->execute();
                $stmt->close();
                $con->close();
                $_SESSION['success'] = "Modifica effettuata con successo";
                header("Location: show_profile.php");
                exit();
            }
        }
        else{
            //se l'email è stata modificata
            $stmt = $con->prepare("SELECT * FROM user where email=? "); // controllo se ci sono gia utenti con la stessa email
            $stmt->bind_param("s", $_POST['email']);
            $stmt->execute();
            $result = $stmt->get_result();
            $row=$result->fetch_assoc();
            $stmt->close();
            if($result->num_rows === 0) {
                if(!empty($_POST['pass'])){
                    //password modificata
                    $password=$_POST['pass'];
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $con->prepare("UPDATE user SET Name=?, Surname=?, Email=?, Pass=? WHERE User_id=?"); // preparo la query
                    $stmt->bind_param("ssssi", $_POST['firstname'], $_POST['lastname'], $_POST['email'], $hash, $_SESSION['user_id']); // passo ai parametri i valori
                    $stmt->execute();
                    $stmt->close();
                    $con->close();
                    $_SESSION['success'] = "Modifica effettuata con successo";
                    header("Location: show_profile.php");
                    exit();
                }else{
                    //password non modificata
                    $stmt = $con->prepare("UPDATE user SET Name=?, Surname=?, Email=? WHERE User_id=?"); // preparo la query
                    $stmt->bind_param("sssi", $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_SESSION['user_id']);
                    $stmt->execute();
                    $stmt->close();
                    $con->close();
                    $_SESSION['success'] = "Modifica effettuata con successo";
                    header("Location: show_profile.php"); 
                    exit();
                }
                 
            }
            else{
                $con->close();
                $_SESSION['error'] = "Email già in uso, riprova";
                header("Location: show_profile.php");
                exit();
            }
        }  
    }	
    
}


//Funzione che valida il login
function ValidateLogin() : void{

    if((empty($_POST['email'])) || (empty($_POST['pass']))){
        $_SESSION['error'] = "email o password mancanti";
        header("Location: login.php");
        exit();
    }
    else{
        $_POST['email'] = trim($_POST['email']);
        $_POST['pass'] = trim($_POST['pass']);
        $_POST['email'] = htmlspecialchars($_POST['email']);
        $_POST['pass'] = htmlspecialchars($_POST['pass']);
    }
}



//Funzione che esegue il login di un utente o dell'admin 
function Login() : void{
    if($_SERVER["REQUEST_METHOD"] == "POST"){// se la richiesta è post vai avanti
        ValidateLogin();
        require_once 'scripts/connection.php';
        $stmt = $con->prepare("SELECT * FROM user where Email=? "); // preparo la query
        $stmt->bind_param("s", $_POST['email']); // passo ai parametri i valori
        $stmt->execute(); 
        $result = $stmt->get_result();
        if($result->num_rows === 0) {
            $_SESSION['error'] = "email o password errate";
            header("Location: login.php");
            exit();
        }
        else{
            $row=$result->fetch_assoc();
            $hash = $row["Pass"];
            if(!password_verify($_POST['pass'], $hash)){
                $_SESSION['error'] = "email o password errate";
                header("Location: login.php");
                exit();
            }
            else{
                if($row['admin']==1){
                    //login admin
                    $_SESSION['user_id']= $row['User_id'];
                    $_SESSION['name']=$row['Name'];
                    $_SESSION['admin']=$row['admin'];
                    $_SESSION['email']=$row['Email'];
                    header("Location: admin.php");
                    exit();
                }else{
                    //login user
                    $_SESSION['user_id']= $row['User_id'];
                    $_SESSION['name']=$row['Name'];
                    $_SESSION['email']=$row['Email'];
                    header("Location: home.php");
                    exit();
                }
            
            }
        }

    }

}




//Funzione che valida l'evento 
function Validate_Evento(): void{
    if($_SERVER["REQUEST_METHOD"] == "POST"){// se la richiesta è post vai avanti
        if((empty($_POST['nome_evento']))|| (empty($_POST['luogo']))||(empty($_POST['n_par_max']))|| (empty($_POST['id_sport']))) {
            $_SESSION['error'] = "Uno o più campi non vuoti";
            header("Location: Crea_eventi.php");
            exit();
        }
        else{
            $_POST['nome_evento'] = htmlspecialchars($_POST['nome_evento']);
            $_POST['luogo'] =  htmlspecialchars($_POST['luogo']);
            $_POST['n_par_max'] =htmlspecialchars($_POST['n_par_max']);
            $_POST['id_sport'] = htmlspecialchars($_POST['id_sport']);
            $_POST['descrizione'] = htmlspecialchars($_POST['descrizione']);
            $_POST['nome_evento'] = trim($_POST['nome_evento']);
            $_POST['luogo'] =  trim($_POST['luogo']);
            $_POST['n_par_max'] = trim($_POST['n_par_max']);
            $_POST['id_sport'] = trim($_POST['id_sport']);
            $_POST['descrizione'] = trim($_POST['descrizione']);
            if((!preg_match("/^[a-zA-Z ]*$/",$_POST['nome_evento']))){
                $_SESSION['error']="Formato nome evento non valido";
                header("Location: Crea_eventi.php");
                exit();
            }
            if(!preg_match("/^[a-zA-Z ]*$/",$_POST['luogo'])){
                $_SESSION['error']="Formato luogo non valido";
                header("Location: Crea_eventi.php");
                exit();
            }
            if(!preg_match("/^[a-zA-Z0-9 .,!@#^'&()àèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝ]*$/",$_POST['descrizione'])){
                $_SESSION['error']="Formato descrizione non valido";
                header("Location: Crea_eventi.php");
                exit();
            }
            if(!preg_match("/^[0-9]*$/",$_POST['n_par_max'])){
                $_SESSION['error']="Numero partecipanti maggiore di quello massimo";
                header("Location: Crea_eventi.php");
                exit();
            }
            if(!preg_match("/^[0-9]*$/",$_POST['id_sport'])){
                $_SESSION['error']="Sport non valido";
                header("Location: Crea_eventi.php");
                exit();
            }
        }
       }


}


//Funzione che crea l'evento e lo inserisce il database
function Crea_Evento() : void{
    if($_SERVER["REQUEST_METHOD"] == "POST"){// se la richiesta è post vai avanti
        Validate_Evento();
        include 'connection.php';
        $zero=0;// numero partecipanti corrente
        $stmt = $con->prepare("INSERT INTO evento(nome_evento, luogo, n_par_max, n_par_corr, id_sport, descrizione) VALUES(?,?,?,?,?,?)"); // preparo la query
        $stmt->bind_param("ssiiis", $_POST['nome_evento'], $_POST['luogo'], $_POST['n_par_max'],$zero, $_POST['id_sport'],$_POST['descrizione']); // passo ai parametri i valori
        $stmt->execute();
        $stmt->close();
        $con->close(); 
        $_SESSION['success']="Evento creato con successo, in attesa di approvazione";
        header("Location: home.php");
        exit();
    }
}