<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;

class DataLayer extends Model
{
    use HasFactory;

    # software_houses
    public function list_all_software_houses(){
        $softwareHouses = DB::table('software_house')->get();
        return $softwareHouses;
    }

    public function list_software_houses($user_id){

        return SoftwareHouse::where('user_id', $user_id)-> orderBy('software_house_id', 'asc')->get();
    }

    public function delete_software_house($software_house_id){

        $software_house = SoftwareHouse::find($software_house_id);
        $software_house->delete();
    }

    public function edit_software_house($software_house_id, $nome){

        $software_house = SoftwareHouse::find($software_house_id);
        $software_house->nome = $nome;
        $software_house->save();
    }

    public function add_software_house($name, $user_id){

        $software_house = new SoftwareHouse();
        $software_house->nome = $name;
        $software_house->user_id = $user_id;
        $software_house->save();
    }

    public function find_software_house_by_id($software_house_id){

        return SoftwareHouse::find($software_house_id);
    }

    # games

    public function list_all_games_with_software_house(){

            $games = DB::table('gioco') ->
            join('software_house', 'software_house_id', '=', 'software_house.software_house_id')
                ->select('gioco.*', 'software_house.nome')
                ->get();
            return $games;
    }

    public function list_all_games_with_software_house_paginate(){


        $blockfactor = 10;
        $games = DB::table('gioco') ->
        join('software_house', 'software_house_id', '=', 'software_house.software_house_id')
            ->select('gioco.*', 'software_house.nome')
            ->paginate($blockfactor);
        return $games;
    }

    public function list_all_games_without_software_house(){

            $games = DB::table('gioco') ->get();
            return $games;
    }

    public function list_games($user_id){

        return Gioco::where('user_id', $user_id)->get();
    }

    public function list_all_games(){

        return Gioco::orderBy('game_id', 'asc')->get();
    }

    public function find_games_by_softwareHouseID($software_house_id, $user_id){

        $games = Gioco::where('software_house_id', $software_house_id) -> where('user_id', $user_id) -> get();

        if (count($games) == 0) {
            return false;
        }
        else{
            return true;
        }
    }

    public function has_games_array($software_houses, $user_id)
    {
        $dl = new DataLayer();
        $hasGames = [];
        foreach ($software_houses as $software_house) {
            $hasGames[] = $dl->find_games_by_softwareHouseId($software_house->software_house_id , $user_id);
        }
        return $hasGames;
    }


    public function find_game_by_ID($game_id){

        return Gioco::find($game_id);
    }

    public function list_games_by_hours(){
        return Gioco::select('user_id', DB::raw('sum(Playtime) as hours'))->groupBy('user_id')->orderBy('hours', 'desc')->paginate(10);
    }

    public function add_game($titolo, $anno, $software_house_id, $cover, $playtime, $score, $user_id){

        $game = new Gioco();
        $game->titolo = $titolo;
        $game->anno = $anno;
        $game->software_house_id = $software_house_id;
        $game->cover = $cover;
        $game->Playtime = $playtime;
        $game->Score = $score;
        $game->user_id = $user_id;
        $game->save();
    }

    public function edit_game($game_id, $titolo, $anno, $software_house_id, $cover, $playtime, $score, $user_id){

        $game = Gioco::find($game_id);
        $game->titolo = $titolo;
        $game->anno = $anno;
        $game->software_house_id = $software_house_id;
        $game->cover = $cover;
        $game->Playtime = $playtime;
        $game->Score = $score;
        $game->user_id = $user_id;
        $game->save();
    }

    public function delete_game($game_id){

        $game = Gioco::find($game_id);
        $game->delete();
    }

    // users
    public function list_users(){

        return GameUser::orderBy('user_id', 'asc')->get();
    }

    public function list_users_by_games(){
        return GameUser::withCount('games')->orderBy('games_count', 'desc')->paginate(10);
    }

    public function validUser($username, $password)
    {
        $users = GameUser::where('username', $username)->get();
        if(count($users)!=0){
            if($users[0]->password == md5($password)){
                return true;
            }
            else{
                return false;
            }
        }
        else {
            return false;
        }
    }

    public function getUserID($username)
    {
        $id = GameUser::where('username', $username)->get(['user_id']);
        return $id[0]->user_id;
    }

    public function getUserName($user_id)
    {
        $name = GameUser::where('user_id', $user_id)->get(['username']);
        return $name[0]->username;
    }


    public function addUser($username, $mail, $password){

        $user = new GameUser();
        $user->username = $username;
        $user->mail = $mail;
        $user->password = md5($password);
        $user->save();
    }

    public function checkUsername($username){
        $users = GameUser::where('username', $username)->get();
        if(count($users)!=0){
            return true;
        }
        else{
            return false;
        }
    }

    public function checkEmail($email){
        $users = GameUser::where('mail', $email)->get();
        if(count($users)!=0){
            return true;
        }
        else{
            return false;
        }
    }

    // discussions

    public function list_discussions(){

        return Discuss::orderBy('disc_id', 'asc')->get();
    }

    public function addDiscuss($user_id, $titolo, $topic){

        $discuss = new Discuss();
        $discuss->user_id = $user_id;
        $discuss->titolo = $titolo;
        $discuss->topic = $topic;
        $discuss->save();
    }

    public function list_discussion_by_posts(){
        return Discuss::withCount('posts')-> orderBy('disc_id', 'desc')->get();
    }

    public function get_discussion_from_id($disc_id){
        return Discuss::find($disc_id);
    }

    public function find_title($titolo){
        $found = Discuss::where('titolo', $titolo)->get();
        if(count($found)!=0){
            return true;
        }
        else{
            return false;
        }
    }

    // posts

    public function addPost($disc_id, $user_id, $content){

        $post = new Post();
        $post->disc_id = $disc_id;
        $post->user_id = $user_id;
        $post->content = $content;
        $post->save();
    }

    public function list_users_by_posts(){
        return GameUser::withCount('posts')->orderBy('posts_count', 'desc')->paginate(10);
    }

    public function find_software_house_by_name($name, $user_id): bool
    {
        $found = SoftwareHouse::where('nome', $name)-> where('user_id', $user_id)->get();
        if(count($found)==0){
            return false;
        }
        else{
            return true;
        }
    }


}
