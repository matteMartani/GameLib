<?php
class user{

    private $user_id;
    private $username;
    private $mail;
    private $password;

    public function __construct($user_id, $username, $mail, $password){
        $this->user_id = $user_id;
        $this->username = $username;
        $this->mail = $mail;
        $this->password = $password;

    }

    public function get_user_id(){
        return $this->user_id;
    }

    public function set_user_id($id){
        $this->user_id = $id;
    }

    public function get_username(){
        return $this->username;
    }

    public function set_username($username){
        $this->username = $username;
    }

    public function get_mail(){
        return $this->mail;
    }

    public function set_mail($mail){
        $this->mail = $mail;
    }

    public function get_password(){
        return $this->password;
    }

    public function set_password($password){
        $this->password = $password;
    }
}
?>