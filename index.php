<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <link href="http://fonts.cdnfonts.com/css/pokemon-solid" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,700;0,900;1,300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=ZCOOL+KuaiLe&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.2/flickity.min.css" integrity="sha512-BiFZ6oflftBIwm6lYCQtQ5DIRQ6tm02svznor2GYQOfAlT3pnVJ10xCrU3XuXnUrWQ4EG8GKxntXnYEdKY0Ugg==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<nav>
      <img src="./immagini/logopoke.png" alt="logo">
   <ul>
        <li> <a href="./pages/home.php"> Home</a></li>
        <li> <a href="./pages/registrazione.php"> Registrazione</a> </li>
        <li> <a href="./pages/login.php"> Login</a> </li>
        <li> <a href="./pages/logout.php"> Logout</a> </li>
        <li> <a href="./pages/logout.php"> <i class= "fa fa-shopping-bag"></i></a></li>
   </ul>
  </nav>
    <div class="contenitore-inizio">
        <div class="box1">
            <h1 class="font-figo"> Benvenuti sul sito <br>
                di vendita di carte Pokemon <br>
                migliore del paese!</h1>
            <p> Qui troverete tutto ciò che cercate relativo <br>
                al mondo delle carte Pokemon, <br>
                da bustine di qualsiasi espansione fino ai <br>
                box più rari </p>
        </div>
        <div class="box2">
            <img class="logo" src="immagini/boltund.png" height="350px" alt="">
        </div>
        <div class="box3">
            <img class="logo" src="immagini/box-sunmoon.png" height="400px" alt="">
        </div>
    </div>
    <div class="contenitore2">
        <h1 class="font-figo"> Top vendite </h1>
        <div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true }'>
            <a class="carousel-cell" id="zygardecard"></a>
            <a class="carousel-cell" id="set-fuoriclasse"></a>
            <a class="carousel-cell" id="box-ee"> </a>
            <a class="carousel-cell" id="pikachu-vmax"> </a>
            <a class="carousel-cell" id="bustina-vs"> </a>
            <a class="carousel-cell" id="bustina-sdl"> </a>
            <a class="carousel-cell" id="set-fc"> </a>
        </div>
    </div>
    <h1 class="font-figo1"> Cosa cerchi? </h1>
    <div class="contenitore3">
        <div class="box4">
        <a href="pages/bustine.php"><img class="logo" src="immagini/bustine-gds.png" height="400px" alt=""></a>
            <p class="scritta"> Bustine </p>
        </div>
        <div class="box5">
        <a href="pages/box.php"><img class="logo" src="immagini/box-sunmoon.png" height="400px" alt=""></a>
            <p  class="scritta"> Box </p>
        </div>
        <div class="box6">
        <a href="pages/carte.php"><img class="logo" src="immagini/Pikachu.png" height="400px" alt=""></a>
            <p  class="scritta"> Carte singole </p>
        </div>


    </div>

    <!-- Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.2/flickity.pkgd.min.js" integrity="sha512-cA8gcgtYJ+JYqUe+j2JXl6J3jbamcMQfPe0JOmQGDescd+zqXwwgneDzniOd3k8PcO7EtTW6jA7L4Bhx03SXoA==" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $(".hamburger").on('click', function() {
                $(".menu").toggleClass("menu--open");
            });
        });
    </script>
<footer>
    <div class="footerpagina">
      <br>
      <br>
     <p>© 2021 Tezza Matteo and Maconi Filippo - All rights reserved.</p>
 </div>
</footer>
</body>

</html>