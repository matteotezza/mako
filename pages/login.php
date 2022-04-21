<?php
session_start();
	
require('../data/db.php');
echo session_id();

error_reporting(E_ALL ^ E_WARNING); 

if(isset($_POST["nome_utente"])){
	$nome_utente = $_POST["nome_utente"];
}
else{
	$nome_utente = "";
}

if (isset($_POST["password"])){
	$password = $_POST["password"];
}
else {
	$password = "";
}
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				if( empty($_POST["nome_utente"]) or empty($_POST["password"])) {
					echo "<p> Inserire username e password </p>";
				} else {
					$conn = new mysqli($db_servername,$db_username,$db_password,$db_name);
					if($conn->connect_error){
						die("<p>Connessione al server non riuscita: ".$conn->connect_error."</p>");
					}
					echo "connessione al server riuscita";
					
					$myquery = "SELECT nome_utente, password 
								FROM cliente
								WHERE nome_utente='$_POST[nome_utente]'
									AND password='$password'";

					$ris = $conn->query($myquery) or die("<p>Query fallita! ".$conn->error."</p>");

					if($ris->num_rows == 0){
						echo "<p>Utente non trovato o password errata</p>";
						$conn->close();
					} 
					else {
						$_SESSION["nome_utente"]=$nome_utente;
												
						$conn->close();
						header("location: ../index.php");

					}
				}
			}
                    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
	<link href="http://fonts.cdnfonts.com/css/pokemon-solid" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div class="classe_iniziale">
    <h1 class="font-figo">Inserisci le tue credenziali per entrare</h1>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <table class="tabella_login">
        <tr>
            <td>Username</td><td><input type="text" name="nome_utente" value="<?php echo $nome_utente; ?>" required></td>
        </tr>
        <tr>
            <td>Password</td><td><input type="password" name="password" value="<?php /*echo $password; */?>" required></td>
        </tr>
    </table>
    <p><input type="submit" value="Accedi"></p>
</form>   
</body>
</html>