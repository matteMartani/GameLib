@extends('layouts.master')

@section('titolo')
    View Your Games
@endsection

@section('body')
<body class="fontoriginale">
@endsection

@section('navbar')
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link nav-disattivo" href="{{route('home')}}">Home</a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link nav-attivo dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
        <li class="nav-item"><text class="nav-link">{{trans('labels.welcome2')}} {{$username}}!</text></li>
        <li class="nav-item"> <a class="nav-link nav-disattivo " href="{{route("user.logout")}}">{{trans('labels.logout')}}</a></li>
    </ul>
@endsection

@section('breadcrumb')
    <nav class="main-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-dark" href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item text-dark" aria-current="page">{{trans('labels.games2')}}</li>
        </ol>
    </nav>
@endsection


@section('content')
<section class="py-5 text-center container-fluid fontoriginale sfondo">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            @if(count($software_houses)==0)
                <h1 class="fw-light text-white font-scritte"> {{trans('labels.empty2')}}</h1>
                <p>
                    <a href="{{route('software_house.index')}}" class="btn btn-outline-violetto btn-lg my-2">{{trans('labels.yoursh')}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                        </svg></a>
                </p>
            @elseif(count($games)==0)
                <h1 class="fw-light text-white font-scritte"> {{trans('labels.empty')}}</h1>
                <p>
                    <a href="{{route('software_house.index')}}" class="btn btn-outline-violetto btn-lg my-2">{{trans('labels.yoursh')}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                        </svg></a>
                    <a href="{{route('gioco.create')}}" class="btn btn-outline-light btn-lg my-2">{{trans('labels.addgame')}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dice-6-fill" viewBox="0 0 16 16">
                            <path d="M3 0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3H3zm1 5.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm8 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm1.5 6.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zM12 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM5.5 12a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zM4 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                        </svg></a>
                </p>
            @else
                <h1 class="fw-light text-white font-scritte">{{trans('labels.catalog2')}}</h1>
                <p class="lead text-white">{{trans('labels.consult')}}</p>
            <p>
                <a href="{{route('software_house.index')}}" class="btn btn-outline-violetto btn-lg my-2">{{trans('labels.yoursh')}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                    </svg></a>
                <a href="{{route('gioco.create')}}" class="btn btn-outline-light btn-lg my-2">{{trans('labels.addgame')}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dice-6-fill" viewBox="0 0 16 16">
                        <path d="M3 0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3H3zm1 5.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm8 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm1.5 6.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zM12 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM5.5 12a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zM4 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                    </svg></a>
            </p>
            @endif
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
                                    <th scope="col">{{trans('labels.name')}}</th>
                                    <th scope="col">{{$game->titolo}}</th>
                                </tr>
                                </thead>
                                <tbody>

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
                                    <td>{{$game->Playtime}} {{trans('labels.hour')}}</td>
                                </tr>

                                <tr>
                                    <th scope="row">{{trans('labels.score')}}</th>
                                    <td>{{$game->Score}}</td>
                                </tr>
                                </tbody>
                            </table>

                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{route('gioco.edit', ['game_id'=>$game->game_id])}}" class="btn btn-sm btn-outline-primary">{{trans('labels.edit')}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                        <path d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                    </svg></a>
                                <a href="{{route('gioco.confirm', ['game_id'=>$game->game_id])}}" type="button" class="btn btn-sm btn-outline-danger">{{trans('labels.delete')}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg></a>
                            </div>
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
