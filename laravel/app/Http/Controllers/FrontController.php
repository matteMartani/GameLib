<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;


class FrontController extends Controller
{
    public function getHome(){

        $dl= new DataLayer();
        $games=$dl->list_all_games();
        $users=$dl->list_users();

        session_start();
        if(isset($_SESSION['logged'])){
            return view('index') -> with('logged', true) -> with('username', $_SESSION['username']) -> with('games', $games) -> with('users', $users);
        } else {
            return view('index') -> with('logged', false) -> with('games', $games) -> with('users', $users);
        }
    }

    public function statsUser(){

        session_start();

        $dl= new DataLayer();
        $users_games=$dl->list_users_by_games();
        $games_hours=$dl->list_games_by_hours();
        $users_posts=$dl->list_users_by_posts();

        if(isset($_SESSION['logged'])){
            return view('stats.user') -> with('logged', true) -> with('username', $_SESSION['username']) -> with('users_games', $users_games)
                -> with('games_hours', $games_hours) -> with('users_posts', $users_posts);
        } else {
            return view('stats.user') -> with('logged', false) -> with('users_games', $users_games)
                -> with('games_hours', $games_hours) -> with('users_posts', $users_posts);
        }
    }
}
