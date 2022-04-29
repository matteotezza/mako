<?php
session_start();

require('../data/db.php');

// if (!isset($_SESSION['username'])) {
//     header('location: ../account.php');
// }

$nome_utente = $_SESSION['nome_utente'];
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

if (isset($_POST["espansione"])) $espansione = $_POST["espansione"];
else $espansione = "";
if (isset($_POST["prezzo"])) $prezzo = $_POST["prezzo"];
else $prezzo = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <link href="http://fonts.cdnfonts.com/css/pokemon-solid" rel="stylesheet">
</head>
<body>
<nav>
<a href="../index.php"> <img src="../immagini/logopoke.png" width= 100px alt="logo"> </a>
   <ul>
        <li> <a href="home.php"> Home</a></li>
        <li> <a href="registrazione.php"> Registrazione</a> </li>
        <li> <a href="login.php"> Login</a> </li>
        <li> <a href="logout.php"> Logout</a> </li>
        <li> <a href="carrello.php"> <i class= "fa fa-shopping-bag"></i></a></li>
   </ul>
  </nav>
  <div class="classe_iniziale">
      <div class="checkouttext">
          <h1> Inserisci i tuoi dati della carta per 
              completare l'ordine </h1>
      </div>
  <table class="tabella_login">
        <tr>
            <td>Numero della carta </td><td><input type="number" name="nome_utente" value="<?php echo $nome_utente; ?>" required></td>
        </tr>
        <tr>
            <td>Cvv</td><td><input type="password" name="number" value="<?php /*echo $password; */?>" required></td>
        </tr>
        <tr>
            <td>Data di scadenza</td><td><input type="month" name="password" value="<?php /*echo $password; */?>" required></td>
        </tr>
    </table>
    <input type="submit" value="Conferma">
      </div>
</body>
</html>