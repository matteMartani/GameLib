<?php

namespace App\Http\Controllers;

use App\Http\Resources\GameResource;
use App\Models\DataLayer;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function listGames(Request $request)
    {
        $dl = new DataLayer();
        if($request->header('with_sh')){
            $games = $dl->list_all_games_with_software_house();
        }
        else{
            $games = $dl->list_all_games_without_software_house();
        }
        return $games;
    }

    public function list_games_with_sh_paginate(){
        $dl = new DataLayer();
        $games = $dl->list_all_games_with_software_house_paginate();
        return $games;
    }

    public function list_games_with_resources(Request $request){
        $dl = new DataLayer();
        $games = $dl->list_all_games_with_software_house();
        return response(GameResource::collection($games));
    }

    public function add_sh(Request $request)
    {
        $dl = new DataLayer();
        $data = $request->json()->all();
        $dl->add_software_house($data['nome'], $data['user_id']);
    }
}
