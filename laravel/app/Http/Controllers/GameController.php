<?php

namespace App\Http\Controllers;

use App\Models\DataLayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    public function index()
    {
        $dl = new DataLayer();
        $games = $dl->list_games($_SESSION['user_id']);
        $software_houses = $dl->list_software_houses($_SESSION['user_id']);
        return view('game.yourGames')->with('logged', true)->with('username', $_SESSION['username'])->with('games', $games)->with('software_houses', $software_houses);
    }

    public function create()
    {
        $dl = new DataLayer();
        $software_houses = $dl->list_software_houses($_SESSION['user_id']);
        return view('game.AddGame')->with('username', $_SESSION['username']) ->with('software_houses', $software_houses);
    }

    public function edit($game_id)
    {
        session_start();
        $dl = new DataLayer();
        $game = $dl->find_game_by_id($game_id);
        $username = $_SESSION['username'];
        $software_houses = $dl->list_software_houses($_SESSION['user_id']);

        return view('game.AddGame')->with('game', $game) ->with('username', $username) ->with('software_houses', $software_houses) ->with('game_id', $game_id);
    }

    public function confirm($game_id)
    {
        session_start();
        $dl = new DataLayer();
        $titolo = $dl->find_game_by_id($game_id)->titolo;
        $username = $_SESSION['username'];

        return view('game.deleteGame')->with('titolo', $titolo) ->with('username', $username) ->with('game_id', $game_id);
    }

    public function delete($game_id)
    {
        session_start();
        $dl = new DataLayer();

        $dl->delete_game($game_id);

        return \redirect(route('gioco.index'));
    }

    public function store(Request $request)
    {
        session_start();
        $dl = new DataLayer();

        $cover_name="";

        if($request -> hasFile('cover')){
            $cover = $request -> file('cover');
            $cover_name = $cover -> getClientOriginalName();
            $cover -> move(public_path()."/images", $cover_name);
        }

        $dl->add_game($request->input('titolo'), $request->input('anno'), $request->input('software_house_id'), $cover_name, $request->input('Playtime'), $request->input('Score'), $_SESSION['user_id']);

        return \redirect(route('gioco.index'));
    }

    public function updater(Request $request, $game_id)
    {
        session_start();
        $dl = new DataLayer();

        $cover_name="";

        if($request -> hasFile('cover')){
            $cover = $request -> file('cover');
            $cover_name = $cover -> getClientOriginalName();
            $cover -> move(public_path()."/images", $cover_name);
        }

        $dl->edit_game($game_id, $request->input('titolo'), $request->input('anno'), $request->input('software_house_id'), $cover_name, $request->input('Playtime'), $request->input('Score'), $_SESSION['user_id']);

        return \redirect(route('gioco.index'));
    }

    public function all(){

        session_start();

        $dl = new DataLayer();
        $games = $dl->list_all_games();

        if(isset($_SESSION['logged'])){
            return view('game.allGames') -> with('logged', true) -> with('username', $_SESSION['username']) -> with('games', $games);
        } else {
            return view('game.allGames') -> with('logged', false) -> with('games', $games);
        }

    }
}
