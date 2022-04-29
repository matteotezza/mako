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
    <title>Box</title>
    <link rel="stylesheet" href="../style.css">
    <link href="http://fonts.cdnfonts.com/css/pokemon-solid" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <div class="contenitore8">
        <h1 class="font-figo centered"> Ecoo i Box a tua disposizione! </h1>
        <div class="contenitore4">
        <?php
        function alert($msg){
            echo "<script type='text/javascript'>alert('$msg');</script>";
        }
            $sql = "SELECT *
                    FROM boxx";
            $ris = $conn->query($sql);
            while ($row = $ris->fetch_assoc()) {
                $espansione = $row['codice_box'];
                $prezzo = $row['prezzo'];
                
                echo '
                

        <div class="contenitore5">
            <img class="logo2" src="../immagini/' . $espansione . '.png" height="400px" alt="">
          <table>
          <tr>
          <td> 
          <td>
          <form action="' . $_SERVER['PHP_SELF'] . '?espansione='. $espansione .'" method="post">
                        <input class="hidden" value=' . $espansione . ' ></input><input type="submit" name="espansione" value="Compra">
         </form>
          </td>
          <div class="minibox">
          <div class="font2"> <br>' . $espansione . ' ' . $prezzo . ' €
          </div>
          </div>
          </td>
          </tr>
          </table>

        </div>
        ';
        
            }
            if(!isset($_SESSION['nome_utente'])){
                alert("Devi fare il login per comprare qualcosa, <br> 
                in caso non avessi ancora un account registrati");
            }
            else if(isset($_POST["espansione"]) && !empty ($_POST['espansione']))
            {
            $tipo=urldecode($_GET["espansione"]);
            $myquery = "SELECT prezzo
            FROM boxx
            WHERE codice_box = '$tipo'";
            $ris = $conn->query($myquery);
            $tmp = $ris->fetch_assoc();
            $prezzo = $tmp["prezzo"];
            $myquery = "INSERT INTO carrello (prodotto, prezzo, nome_utente, quantità)
            VALUES ('$tipo','$prezzo','$nome_utente', 1)";
            $conn->query('SET FOREIGN_KEY_CHECKS=0;');
            $conn->query($myquery);

            $conn->query('SET FOREIGN_KEY_CHECKS=1;');
        
    }
    
            ?>
        </div>
    </div>
    <footer>
    <div class="footerpagina">
      <br>
      <br>
     <p>© 2021 Tezza Matteo and Maconi Filippo - All rights reserved.</p>
 </div>
</footer>
</body>
</html>