<?php
session_start();

require('../data/db.php');

// if (!isset($_SESSION['username'])) {
//     header('location: ../account.php');
// }

$nome_utente = $_SESSION['nome_utente'];
$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

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
    <title>Bustine</title>
    <link rel="stylesheet" href="../style.css">
    <link href="http://fonts.cdnfonts.com/css/pokemon-solid" rel="stylesheet">
</head>

<body>
    <div class="header">
        <div class="logo">
            <a href="../index.php"><img class="logo" src="../immagini/logopoke.png" width="200px" height="auto" alt=""></a>
        </div>
        <ul class="menu">
            <li><a href="home.php">Home</a></li>
            <li><a href="carrello.php">Carrello</a></li>
            <li><a href="registrazione.php">Registrazione</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
        <div class="cta">
            <a href="founders.html" class="button"><img class="logo" src="immagini/founders.png" height="40px" alt=""></a>
        </div>
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="contenitore8">
        <h1 class="font-figo centered"> Scegli l'espansione che più preferisci </h1>
        <div class="contenitore4">
            <?php
            $sql = "SELECT *
                    FROM bustina";
            $ris = $conn->query($sql);
            while ($row = $ris->fetch_assoc()) {
                $espansione = $row['espansione'];
                $prezzo = $row['prezzo'];
                echo '
                

        <div class="contenitore5">
            <img class="logo2" src="../immagini/' . $espansione . '.png" height="400px" alt="">
          <table>
          <tr>
          <td> 
          
          <div class="font2"> <br>' . $espansione . '          ' . $prezzo . ' €
          </div>
          </td>
          <td>
          <form action="' . $_SERVER['PHP_SELF'] . '" method="post">
                        <input class="hidden" name="espansione" value=' . $espansione . ' ></input><input type="submit" value="buy">
         </form>
          </td>
          </tr>
          </table>

        </div>
        ';
            }
            INSERT INTO 
            ?>
        </div>

    </div>

</body>

</html>