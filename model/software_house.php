<?php
class software_house{
    private $software_house_id;
    private $user_id;
    private $nome;

    public function __construct($id, $user_id, $nome){
        $this->software_house_id = $id;
        $this->user_id = $user_id;
        $this->nome = $nome;
    }

    public function get_id(){
        return $this->software_house_id;
    }

    public function set_id($id){
        $this->software_house_id = $id;
    }

    public function get_nome(){
        return $this->nome;
    }

    public function set_nome($nome){
        $this->nome = $nome;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }
}
?>