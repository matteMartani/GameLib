@extends('layouts.master')

@section('titolo')
    Delete Software House
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
            <li class="breadcrumb-item"><a class="text-dark" href="{{route('gioco.index')}}">{{trans('labels.yourgames')}}</a></li>
            <li class="breadcrumb-item text-dark" aria-current="page">{{trans('labels.delete')}} {{$titolo}}</li>
        </ol>
    </nav>
@endsection

@section('content')
   <section class="py-5 text-center container-fluid fontoriginale sfondo">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light text-white font-scritte">{{trans('labels.delete2')}} {{$titolo}} {{trans('labels.from')}}</h1>
            <p>
                <a href="{{route('gioco.index')}}" class="btn btn-outline-light btn-lg my-2">{{trans('labels.revert')}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4z"/>
                    </svg></a>
                <a href="{{ route('gioco.delete', $game_id) }}" class="btn btn-outline-danger btn-lg my-2">{{trans('labels.delete')}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                    </svg></a>
            </p>
        </div>
    </div>
</section>
@endsection

@section('footer')
    <div class="container">
        <p class="">&copy; 2021 GameLib Enterprise</p>
    </div>
@endsection
