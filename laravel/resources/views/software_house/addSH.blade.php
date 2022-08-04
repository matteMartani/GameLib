@extends('layouts.master')

@section('titolo')
    Add a software house
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
            <li class="nav-item"><text class="nav-link">{{trans('labels.welcome2')}} {{$username}}!</text></li>
            <li class="nav-item"> <a class="nav-link nav-disattivo " href="{{route("user.logout")}}">{{trans('labels.logout')}}</a></li>
    </ul>
@endsection

    @section('breadcrumb')
        <nav class="main-breadcrumb" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="collegamento-scuro" href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a class="collegamento-scuro" href="{{route('software_house.index')}}">{{trans('labels.sh')}}</a></li>
                <li class="breadcrumb-item text-white" aria-current="page">
                    @if (isset($software_house_id))
                        {{trans('labels.edit')}} {{$nome}}
                    @else
                        {{trans('labels.addsh')}}
                        @endif
                </li>
            </ol>
        </nav>
    @endsection


@section('content')
        <section class="py-5 text-center container fontoriginale bg-light main-section">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light text-secondary font-scritte ">
                        @if (isset($software_house_id))
                            {{trans('labels.editsh')}}
                            @else
                            {{trans('labels.addsh2')}}
                        @endif
                        </h1>

                    <form class="form-horizontal" name="software_house" id="software_house" method="post" action="
                    @if (isset($software_house_id))
                    {{route('software_house.updater', $software_house_id)}}
                        @else
                        {{route('software_house.store')}}
                    @endif ">

                        @csrf

                        <div class="form-group">
                            @if (isset($software_house_id))
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="{{trans('labels.name')}}" value="{{$nome}}">
                            @else
                                <input type="text" class="form-control" placeholder="{{trans('labels.name')}}" name="nome" id="nome">
                            @endif
                            <span id="invalid_name" class="text-danger" ></span>
                        </div>

                        <br>
                            <div class="form-group">
                            @if (isset($software_house_id))
                                <button type="submit" onclick="event.preventDefault(); check_software_house()" class="btn btn-primary">{{trans('labels.edit')}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-node-plus-fill" viewBox="0 0 16 16">
                                <path d="M11 13a5 5 0 1 0-4.975-5.5H4A1.5 1.5 0 0 0 2.5 6h-1A1.5 1.5 0 0 0 0 7.5v1A1.5 1.5 0 0 0 1.5 10h1A1.5 1.5 0 0 0 4 8.5h2.025A5 5 0 0 0 11 13zm.5-7.5v2h2a.5.5 0 0 1 0 1h-2v2a.5.5 0 0 1-1 0v-2h-2a.5.5 0 0 1 0-1h2v-2a.5.5 0 0 1 1 0z"/>
                                </svg></button>
                                <input type="hidden" name="software_house_id" type="submit" id="MySubmit" value="' . $software_house->get_id() . '"/>
                            @else
                                <button type="submit" onclick="event.preventDefault(); check_software_house()" class="btn btn-success">{{trans('labels.add')}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-node-plus-fill" viewBox="0 0 16 16">
                                <path d="M11 13a5 5 0 1 0-4.975-5.5H4A1.5 1.5 0 0 0 2.5 6h-1A1.5 1.5 0 0 0 0 7.5v1A1.5 1.5 0 0 0 1.5 10h1A1.5 1.5 0 0 0 4 8.5h2.025A5 5 0 0 0 11 13zm.5-7.5v2h2a.5.5 0 0 1 0 1h-2v2a.5.5 0 0 1-1 0v-2h-2a.5.5 0 0 1 0-1h2v-2a.5.5 0 0 1 1 0z"/>
                                </svg></button>
                                <input id="mySubmit" type ="hidden" type="submit" value=\'Add\'/>
                            @endif
                            <a role="button" class="btn btn-danger" href="{{route('software_house.index')}}">{{trans('labels.cancel')}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-octagon-fill" viewBox="0 0 16 16">
                                <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zm-6.106 4.5L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
                                </svg></a>
                            </div>
                        </form>
            </div>
            </div>
        </section>
@endsection

        @section('footer')
            <div class="container">
            <p class="text-white fontoriginale">&copy; 2021 GameLib Enterprise</p>
            </div>
        @endsection
