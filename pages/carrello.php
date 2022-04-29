<?php
session_start();

require('../data/db.php');

if (!isset($_SESSION['nome_utente'])) {
    header('location: login.php');
}
else{
   $nome_utente = $_SESSION['nome_utente'];
}
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

 if (isset($_POST["prodotto"])) $espansione = $_POST["prodotto"];
 else $prodotto = "";
 if (isset($_POST["prezzo"])) $prezzo = $_POST["prezzo"];
 else $prezzo = "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bustine</title>
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
   </ul>
  </nav>
    <div class="contenitore8">
        <h1 class="font-figo centered"> Questo è il tuo carrello </h1>
        <div class="contenitore4">
            <?php
            $sql = "SELECT *
                    FROM carrello
                    WHERE nome_utente = '$nome_utente'";
            $ris = $conn->query($sql);
            while ($row = $ris->fetch_assoc()) {
                $prodotto = $row['prodotto'];
                $prezzo = $row['prezzo'];
                echo '
                

        <div class="contenitore11">
            <img class="logo2" src="../immagini/' . $prodotto. '.png" height="400px" alt="">
          <table>
          <tr>
          <td> 
            <div class="carrello1">
            <div class="font2"> <br>' . $prodotto . ' Prezzo: ' . $prezzo . ' €
            </div>
            </div>
        
          <div class="carrello2">
          <input type="number" value="1"></td>
                </div>
                <div class="carrello3">
          <input type="submit" name= "delete" value="Rimuovi dal carrello"></td>
                </div>
                </td>
          </table>

        </div>
        ';
            }
            ?>
        </div>
        <div class="button">
        <a href="checkout.php"> Prosegui al checkout </a>
        </div> 
    </div>

</body>

</html>