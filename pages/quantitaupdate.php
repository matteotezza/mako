<?php
    if(empty($_GET['q'])) die();
    require('../data/db.php');
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

    $quantita = $_GET['q'];
    $quantita = intval($quantita);
    $nome_utente = $_GET['n'];
    $tipo = $_GET['t'];
    $sql = "UPDATE carrello
    SET quantità = $quantita
    WHERE nome_utente = '$nome_utente' AND prodotto = '$tipo'";
    $conn->query($sql);

    $myquery = "SELECT *
            FROM carrello
            WHERE nome_utente = '$nome_utente' AND prodotto = '$tipo'";
        $ris = $conn->query($myquery);
        $ris = $ris->fetch_assoc();
        $prezzo = $ris['prezzo'];
        $prezzo = intval($prezzo);

    echo $quantita*$prezzo.'€';
    $conn->close();
