<?php
    require('./data/session.php');

    if(empty($username)) header('location: ./pages/home.php');
    else header('location: ./pages/home_personale.php');
?>