@extends('layouts.master')

@section('titolo')
    View Software Houses
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
                <li class="breadcrumb-item text-dark" aria-current="page">{{trans('labels.sh')}}</li>
            </ol>
        </nav>
    @endsection


@section('content')
        <section class="py-5 text-center container-fluid fontoriginale sfondo">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">

                        @if(count($software_houses)==0)
                            <h1 class="fw-light text-white font-scritte"> {{trans('labels.there')}}</h1>
                        @else
                            <h1 class="fw-light text-white font-scritte">{{trans('labels.alldev')}}</h1>
                        @endif
                    <p>
                        <a href="{{route('gioco.index')}}" class="btn btn-outline-violetto my-2">{{trans('labels.yourgames')}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dice-6-fill" viewBox="0 0 16 16">
                            <path d="M3 0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3H3zm1 5.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm8 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm1.5 6.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zM12 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM5.5 12a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zM4 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                            </svg></a>
                        <a href="{{route('software_house.create')}}" class="btn btn-outline-light btn-lg my-2">{{trans('labels.addsh')}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cpu-fill" viewBox="0 0 16 16">
                            <path d="M6.5 6a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
                            <path d="M5.5.5a.5.5 0 0 0-1 0V2A2.5 2.5 0 0 0 2 4.5H.5a.5.5 0 0 0 0 1H2v1H.5a.5.5 0 0 0 0 1H2v1H.5a.5.5 0 0 0 0 1H2v1H.5a.5.5 0 0 0 0 1H2A2.5 2.5 0 0 0 4.5 14v1.5a.5.5 0 0 0 1 0V14h1v1.5a.5.5 0 0 0 1 0V14h1v1.5a.5.5 0 0 0 1 0V14h1v1.5a.5.5 0 0 0 1 0V14a2.5 2.5 0 0 0 2.5-2.5h1.5a.5.5 0 0 0 0-1H14v-1h1.5a.5.5 0 0 0 0-1H14v-1h1.5a.5.5 0 0 0 0-1H14v-1h1.5a.5.5 0 0 0 0-1H14A2.5 2.5 0 0 0 11.5 2V.5a.5.5 0 0 0-1 0V2h-1V.5a.5.5 0 0 0-1 0V2h-1V.5a.5.5 0 0 0-1 0V2h-1V.5zm1 4.5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3A1.5 1.5 0 0 1 6.5 5z"/>
                            </svg></a>
                    </p>
                </div>
            </div>
        </section>

        <div class="album py-5 bg-white">
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table id="example" class="table table-striped table-hover table-responsive" style="width:100%">
                        <col width='77%'>
                        <col width='11%'>
                        <col width='12%'>

                        @if(count($software_houses)!=0)

                        <thead>
                            <tr>
                                <th><span style="font-size: 100%; ">{{trans('labels.devname')}}</span></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                                @for ($i = 0; $i < count($software_houses); $i++)
                                    <tr>
                                    <td><span style="font-size: 100%; ">{{$software_houses[$i]->nome}}</span></td>
                                    <td>
                                    <a class="btn btn-outline-violetto my-2" href="{{route('software_house.edit', ['software_house'=>$software_houses[$i]->software_house_id])}}">{{trans('labels.edit')}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                          <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                          </svg></a>
                                    </td>
                                    @if(!$hasGames[$i])
                                            <td>
                                                <a class="btn btn-outline-secondary btn-lg my-2" href="{{route('software_house.confirm_request', ['software_house_id'=>$software_houses[$i]->software_house_id])}}">{{trans('labels.delete')}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash2-fill" viewBox="0 0 16 16">
                                              <path d="M2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225zm9.89-.69C10.966 2.214 9.578 2 8 2c-1.58 0-2.968.215-3.926.534-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466-.18-.14-.498-.307-.975-.466z"/>
                                              </svg></a>
                                            </td>
                                    @else
                                        <td>
                                        <button class="btn btn-default btn-lg my-2" disabled="disabled" href="#">{{trans('labels.delete')}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-octagon" viewBox="0 0 16 16">
                                              <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"/>
                                              <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                              </svg></button>
                                        </td>
                                    </tr>
                                    @endif
                                @endfor
                        </tbody>
                        @endif
                    </table>
                </div>
            </div>
            <div>
        </div>
                @endsection

                @section('footer')
            <div class="container">
                @if(count($software_houses)!=0)
                <p class="float-end"><a class="btn btn-sm btn-outline-dark" href="#">{{trans('labels.back')}} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-up" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4.854 1.146a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L4 2.707V12.5A2.5 2.5 0 0 0 6.5 15h8a.5.5 0 0 0 0-1h-8A1.5 1.5 0 0 1 5 12.5V2.707l3.146 3.147a.5.5 0 1 0 .708-.708l-4-4z"/>
                    </svg></a></p>
                @endif
            <p class="">&copy; 2021 GameLib Enterprise</p>
            </div>
            @endsection

