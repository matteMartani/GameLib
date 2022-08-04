@extends('layouts.master')

@section('titolo')
    View Software Houses
@endsection

@section('body')
    <body class="fontoriginale bg-white">
    @endsection

    @section('navbar')
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link nav-disattivo" href="{{route('home')}}">Home</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link nav-disattivo dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Game Library
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{route('gioco.index')}}">{{trans('labels.yourgames')}}</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{route('software_house.index')}}">{{trans('labels.yoursh')}}</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-attivo" href="{{route('gioco.all')}}">{{trans('labels.allgames')}}</a>
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
                <li class="nav-item"><text class="nav-link">Welcome {{$username}}!</text></li>
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

    @section('breadcrumb')
        <nav class="main-breadcrumb" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-dark" href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item text-dark" aria-current="page">{{trans('labels.everyone')}}</li>
            </ol>
        </nav>
    @endsection

@section('content')

    <section class="py-5 text-center container-fluid fontoriginale sfondo">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light text-white font-scritte">{{trans('labels.complete')}}</h1>
                    <p class="lead text-white">{{trans('labels.consult2')}}</p>
                <p>
                    @if($logged)
                    <a href="{{route('gioco.index')}}" class="btn btn-outline-success btn-lg my-2">{{trans('labels.back2')}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                        </svg></a>
                    @else
                        <a href="{{route('user.register')}}" class="btn btn-outline-success btn-lg my-2">{{trans('labels.register3')}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                            </svg></a>
                    @endif
                </p>
            </div>
        </div>
    </section>
    <div class="album py-5 bg-white">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                @foreach($games as $game)
                    <div class="col">
                        <div class="card shadow-sm bg-dark">
                            <img class="img-fluid" src="../images/{{$game->cover}}">
                            <div class="card-body">

                                <table class="table table-striped table-hover table-responsive table-dark" style="width:100%">
                                    <col width="12%">
                                    <col width="7%">

                                    <thead>
                                    <tr>
                                        <th scope="col">{{trans('labels.gamer')}}</th>
                                        <th scope="col">{{$game->user->username}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="col">{{trans('labels.name')}}</th>
                                        <th scope="col">{{$game->titolo}}</th>
                                    </tr>

                                    <tr>
                                        <th scope="row">{{trans('labels.developer')}}</th>
                                        <td>{{$game->software_house->nome}}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">{{trans('labels.year')}}</th>
                                        <td>{{$game->anno}}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">{{trans('labels.playtime')}}</th>
                                        <td>{{$game->Playtime}} hrs</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">{{trans('labels.score')}}</th>
                                        <td>{{$game->Score}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection


    @section('footer')
        <div class="container">
            @if(count($games)!=0)
                <p class="float-end"><a class="btn btn-sm btn-outline-dark" href="#">{{trans('labels.back')}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-up" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4.854 1.146a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L4 2.707V12.5A2.5 2.5 0 0 0 6.5 15h8a.5.5 0 0 0 0-1h-8A1.5 1.5 0 0 1 5 12.5V2.707l3.146 3.147a.5.5 0 1 0 .708-.708l-4-4z"/>
                        </svg></a></p>
            @endif
            <p class="">&copy; 2021 GameLib Enterprise</p>
        </div>
@endsection
