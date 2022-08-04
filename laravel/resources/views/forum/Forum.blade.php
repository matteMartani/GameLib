@extends('layouts.master')

@section('titolo')
    Forum
@endsection

@section('body')
    <body class="fontoriginale bg-light">
    @endsection

    @section ('navbar')
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
                <a class="nav-link nav-disattivo" href="{{route('stats.user')}}">{{trans('labels.stats')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-attivo" href="{{route('forum.index')}}">Forum</a>
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

    @section('content')
        <section class="py-5 text-center container-fluid fontoriginale sfondo-forum">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light text-white font-scritte">{{trans('labels.forum3')}}</h1>
                    <p class="lead text-warning">{{trans('labels.discussions2')}}</p>
                    <div class="btn-group">
                        <a href="{{route('forum.createDiscussion')}}" class="btn btn-outline-warning my-2">{{trans('labels.disc')}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-fill" viewBox="0 0 16 16">
                            <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15z"/>
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
                        <a class="navbar-brand text-white" href="#">{{trans('labels.latest')}}</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                </nav>
                <ol class="list-group list-group-numbered">

                    @foreach($discussions as $discussion)
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div><a href="{{route('forum.posts', ['disc_id'=>$discussion->disc_id])}}" class="fw-bold collegamento">{{$discussion->titolo}}</a></div>
                                <span class="badge bg-warning">{{$discussion->topic}}</span>
                            </div>

                            <div class="ms-2">
                                <small class="fw-bold">{{trans('labels.by')}} {{$discussion->user->username}}</small>
                                <span class="badge bg-warning rounded-pill">{{$discussion->posts_count}}</span>
                            </div>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>

        <br>
        <br>
    @endsection

    @section('footer')
            <p class="float-end"><a class="btn btn-sm btn-outline-dark" href="#">{{trans('labels.back')}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-up" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4.854 1.146a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L4 2.707V12.5A2.5 2.5 0 0 0 6.5 15h8a.5.5 0 0 0 0-1h-8A1.5 1.5 0 0 1 5 12.5V2.707l3.146 3.147a.5.5 0 1 0 .708-.708l-4-4z"/>
                    </svg></a></p>
            <p class="">&copy; 2021 GameLib Enterprise</p>
    @endsection
