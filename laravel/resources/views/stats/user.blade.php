@extends('layouts.master')

@section('titolo')
    User Stats
@endsection


@section('body')
    <body class="fontoriginale bg-dark">
@endsection

@section('navbar')
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link nav-disattivo" href="{{route('home')}}">Home</a>
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
            <a class="nav-link nav-attivo" href="{{route('stats.user')}}">{{trans('labels.stats')}}</a>
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

@section('breadcrumb')
    <nav class="main-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-white" href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item text-white" aria-current="page">{{trans('labels.stats4')}}</li>
        </ol>
    </nav>
@endsection

        @section('content')
        <br>
        <br>
        <br>
        <br>

        <div class="container bg-dark">
            <h1 class="font-scritte text-white">{{trans('labels.stats5')}} </h1>

        <div class="container">
            <div class="bg-dark">
                <br>
                <br>
                <div class="col-md-12">
                    <h5 class="font-scritte text-light text-center">{{trans('labels.number')}}</h5>

                    <table class="table table-striped table-hover table-responsive table-dark" style="width:100%">
                        <col width='46%'>
                        <col width='44%'>
                        <col width='10%'>
                        <thead>
                            <tr>
                                <th scope="col">{{trans('labels.podium')}}</th>
                                <th scope="col">{{trans('labels.gamer')}}</th>
                                <th scope="col">{{trans('labels.gamesplayed')}}</th>
                            </tr>
                        </thead>
                        <tbody>

                        @for($i = 0; $i < count($users_games); $i++)
                            @if($users_games[$i]->games_count!=0)
                                <tr>
                                <th scope="row">{{$i+1}}</th>
                                <td>{{$users_games[$i]->username}}</td>
                                <td>{{$users_games[$i]->games_count}}</td>
                                </tr>
                                @endif
                        @endfor

                        </tbody>
                    </table>

                    <br>
                    <h5 class="font-scritte text-light text-center">{{trans('labels.time2')}}</h5>

                    <table class="table table-striped table-hover table-responsive table-dark" style="width:100%">
                        <col width='46%'>
                        <col width='44%'>
                        <col width='10%'>
                        <thead>
                            <tr>
                                <th scope="col">{{trans('labels.podium')}}</th>
                                <th scope="col">{{trans('labels.gamer')}}</th>
                                <th scope="col">{{trans('labels.time')}}</th>
                            </tr>
                        </thead>
                        <tbody>

                        @for($i = 0; $i < count($games_hours); $i++)
                            @if($games_hours[$i]->hours!=0)
                                <tr>
                                <th scope="row">{{$i+1}}</th>
                                <td>{{$games_hours[$i]->user->username}}</td>
                                <td>{{$games_hours[$i]->hours}} hrs</td>
                                </tr>
                                @endif
                        @endfor

                        </tbody>
                    </table>

                    <br>
                    <h5 class="font-scritte text-light text-center">{{trans('labels.number2')}}</h5>

                    <table class="table table-striped table-hover table-responsive table-dark" style="width:100%">
                        <col width='46%'>
                        <col width='44%'>
                        <col width='10%'>
                        <thead>
                            <tr>
                                <th scope="col">{{trans('labels.podium')}}</th>
                                <th scope="col">{{trans('labels.gamer')}}</th>
                                <th scope="col">{{trans('labels.forum2')}}</th>
                            </tr>
                        </thead>
                        <tbody>

                        @for($i = 0; $i < count($users_posts); $i++)
                            @if($users_posts[$i]->posts_count!=0)
                                <tr>
                                <th scope="row">{{$i+1}}</th>
                                <td>{{$users_posts[$i]->username}}</td>
                                <td>{{$users_posts[$i]->posts_count}}</td>
                            </tr>
                            @endif
                        @endfor

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <br>
            @endsection

            @section('footer')
                <p class="float-end"><a class="btn btn-sm btn-outline-light" href="#">{{trans('labels.back')}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-up" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.854 1.146a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L4 2.707V12.5A2.5 2.5 0 0 0 6.5 15h8a.5.5 0 0 0 0-1h-8A1.5 1.5 0 0 1 5 12.5V2.707l3.146 3.147a.5.5 0 1 0 .708-.708l-4-4z"/>
                        </svg></a></p>
                <p class="text-light">&copy; 2021 GameLib Enterprise</p>
            @endsection
