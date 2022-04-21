<?php
    session_start();
    if(isset($_SESSION['nome_utente'])) $nome_utente = $_SESSION['nome_utente'];
    else $nome_utente = "";
?>