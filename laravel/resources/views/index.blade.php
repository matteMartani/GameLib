@extends('layouts.master')

@section ('titolo','Home')

@section('body')
<body class="fontoriginale bg-dark">
@endsection

    @section ('navbar')
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
                    <a class="nav-link nav-attivo" href="{{route('home')}}">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link nav-disattivo dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{trans('labels.library')}}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('gioco.index')}}">{{trans('labels.yourgames')}}</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route('software_house.index')}}">{{trans('labels.yoursh')}}</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-disattivo" href="{{route('gioco.all')}}">{{trans('labels.allgames')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-disattivo" href="{{route('stats.user')}}">{{trans('labels.stats')}}</a>
                </li>
            <li class="nav-item">
                <a class="nav-link nav-disattivo" href="{{route('forum.index')}}">Forum</a>
            </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-disattivo dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{trans('labels.language')}}
                        </a>
                        <ul class="dropdown-menu ms-auto" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('changeLanguage', ['lang'=>'it'])}}">
                                    {{trans('labels.italian')}}
                                    <img src="{{url("/")}}/img/flag/it.png" width="30" class="img-rounded">
                                </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{route('changeLanguage', ['lang'=>'en'])}}">
                                    {{trans('labels.english')}}
                                    <img src="{{url("/")}}/img/flag/en.png" width="30" class="img-rounded">
                                </a></li>
                        </ul>
                    </li>
                    @if ($logged)
                        <li class="nav-item"><text class="nav-link">{{trans('labels.welcome2')}} {{$username}}!</text></li>
                        <li class="nav-item"> <a class="nav-link nav-disattivo " href="{{route("user.logout")}}">{{trans('labels.logout')}}</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-disattivo dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{trans('labels.account')}}
                            </a>
                            <ul class="dropdown-menu ms-auto" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{route("user.login")}}">Login</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{route("user.register")}}">{{trans('labels.join')}}</a></li>
                            </ul>
                        </li>
                    @endif
                        </ul>
    @endsection


@section ('content')
<div id="myCarousel" class="carousel slide carosello" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">

        <div class="carousel-item active">

            <img src="{{url("/")}}/img/Bioshock.png" class="" >

            <div class="container">

                <div class="carousel-caption text-start">
                    <h5>{{trans('labels.welcome')}}</h5>
                    <h1 class="font-scritte">GameLib</h1>
                    <p class='testo-giallo'>{{trans('labels.track')}}</p>
                    <div class="btn-group">

                        @if ($logged)
                            <a class="btn btn-lg btn-outline-success" href="">Login</a>
                            <a class="btn btn-lg btn-outline-success" href="">{{trans('labels.join')}}</a>
                        @else
                            <a class="btn btn-lg btn-outline-success" href="{{route("user.login")}}">Login</a>
                            <a class="btn btn-lg btn-outline-success" href="{{route("user.register")}}">{{trans('labels.join')}}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{url("/")}}/img/Monkey_island.jpg" class="" >

            <div class="container">
                <div class="carousel-caption text-start">
                    <h1 class="font-scritte">{{trans('labels.forum')}}</h1>
                    <p class="text-info">{{trans('labels.talk')}}</p>

                    <div class="btn-group">
                        <a class="btn btn-lg btn-outline-info" href="{{route('forum.index')}}">{{trans('labels.post')}}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{url("/")}}/img/Journey.jpg" class="" >

            <div class="container">
                <div class="carousel-caption text-end">
                    <h1 class="font-scritte">{{trans('labels.challenge')}}</h1>
                    <p class="text-dark">{{trans('labels.stats2')}}</p>
                    <p><a class="btn btn-lg btn-outline-dark" href="{{route('stats.user')}}">{{trans('labels.stats3')}}</a></p>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">{{trans('labels.previous')}}</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">{{trans('labels.next')}}</span>
    </button>
</div>


<div class="container-fluid marketing">
    <div class="row">
        <div class="col-lg-6">
            <h2 class="text-white main-testo font-scritte">  {{trans('labels.users')}}</h2>
            <ul class="list-group list-group-flush main-testo">

                @for($i = count($users)-1; $i >= max(count($users)-6, 0); $i--)
                    <li style="font-family:Comic Sans MS" class="list-group-item bg-dark text-white ">
                        {{$users[$i]->username}}
                    </li>
                @endfor

            </ul>
        </div>


        <div class="col-lg-6">
            <h2 class=" text-white main-testo font-scritte"> {{trans('labels.games')}}</h2>
            <ul class="list-group list-group-flush main-testo">

                @for($i = count($games)-1; $i >= max(count($games)-6, 0); $i--)
                    <li style="font-family:Comic Sans MS" class="list-group-item bg-dark text-white ">
                        {{$games[$i]->titolo}}
                    </li>
                @endfor

            </ul>
        </div>
    </div>

    <br>

    <div class="row featurette sfondo-home ">
        <div class="col-md-7">
            <h1 class="featurette-heading text-warning font-scritte">{{trans('labels.work')}}</h1>
            <br>
            <ul class="list-group list-group-flush h3">
                <li class="list-group-item trasparenza">{{trans('labels.other')}}</li>
                <li class="list-group-item trasparenza">{{trans('labels.catalog')}}</li>
                <li class="list-group-item trasparenza">{{trans('labels.start')}}</li>

            </ul>
            <br>
            <br>
        </div>
        @endsection

       @section('footer')
            <p class="float-end"><a class="btn btn-sm btn-outline-light" href="#">{{trans('labels.back')}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-up" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.854 1.146a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L4 2.707V12.5A2.5 2.5 0 0 0 6.5 15h8a.5.5 0 0 0 0-1h-8A1.5 1.5 0 0 1 5 12.5V2.707l3.146 3.147a.5.5 0 1 0 .708-.708l-4-4z"/>
                    </svg></a></p>
            <p class="text-light">&copy; 2021 GameLib Enterprise</p>
        @endsection
    </div>

</div>
</body>
</html>
