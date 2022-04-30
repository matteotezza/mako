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
// if($_SERVER["REQUEST_METHOD"] == "post" && isset($_POST["prodotto"]) && isset($_POST["nome_utente"])){
//     echo "Entrato";
//     $prodotto = $_POST["prodotto"];
//     $nome_utente = $_POST["nome_utente"];
//     $deletecarr = "DELETE 
//                 FROM carrello
//                 WHERE nome_utente = '$nome_utente'
//                 AND prodotto = '$prodotto'";
//     $conn->query($deletecarr) or die($conn->error);

// }

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
                // echo "<p>". $_POST["prodotto"] . "</p>";
                // echo "<p>". $_POST["nome_utente"] . "</p>";
                if(isset($_POST["prodotto"]) && isset($_POST["nome_utente"])){
                    $prodotto = $_POST["prodotto"];
                    $nome_utente = $_POST["nome_utente"];
                    $deletecarr = "DELETE 
                                FROM carrello
                                WHERE nome_utente = '$nome_utente'
                                AND prodotto = '$prodotto'";
                    $conn->query($deletecarr) or die($conn->error);

                } else {
                    // echo "<p>NON Entrato</p>";
                }


            $sql = "SELECT *
                    FROM carrello
                    WHERE nome_utente = '$nome_utente'";
            $ris = $conn->query($sql);
            while ($row = $ris->fetch_assoc()) {
                $prodotto = $row['prodotto'];
                $prezzo = $row['prezzo'];
                $quantità = $row['quantità'];
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
                                        <input type="number" value="$quantità"></td>
                                    </div>
                                    <div class="carrello3">
                                        <form action = '. $_SERVER["PHP_SELF"] .' method="post">
                                            <input type="submit" name= "deletecarr" value="Rimuovi dal carrello">
                                            <input type="hidden" name= "prodotto" value="'.$prodotto.'">
                                            <input type="hidden" name= "nome_utente" value= "'.$nome_utente.'">
                                        </form>
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