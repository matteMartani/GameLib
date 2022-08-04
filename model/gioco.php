<?php
class gioco{

    private $game_id;
    private $titolo;
    private $anno;
    private $software_house_id;
    private $cover;
    private $playtime;
    private $score;
    private $user_id;

    public function __construct($game_id, $titolo, $anno, $sh_id, $cover, $playtime, $score, $user_id){
        $this->game_id = $game_id;
        $this->titolo = $titolo;
        $this->anno = $anno;
        $this->software_house_id = $sh_id;
        $this->cover = $cover;
        $this->playtime = $playtime;
        $this->score = $score;
        $this->user_id = $user_id;

    }

    public function get_sh_id(){
        return $this->software_house_id;
    }

    public function set_sh_id($id){
        $this->software_house_id = $id;
    }

    public function get_id(){
        return $this->game_id;
    }

    public function set_id($id){
        $this->game_id = $id;
    }

    public function get_titolo(){
        return $this->titolo;
    }

    public function set_titolo($titolo){
        $this->titolo = $titolo;
    }

    public function get_anno(){
        return $this->anno;
    }

    public function set_anno($anno){
        $this->anno = $anno;
    }

    public function get_cover(){
        return $this->cover;
    }

    public function set_cover($cover){
        $this->cover = $cover;
    }

    public function get_playtime(){
        return $this->playtime;
    }

    public function set_playtime($playtime){
        $this->playtime = $playtime;
    }

    public function get_score(){
        return $this->score;
    }

    public function set_score($score){
        $this->score = $score;
    }

    public function get_user_id(){
        return $this->user_id;
    }

    public function set_user_id($user_id){
        $this->user_id = $user_id;
    }
}
?>