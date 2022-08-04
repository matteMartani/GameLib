@extends('layouts.master')

@section('titolo')
    Posts
@endsection

@section('body')
    <body class="fontoriginale bg-white">
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
                <li class="nav-item"><text class="nav-link">{{trans('labels.welcome')}} {{$username}}!</text></li>
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
                <li class="breadcrumb-item"><a class="text-dark" href="{{route('forum.index')}}">Forum</a></li>
                <li class="breadcrumb-item text-dark" aria-current="page">{{$discussion->titolo}}</li>
            </ol>
        </nav>
    @endsection

    @section('content')
    <br>

    <div class='container'>
        <div class='rounded bg-dark'>

            <br>
            <div class="container bg-dark rounded">
                <h4 class="text-white"> {{$discussion->titolo}}</h4>
                <h6><span class="badge bg-warning">{{$discussion->topic}}</span></h6>
            </div>

            <br>

            <div class="container  border border-top-0 border-2 bg-white">
                @foreach($posts as $post)
                <div class="row">
                    <div class="col-lg-3  border border-start-0">
                        <div class="container">
                            <br>
                            <div class="d-flex flex-column align-items-center text-center">
                                <div class="avatar">
                                    <div class="avatar__letters">
                                        {{substr($post->user->username, 0, 1)}}
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <p class="fw-bold"> {{$post->user->username}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                        </svg></p>
                                    <p class="fw-bold"> {{trans('labels.messages')}} {{count($post->user->posts)}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-fill" viewBox="0 0 16 16">
                                            <path d="M2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                        </svg></p>
                                    <p class="fw-bold"> {{trans('labels.discussions')}} {{count($post->user->discussions)}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-vector-pen" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M10.646.646a.5.5 0 0 1 .708 0l4 4a.5.5 0 0 1 0 .708l-1.902 1.902-.829 3.313a1.5 1.5 0 0 1-1.024 1.073L1.254 14.746 4.358 4.4A1.5 1.5 0 0 1 5.43 3.377l3.313-.828L10.646.646zm-1.8 2.908-3.173.793a.5.5 0 0 0-.358.342l-2.57 8.565 8.567-2.57a.5.5 0 0 0 .34-.357l.794-3.174-3.6-3.6z"/>
                                            <path fill-rule="evenodd" d="M2.832 13.228 8 9a1 1 0 1 0-1-1l-4.228 5.168-.026.086.086-.026z"/>
                                        </svg></p>
                                        @if(count($post->user->posts)==0)
                                        <p class="fw-bold text-secondary"> {{trans('labels.new')}}</p>
                                        @elseif(count($post->user->posts)<10)
                                        <p class="fw-bold text-success"> {{trans('labels.casual')}}</p>
                                        @else
                                        <p class="fw-bold text-info"> {{trans('labels.addicted')}}</p>
                                        @endif
                                    <p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-9 border-bottom">
                        <br>
                        <p>{{$post->content}}</p>
                        <br>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <p class="text-center main-bottoni">
        <a href="{{route('forum.createPost', ['disc_id'=>$discussion->disc_id])}}" class="btn btn-outline-violetto my-2">{{trans('labels.addpost')}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
            </svg></a>
        <a href="{{route('forum.index')}}" class="btn btn-outline-secondary btn-lg my-2">{{trans('labels.return')}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
            </svg></a>
    </p>
    @endsection


    @section('footer')
        <div class="container">
            <p class="float-end"><a class="btn btn-sm btn-outline-dark" href="#">{{trans('labels.back')}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-up" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.854 1.146a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L4 2.707V12.5A2.5 2.5 0 0 0 6.5 15h8a.5.5 0 0 0 0-1h-8A1.5 1.5 0 0 1 5 12.5V2.707l3.146 3.147a.5.5 0 1 0 .708-.708l-4-4z"/>
                    </svg></a></p>
            <p class="">&copy; 2021 GameLib Enterprise</p>
        </div>
    @endsection
