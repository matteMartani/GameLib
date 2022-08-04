 <?php
include_once('model/gioco.php');
include_once('model/user.php');
include_once('model/DataLayer.php');

$dl = new DataLayer();
$users_list=$dl->list_users();
$games_list=$dl->list_all_games();

require_once('utils/XHTML_functions.php');

session_start();

 if (isset($_GET['logout'])) {
     session_destroy();
     header("location: index.php");
 }

?> 

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <link href="MyCSS.css" rel="stylesheet" type="text/css">

        <!-- font -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

    </head>
    <body class="fontoriginale bg-dark">
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"> <img src="img/Logo.png" width="50" height="30" alt=""> GameLib </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link nav-attivo" href="index.php">Home</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link nav-disattivo dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Games
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="
                                    <?php
                                    if ($_SESSION['logged']) {
                                        echo 'yourGames.php';
                                    } else {
                                        echo 'Login.php';
                                    }
                                    ?>">View Your Games</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="
                                    <?php
                                    if ($_SESSION['logged']) {
                                        echo 'ViewSoftwareHouses.php';
                                    } else {
                                        echo 'Login.php';
                                    }
                                    ?>">View Your SoftwareHouses</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link nav-disattivo" aria-current="page" href="yourGames.php">Your Games</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-disattivo" href="allGames.php">All Games</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-disattivo" href="StatsUser.php">Stats</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-disattivo dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Forum
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="Forum.php">Latest Posts</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="Forum.php">Hot Topics</a></li>
                            </ul>
                        </li>
                                <?php
                                if ($_SESSION['logged']) {
                                    echo '<li class="nav-item">
                                          <a class="nav-link nav-disattivo" href="' . $_SERVER["PHP_SELF"] . '?logout=logout">logout</a>
                                          </li>';
                                } else {
                                    echo '<li class="nav-item dropdown">
                                          <a class="nav-link nav-disattivo dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                          Account
                                          </a>
                                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                          <li><a class="dropdown-item" href="Login.php">Login</a></li>
                                          <li><hr class="dropdown-divider"></li>
                                          <li><a class="dropdown-item" href="Join.php">Join</a></li>
                                          </ul>
                                          </li>';
                                }
                                ?>
                    </ul>
                </div>
            </div>
        </nav>





        <div id="myCarousel" class="carousel slide carosello" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner">

                <div class="carousel-item active">

                    <img src="img/Bioshock.png" class="" >

                    <div class="container">

                        <div class="carousel-caption text-start">
                            <h5>Welcome to</h5>
                            <h1 class="font-scritte">GameLib</h1>
                            <p class='testo-giallo'>Track what you're currently playing</p>
                            <div class="btn-group">

                                <a class="btn btn-lg btn-outline-success" href="Login.php">Login</a>

                                <a class="btn btn-lg btn-outline-success" href="Join.php">Sign up</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/Monkey_island.jpg" class="" >

                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1 class="font-scritte">Visit our forum</h1>
                            <p class="text-info">Talk about your interests and share your thought!</p>

                            <div class="btn-group">

                                <a class="btn btn-lg btn-outline-info" href="Forum.php">Hot topics</a>

                                <a class="btn btn-lg btn-outline-info" href="Forum.php">Latest posts</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/Journey.jpg" class="" >

                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h1 class="font-scritte">Wanna face some challenges?</h1>
                            <p class="text-dark">View statistics about other players!</p>
                            <p><a class="btn btn-lg btn-outline-dark" href="StatsUser.php">Browse Gamers</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="container-fluid marketing">

            <div class="row">

                <div class="col-lg-6">

                    <h2 class="text-white main-testo font-scritte">  Last users who joined</h2>
                    <ul class="list-group list-group-flush main-testo">

                         <?php

                        for($i = count($users_list)-1; $i >= max(count($users_list)-6, 0); $i--){
                        
                            echo '<li style="font-family:Comic Sans MS" class="list-group-item bg-dark text-white ">'.$users_list[$i]->get_username().'</li>';
                    }
                    ?> 
                    </ul>
                    <br>
                    <p><a class="btn btn-outline-violetto main-bottone" href="StatsUser.php">View details <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                            <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                            </svg></a></p>

                </div>

                <div class="col-lg-6">
                    <h2 class=" text-white main-testo font-scritte"> Last games added</h2>
                    <ul class="list-group list-group-flush main-testo">

                     <?php

                    for($i = count($games_list)-1; $i >= max(count($games_list)-6, 0); $i--){
                        echo '<li style="font-family:Comic Sans MS" class="list-group-item bg-dark text-white ">'.$games_list[$i]->get_titolo().'</li>';
                    }
                    ?> 

                    </ul>
                    <br>
                    <p><a class="btn btn-outline-violetto main-bottone" href="StatsGame.php">View details <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-joystick" viewBox="0 0 16 16">
                            <path d="M10 2a2 2 0 0 1-1.5 1.937v5.087c.863.083 1.5.377 1.5.726 0 .414-.895.75-2 .75s-2-.336-2-.75c0-.35.637-.643 1.5-.726V3.937A2 2 0 1 1 10 2z"/>
                            <path d="M0 9.665v1.717a1 1 0 0 0 .553.894l6.553 3.277a2 2 0 0 0 1.788 0l6.553-3.277a1 1 0 0 0 .553-.894V9.665c0-.1-.06-.19-.152-.23L9.5 6.715v.993l5.227 2.178a.125.125 0 0 1 .001.23l-5.94 2.546a2 2 0 0 1-1.576 0l-5.94-2.546a.125.125 0 0 1 .001-.23L6.5 7.708l-.013-.988L.152 9.435a.25.25 0 0 0-.152.23z"/>
                            </svg></a></p>
                </div>
            </div>
            <br>
            <div class="row featurette sfondo-home ">
                <div class="col-md-7">
                    <h1 class="featurette-heading text-warning font-scritte">How it works?</h1>
                    <br>
                    <ul class="list-group list-group-flush h3">
                        <li class="list-group-item trasparenza">Estimate how much longer your current game will last.</li>
                        <li class="list-group-item trasparenza">Compare your game times to other players.</li>
                        <li class="list-group-item trasparenza">Catalog your gaming collection.</li>
                        <li class="list-group-item trasparenza">Start a discussion</li>

                    </ul>
                    <br>
                    <br>

                </div>
                <!-- FOOTER -->
                <footer class="container">
                    <p class="float-end"><a class="btn btn-sm btn-outline-light" href="#">Back to top <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-up" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4.854 1.146a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L4 2.707V12.5A2.5 2.5 0 0 0 6.5 15h8a.5.5 0 0 0 0-1h-8A1.5 1.5 0 0 1 5 12.5V2.707l3.146 3.147a.5.5 0 1 0 .708-.708l-4-4z"/>
                            </svg></a></p>
                    <p class="text-light">&copy; 2021 GameLib Enterprise</p>
                </footer>
            </div>

        </div><!-- /.container -->

    </body>
</html>
