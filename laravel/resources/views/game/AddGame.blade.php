@extends('layouts.master')

@section('titolo')
    Add Game
@endsection

@section('body')
<body class="fontoriginale bg-dark sfondo">
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
        <li class="nav-item"><text class="nav-link">Welcome {{$username}}!</text></li>
        <li class="nav-item"> <a class="nav-link nav-disattivo " href="{{route("user.logout")}}">{{trans('labels.logout')}}</a></li>
    </ul>
@endsection


@section('breadcrumb')
    <nav class="main-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="collegamento-scuro" href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a class="collegamento-scuro" href="{{route('gioco.index')}}">{{trans('labels.yourgames')}}</a></li>
            <li class="breadcrumb-item text-white" aria-current="page">
                @if (isset($game_id))
                    {{trans('labels.edit')}} {{$game->titolo}}
                @else
                    {{trans('labels.addgame')}}
                @endif
            </li>
        </ol>
    </nav>
@endsection


@section('content')
    <div class="container fontoriginale bg-light text-center">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light text-secondary font-scritte ">
                    @if (isset($game_id))
                        {{trans('labels.editgame')}}
                    @else
                        {{trans('labels.addgame2')}}
                    @endif
                </h1>
                <form class="form-horizontal" name="gioco" method="post" enctype="multipart/form-data" action="
                                @if (isset($game_id))
                                 {{route('gioco.updater', $game_id)}}
                                @else
                                 {{route('gioco.store')}}
                                @endif ">

                    @csrf

                    <div class="form-group mx-sm-5 mb-2">
                        <label>{{trans('labels.gamename')}}</label>
                        @if (isset($game_id))
                            <input type="text" class="form-control" id="titolo" name="titolo" placeholder="{{trans('labels.name')}}" value="{{$game->titolo}}">
                        @else
                            <input type="text" class="form-control" placeholder="{{trans('labels.name')}}" name="titolo" id="titolo">
                        @endif
                        <span id="invalid_title" class="text-danger" ></span>
                    </div>

                    <div class="form-group mx-sm-5 mb-2">
                        <label>{{trans('labels.year')}}</label>
                        @if (isset($game_id))
                            <input type="text" class="form-control" id="anno" name="anno" placeholder="{{trans('labels.year')}}" value="{{$game->anno}}">
                        @else
                            <input type="text" class="form-control" placeholder="{{trans('labels.year')}}" name="anno" id="anno">
                        @endif
                        <span id="invalid_year" class="text-danger" ></span>
                    </div>

                    <div class="form-group mx-sm-5 mb-2">
                        <label>{{trans('labels.playtime')}}</label>
                        @if (isset($game_id))
                            <input type="text" class="form-control" id="Playtime" name="Playtime" placeholder="{{trans('labels.playtime')}}" value="{{$game->Playtime}}">
                        @else
                            <input type="text" class="form-control" placeholder="{{trans('labels.playtime')}}" name="Playtime" id="Playtime">
                        @endif
                        <span id="invalid_playtime" class="text-danger" ></span>
                    </div>

                    <br>
                    <div class="form-group">
                        <label>{{trans('labels.rating')}}
                            <select class="form-select" name="Score" id="Score" aria-label="Default select example">
                                @if (isset($game_id))
                                    <option selected>{{$game->Score}}</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                @else
                                    <option selected value="6">6</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                @endif
                            </select>
                        </label>
                    </div>

                    <br>
                    <div class="form-group">
                        <label>{{trans('labels.select')}}
                            <select name="software_house_id" id="software_house_id" class="form-select form-control text-center" aria-label="Default select example">
                                @if (isset($game_id))
                                    <option selected value="{{$game->software_house->software_house_id}}">{{$game->software_house->nome}}</option>
                                    @foreach($software_houses as $software_house)
                                        <option value="{{$software_house->software_house_id}}">{{$software_house->nome}}</option>
                                    @endforeach
                                @else
                                    @foreach($software_houses as $software_house)
                                        <option value="{{$software_house->software_house_id}}">{{$software_house->nome}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </label>
                    </div>
                    <br>
                    <div class="mb-3 form-group">
                        <label for="formFile" class="form-label">{{trans('labels.image')}}</label>
                        @if (isset($game_id))
                            <input name="cover" id="cover" class="form-control" type="file">
                        @else
                            <input name="cover" id="cover" class="form-control" type="file">
                        @endif
                        <span id="invalid_cover" class="text-danger" ></span>
                    </div>
                    <br>
                    <div class="form-group">
                        @if (isset($game_id))
                            <button type="submit" onclick="event.preventDefault(); checkGame()" class="btn btn-primary">{{trans('labels.edit')}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-node-plus-fill" viewBox="0 0 16 16">
                                    <path d="M11 13a5 5 0 1 0-4.975-5.5H4A1.5 1.5 0 0 0 2.5 6h-1A1.5 1.5 0 0 0 0 7.5v1A1.5 1.5 0 0 0 1.5 10h1A1.5 1.5 0 0 0 4 8.5h2.025A5 5 0 0 0 11 13zm.5-7.5v2h2a.5.5 0 0 1 0 1h-2v2a.5.5 0 0 1-1 0v-2h-2a.5.5 0 0 1 0-1h2v-2a.5.5 0 0 1 1 0z"/>
                                </svg></button>
                            <input type="hidden" name="game_id" type="submit" id="MySubmit" value="' . $software_house->get_id() . '"/>
                        @else
                            <button type="submit" onclick="event.preventDefault(); checkGame()" class="btn btn-success">{{trans('labels.add')}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-node-plus-fill" viewBox="0 0 16 16">
                                    <path d="M11 13a5 5 0 1 0-4.975-5.5H4A1.5 1.5 0 0 0 2.5 6h-1A1.5 1.5 0 0 0 0 7.5v1A1.5 1.5 0 0 0 1.5 10h1A1.5 1.5 0 0 0 4 8.5h2.025A5 5 0 0 0 11 13zm.5-7.5v2h2a.5.5 0 0 1 0 1h-2v2a.5.5 0 0 1-1 0v-2h-2a.5.5 0 0 1 0-1h2v-2a.5.5 0 0 1 1 0z"/>
                                </svg></button>
                            <input id="mySubmit" type ="hidden" type="submit" value=\'Add\'/>
                        @endif
                        <a role="button" class="btn btn-danger" href="{{route('gioco.index')}}">{{trans('labels.cancel')}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-octagon-fill" viewBox="0 0 16 16">
                                <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zm-6.106 4.5L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
                            </svg></a>
                    </div>
                </form>
            </div>
        </div>
        </div>
        @endsection

@section('footer')
<p class="float-end"><a class="btn btn-sm btn-outline-light" href="#">{{trans('labels.back')}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-up" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M4.854 1.146a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L4 2.707V12.5A2.5 2.5 0 0 0 6.5 15h8a.5.5 0 0 0 0-1h-8A1.5 1.5 0 0 1 5 12.5V2.707l3.146 3.147a.5.5 0 1 0 .708-.708l-4-4z"/>
        </svg></a></p>
<p class="text-light">&copy; 2021 GameLib Enterprise</p>
@endsection

