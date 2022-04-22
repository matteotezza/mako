<?php 
    if(isset($_POST["nome_utente"])) $nome_utente = $_POST["nome_utente"];  else $nome_utente = "";
    if(isset($_POST["password"])) $password = $_POST["password"];  else $password = "";
    if(isset($_POST["conferma"])) $conferma = $_POST["conferma"];  else $conferma = "";
    if(isset($_POST["nome"])) $nome = $_POST["nome"];  else $nome = "";
    if(isset($_POST["cognome"])) $cognome = $_POST["cognome"];  else $cognome = "";
    if(isset($_POST["email"])) $email = $_POST["email"];  else $email = "";
    if(isset($_POST["telefono"])) $telefono = $_POST["telefono"];  else $telefono = "";
    if(isset($_POST["comune"])) $comune = $_POST["comune"];  else $comune = "";
    if(isset($_POST["indirizzo"])) $indirizzo = $_POST["indirizzo"];  else $indirizzo = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="http://fonts.cdnfonts.com/css/pokemon-solid" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="registrazione">
        <h1 class="font-figo">Registrazione</h1>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <table id="tab_dati_personali">
                <tr>
                    <td>Username:</td>
                    <td><input class="input_dati_personali" type="text" name="nome_utente" <?php echo "value = '$nome_utente'" ?> required></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input class="input_dati_personali" type="password" name="password" <?php echo "value = '$password'" ?> required></td>
                </tr>
                <tr>
                    <td>Conferma psw:</td>
                    <td><input class="input_dati_personali" type="password" name="conferma" <?php echo "value = '$conferma'" ?> required></td>
                </tr>
                <tr>
                    <td>Nome:</td>
                    <td><input class="input_dati_personali" type="text" name="nome" <?php echo "value = '$nome'" ?>></td>
                </tr>
                <tr>
                    <td>Cognome:</td>
                    <td><input type="text" class="input_dati_personali" name="cognome" <?php echo "value = '$cognome'" ?>></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" class="input_dati_personali" name="email" <?php echo "value = '$email'" ?>></td>
                </tr>
                <tr>
                    <td>Telefono:</td>
                    <td><input type="text" class="input_dati_personali" name="telefono" <?php echo "value = '$telefono'" ?>></td>
                </tr>
                <tr>
                    <td>Comune:</td>
                    <td><input type="text" class="input_dati_personali" name="comune" <?php echo "value = '$comune'" ?>></td>
                </tr>
                <tr>
                    <td>Indirizzo:</td>
                    <td><input type="text" class="input_dati_personali" name="indirizzo" <?php echo "value = '$indirizzo'" ?>></td>
                </tr>
            </table>
            <p style="text-align: center">
                <input type="submit" value="Invia">
            </p>
        </form>
        <p>
            <?php
            if(isset($_POST["nome_utente"]) and isset($_POST["password"])) {
                if ($_POST["nome_utente"] == "" or $_POST["password"] == "") {
                    echo "inserire per favore username e password";
                } elseif ($_POST["password"] != $_POST["conferma"]){
                    echo "Password errata";
                } else {
                    $conn = new mysqli("localhost", "root", "", "negozio_pokemon");
                    if($conn->connect_error){
                        die("<p>Connessione al server non riuscita: ".$conn->connect_error."</p>");
                    }

                    $myquery = "SELECT nome_utente 
						    FROM cliente
						    WHERE nome_utente='" . $_POST["nome_utente"] . "'";
                    

                    $ris = $conn->query($myquery) or die("<p>Query fallita!</p>");
                    if ($ris->num_rows > 0) {
                        echo "Questo username è già stato usato";
                        header('Refresh: 2; URL=../index.php');
                    } else {

                        $myquery = "INSERT INTO cliente (nome_utente, password, nome, cognome, email, telefono, comune, indirizzo)
                                    VALUES ('$nome_utente', '$password', '$nome', '$cognome','$email','$telefono','$comune','$indirizzo')";

                        if ($conn->query($myquery) === true) {
                            session_start();
                            $_SESSION["nome_utente"]=$nome_utente;
                            
                            
						    $conn->close();

                            echo "Registrazione effettuata con successo!<br>sarai ridirezionato alla home tra 5 secondi.";
                            header('Refresh: 5; URL=../index.php');

                        } else {
                            echo "Non è stato possibile effettuare la registrazione per il seguente motivo: " . $conn->error;
                        }
                    }
                }
            }
            ?>
        </p>
    </div>
    <?php 
        error_reporting(E_ALL ^ E_WARNING); // metodo globale ^ significa tranne e funziona da qui in poi
		include('footer.php');
		// @include('footerrr.php');  // con @ evito la generazione di warnings o errors da parte della funzione
	?>
</body>
</html>