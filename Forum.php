<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Forum</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <link href="MyCSS.css" rel="stylesheet" type="text/css">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

        <link rel="shortcut icon" type="image/x-icon" href="/Users/matteo/NetBeansProjects/TEST/public_html/img/page.ico" />

    </head>
    <body class="fontoriginale bg-light">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"> <img src="img/Logo.png" width="50" height="30" alt=""> GameLib </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link nav-disattivo" href="index.html">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link nav-disattivo" aria-current="page" href="yourGames.html">Your Games</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-disattivo" href="allGames.html">All Games</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-disattivo" href="StatsUser.html">Stats</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-attivo dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Forum
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="Forum.html">Latest Posts</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="Forum.html">Hot Topics</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-disattivo dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Account
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="Login.html">Login</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="Join.html">Join</a></li>
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

        <section class="py-5 text-center container-fluid fontoriginale sfondo-forum">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light text-white font-scritte">Here's the Forum!</h1>
                    <p class="lead text-warning">Discuss about your interests</p>
                    <div class="btn-group">
                        <a href="Post.html" class="btn btn-outline-warning my-2">Add Discussion <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-fill" viewBox="0 0 16 16">
                            <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15z"/>
                            </svg></a>
                        <a href="yourPosts.html" class="btn btn-outline-warning my-2">View your Posts <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                            </svg></a>
                    </div>
                </div>
            </div>
        </section>

        <br>
        <br>
        <div class='container'>
            <div class='rounded'>
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark border rounded">
                    <div class="container-fluid">
                        <a class="navbar-brand text-white" href="#">Articles</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Latest Posts</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Hot topics</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Guides</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Questions</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Most Discussed</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <ol class="list-group list-group-numbered">


                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div><a href="Article.html" class="fw-bold collegamento">Title1</a></div>
                            <span class="badge bg-secondary">topic1</span>
                        </div>

                        <div class="ms-2">
                            <small class="fw-bold">2h</small>
                            <span class="badge bg-warning rounded-pill">3</span>
                        </div>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div><a href="#" class="fw-bold collegamento">Title2</a></div>
                            <span class="badge bg-success">topic2</span>
                        </div>

                        <div class="ms-2">
                            <small class="fw-bold">1d</small>
                            <span class="badge bg-warning rounded-pill">7</span>
                        </div>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div><a href="#" class="fw-bold collegamento">Title3</a></div>
                            <span class="badge bg-primary">topic3</span>
                        </div>

                        <div class="ms-2">
                            <small class="fw-bold">3d</small>
                            <span class="badge bg-warning rounded-pill">17</span>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div><a href="#" class="fw-bold collegamento">Title3</a></div>
                            <span class="badge bg-primary">topic3</span>
                        </div>

                        <div class="ms-2">
                            <small class="fw-bold">3d</small>
                            <span class="badge bg-warning rounded-pill">17</span>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div><a href="#" class="fw-bold collegamento">Title3</a></div>
                            <span class="badge bg-primary">topic3</span>
                        </div>

                        <div class="ms-2">
                            <small class="fw-bold">3d</small>
                            <span class="badge bg-warning rounded-pill">17</span>
                        </div>
                    </li>

                </ol>
            </div>
        </div>

        <br>
        <br>
        <!-- FOOTER -->
        <footer class="container">
            <p class="float-end"><a class="btn btn-sm btn-outline-dark" href="#">Back to top <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-up" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4.854 1.146a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L4 2.707V12.5A2.5 2.5 0 0 0 6.5 15h8a.5.5 0 0 0 0-1h-8A1.5 1.5 0 0 1 5 12.5V2.707l3.146 3.147a.5.5 0 1 0 .708-.708l-4-4z"/>
                    </svg></a></p>
            <p class="">&copy; 2021 GameLib Enterprise</p>
        </footer>

    </body>
</html>
