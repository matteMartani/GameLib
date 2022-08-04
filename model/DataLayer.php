<?php 
// classe che interagisce col database, conterrá tutti i metodi per l'interazione
class DataLayer{
    // come mi connetto a mySQL? uso delle istruzioni specifiche (approccio ORM del php)

    public function db_connect(){
        $USERNAME = "administrator";
        $PASSWORD = "password";
        $HOST = "localhost:8889";
        $DB_NAME = "Gamelib";

        $connection = mysqli_connect($HOST, $USERNAME, $PASSWORD, $DB_NAME) 
        or die("errore nella connessione al database".mysqli_error());

        return $connection;
    }

    // software houses

    public function list_software_houses($user_id){

        $connection = $this -> db_connect();
        $sql = "SELECT * FROM software_house WHERE user_id = " .$user_id. " ORDER BY software_house_id";

        $risposta = mysqli_query($connection, $sql) 
        or die("errore nell'esecuzione di una query".mysqli_error());

        mysqli_close($connection);

        $software_houses = array();
        while($riga = mysqli_fetch_array($risposta)){
            $software_houses[] = new software_house($riga['software_house_id'], $riga['user_id'], $riga['nome']);
        }
        return $software_houses;
    }

    public function delete_software_house($software_house_id){

        $connection = $this -> db_connect();
        $sql = "DELETE FROM software_house WHERE software_house_id='".$software_house_id."'";

        mysqli_query($connection, $sql)
        or die("errore nell'esecuzione di una query".mysqli_error());

        mysqli_close($connection);
    }

    public function edit_software_house($software_house_id, $nome){

        $connection = $this->db_connect();

        $sql="UPDATE software_house SET nome='".$nome."' WHERE software_house_id='".$software_house_id."'";

        mysqli_query($connection, $sql)
        or die("errore nella modifica della software house".mysqli_error());
        mysqli_close($connection);

    }

    public function add_software_house($name, $user_id){

        $connection = $this->db_connect();

        $sql="INSERT INTO software_house (nome, user_id) VALUES ('". $name . "', '". $user_id . "')";
        
        mysqli_query($connection, $sql)
        or die("errore nell'inserimento di un gioco".mysqli_error());
        mysqli_close($connection);
    }

    public function find_software_house_by_id($software_house_id){

        $connection = $this -> db_connect();
        $sql = "SELECT * FROM software_house WHERE software_house_id='".$software_house_id."'";

        $risposta = mysqli_query($connection, $sql)
        or die("errore nell'esecuzione della query che ricerca le software house per id".mysqli_error());


        mysqli_close($connection);


        $riga = mysqli_fetch_array($risposta);

        return new software_house($software_house_id, $riga['user_id'], $riga['nome']);
    }


    // games

    public function list_games($user_id){

        $connection = $this -> db_connect();
        $sql = "SELECT * FROM gioco WHERE user_id ='" .$user_id."'";

        $risposta = mysqli_query($connection, $sql) 
        or die("errore nell'esecuzione della query che ricerca i giochi".mysqli_error( $connection));

        mysqli_close($connection);

        $games = array();
        while($riga = mysqli_fetch_array($risposta)){
            $games[] = new gioco($riga['game_id'], $riga['titolo'], $riga['anno'], $riga['software_house_id'], $riga['cover'],
                $riga['playtime'], $riga['score'], $riga['user_id']);
        }
        return $games;
    }

    public function list_all_games(){

        $connection = $this -> db_connect();
        $sql = "SELECT * FROM gioco";

        $risposta = mysqli_query($connection, $sql)
        or die("errore nell'esecuzione di una query".mysqli_error());

        mysqli_close($connection);

        $games = array();
        while($riga = mysqli_fetch_array($risposta)){
            $games[] = new gioco($riga['game_id'], $riga['titolo'], $riga['anno'], $riga['software_house_id'], $riga['cover'],
                $riga['playtime'], $riga['score'], $riga['user_id']);
        }
        return $games;
    }

    public function find_games_by_softwareHouseID($software_house_id){

        $connection = $this -> db_connect();
        $sql = "SELECT * FROM gioco WHERE software_house_id='".$software_house_id."'";

        $risposta = mysqli_query($connection, $sql) 
        or die("errore nell'esecuzione della query che ricerca i giochi per sh_id".mysqli_error());

        if(mysqli_affected_rows($connection)!=0) {
            return true;
        } else{
            return false;
        }

        mysqli_close($connection);
    }

    public function find_game_by_ID($game_id){

        $connection = $this -> db_connect();
        $sql = "SELECT * FROM gioco WHERE game_id='".$game_id."'";

        $risposta = mysqli_query($connection, $sql) 
        or die("errore nell'esecuzione della query che ricerca i giochi per id".mysqli_error());

        mysqli_close($connection);

        
        $riga = mysqli_fetch_array($risposta);
        
        return new gioco($riga['game_id'], $riga['titolo'], $riga['anno'], $riga['software_house_id'],
            $riga['cover'], $riga['playtime'], $riga['score'], $riga['user_id']);
    }

    public function add_game($titolo, $anno, $software_house_id, $cover, $playtime, $score, $user_id){

        $connection = $this->db.connect();
        $sql = "INSERT INTO gioco (titolo, anno, software_house_id, cover, playtime, score, user_id) "
        . "VALUES ('" . $titolo . "','" . $anno . "','" . $software_house_id . "','" . $cover .
            "','" . $playtime . "','" . $score . "','" . $user_id . "')";
        
        $risposta = mysqli_query($connection, $sql) 
        or die("errore nell'inserimento di un gioco".mysqli_error());
        mysqli_close($connection);
    }

    // users
    public function list_users(){

        $connection = $this -> db_connect();
        $sql = "SELECT * FROM user";

        $risposta = mysqli_query($connection, $sql) 
        or die("errore nell'esecuzione di una query".mysqli_error());

        mysqli_close($connection);

        $users = array();
        while($riga = mysqli_fetch_array($risposta)){
            $users[] = new user($riga['user_id'], $riga['username'], $riga['mail'], $riga['password']);
        }
        return $users;
    }

    public function validUser($username, $password)
    {

        $connection = $this->db_connect();
        $sql = "SELECT password FROM user WHERE username='" . $username . "'";

        $risposta = mysqli_query($connection, $sql) or die("errore nell'esecuzione di una query che valida l'utente" . mysqli_error());

        if (mysqli_affected_rows($connection) != 0) {
            $riga = mysqli_fetch_array($risposta);
            if ($riga['password'] == md5($password)) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function getUserID($username)
    {
        $connection = $this->db_connect();
        $sql = "SELECT user_id FROM user WHERE username='" . $username . "'";

        $risposta = mysqli_query($connection, $sql)
        or die("errore nell'esecuzione della query che ricerca lo username dell'utente" . mysqli_error());

        if (mysqli_affected_rows($connection) != 0) {
            $riga = mysqli_fetch_array($risposta);
            return $riga['user_id'];
        }
    }


    public function addUser($username, $mail, $password){

        $connection = $this->db_connect();
        $sql = "INSERT INTO user (username, mail, password) VALUES ('" . $username .
            "','" . $mail . "','" . md5($password) . "')";

        mysqli_query($connection, $sql) or die("errore inserimento di un utente".mysqli_error());
        mysqli_close($connection);
    }

}
?>