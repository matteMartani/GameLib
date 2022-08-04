<?php
require_once 'model/gioco.php';
require_once 'model/user.php';
require_once 'model/DataLayer.php';
require_once('utils/XHTML_functions.php');

$dl = new DataLayer();

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['submit'])) {
        if($dl->validUser($_POST['username'], $_POST['password'])){
            session_start();
            $_SESSION['logged'] = true;
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['user_id'] = $dl -> $_POST['user_id'];

            if(!empty($_POST['remember'])){
                setcookie('username', $_POST['username'], time() + (10*365*24*60*60), "/");
                setcookie('password', $_POST['password'], time() + (10*365*24*60*60), "/");
            }

            header('Location: index.php');
        } else {
            header('Location: authErrorPage.php');
        }
    }
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
        <title>Login Page</title>
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

    <body class="fontoriginale bg-dark sfondo">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"> <img src="img/Logo.png" width="50" height="30" alt=""> GameLib </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link nav-disattivo" href="index.php">Home</a>
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
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-attivo dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Account
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="Login.php">Login</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="Join.php">Join</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="look for a game..." aria-label="Search">
                        <button class="btn btn-outline-dark" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-controller" viewBox="0 0 16 16">
                            <path d="M11.5 6.027a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm2.5-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm-6.5-3h1v1h1v1h-1v1h-1v-1h-1v-1h1v-1z"/>
                            <path d="M3.051 3.26a.5.5 0 0 1 .354-.613l1.932-.518a.5.5 0 0 1 .62.39c.655-.079 1.35-.117 2.043-.117.72 0 1.443.041 2.12.126a.5.5 0 0 1 .622-.399l1.932.518a.5.5 0 0 1 .306.729c.14.09.266.19.373.297.408.408.78 1.05 1.095 1.772.32.733.599 1.591.805 2.466.206.875.34 1.78.364 2.606.024.816-.059 1.602-.328 2.21a1.42 1.42 0 0 1-1.445.83c-.636-.067-1.115-.394-1.513-.773-.245-.232-.496-.526-.739-.808-.126-.148-.25-.292-.368-.423-.728-.804-1.597-1.527-3.224-1.527-1.627 0-2.496.723-3.224 1.527-.119.131-.242.275-.368.423-.243.282-.494.575-.739.808-.398.38-.877.706-1.513.773a1.42 1.42 0 0 1-1.445-.83c-.27-.608-.352-1.395-.329-2.21.024-.826.16-1.73.365-2.606.206-.875.486-1.733.805-2.466.315-.722.687-1.364 1.094-1.772a2.34 2.34 0 0 1 .433-.335.504.504 0 0 1-.028-.079zm2.036.412c-.877.185-1.469.443-1.733.708-.276.276-.587.783-.885 1.465a13.748 13.748 0 0 0-.748 2.295 12.351 12.351 0 0 0-.339 2.406c-.022.755.062 1.368.243 1.776a.42.42 0 0 0 .426.24c.327-.034.61-.199.929-.502.212-.202.4-.423.615-.674.133-.156.276-.323.44-.504C4.861 9.969 5.978 9.027 8 9.027s3.139.942 3.965 1.855c.164.181.307.348.44.504.214.251.403.472.615.674.318.303.601.468.929.503a.42.42 0 0 0 .426-.241c.18-.408.265-1.02.243-1.776a12.354 12.354 0 0 0-.339-2.406 13.753 13.753 0 0 0-.748-2.295c-.298-.682-.61-1.19-.885-1.465-.264-.265-.856-.523-1.733-.708-.85-.179-1.877-.27-2.913-.27-1.036 0-2.063.091-2.913.27z"/>
                            </svg>Search</button>
                    </form>
                </div>
            </div>
        </nav>

        <nav class="main-breadcrumb" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="collegamento-scuro" href="index.php">Home</a></li>
                <li class="breadcrumb-item text-white" aria-current="page">Login</li>
            </ol>
        </nav>
        
        <section class="py-5 text-center container fontoriginale bg-light main-section">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light text-muted font-scritte">MEMBER LOGIN</h1>
                    <p>
                    <form id="login-form" action="#" method="post">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group text-center">
                            <br>
                            <input type="checkbox" name="remember" <?php if (isset($_COOKIE["username_login"])) { ?> checked <?php } ?>>
                            <label for="remember"> Remember Me</label>
                        </div>
                        <br>
                        <div class="form-group d-grid gap-2 d-md-block">
                            <button type="submit" name="submit" class="btn btn-primary mr-1">Login <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                                <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                </svg></button>
                            <a role="button" class="btn btn-secondary ms-1" href="Join.php">Wanna register instead? <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg></a>
                            <a role="button" class="btn btn-danger ms-1" href="ForgotPW.php">Forgot Password? <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                                <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                </svg></a>
                        </div>
                    </form>

                </div>
            </div>
        </section>

        <br>
        <br>

        <!-- FOOTER -->
        <footer class="container">
            <p class="text-light">&copy; 2021 GameLib Enterprise</p>
        </footer>

    </body>
</html>