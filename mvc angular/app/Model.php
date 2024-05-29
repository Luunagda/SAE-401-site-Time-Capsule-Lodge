<?php
namespace app;
abstract class Model{
    // Informations de la base de données
    private $host = "localhost";
    private $db_name = "mvc_lite";
    private $username = "root";
    private $password = "";
    // Propriété qui contiendra l'instance de la connexion
    protected $_connexion;
    // Propriétés permettant de personnaliser les requêtes
    public $table;
    public $id;
    /**
    * Fonction d'initialisation de la base de données
    *
    * @return void
    */
    public function getConnection(){
        // On supprime la connexion précédente
        $this->_connexion = null;
        // On essaie de se connecter à la base
        try{
            $this->_connexion = new \mysqli($this->host, $this->username, $this->password, $this->db_name);
            $this->_connexion->set_charset("utf8");
        }catch(\mysqli_sql_exception $exception){
            echo "Erreur de connexion : " . $exception->getMessage();
        }
        
    }
    /**
    * Méthode permettant d'obtenir un enregistrement de la table choisie en fonction d'un id
    *
    * @return void
    */
    public function getOne(){
        /*$sql = "SELECT * FROM `".$this->table."`
        WHERE `id`=".$this->id;
        $query = $this->_connexion->query($sql);
        return $query->fetch_assoc();
        */
        $stmt = $this->_connexion->stmt_init();
        $stmt->prepare("select * from ".$this->table." where `id`= ?"); // _{$this->table}
        $stmt->bind_param("s",$id);
        $id = $this->id;
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        $result = $stmt_result->fetch_assoc();
        return $result;

    }
    /**
    * Méthode permettant d'obtenir tous les enregistrements de la table choisie
    *
    * @return void
    */
    public function getAll(){
        /*
        $sql = "SELECT * FROM `{$this->table}`";
        $query = $this->_connexion->query($sql);
        var_dump($query->fetch_all(MYSQLI_ASSOC));
        return $query->fetch_all(MYSQLI_ASSOC);
        */
        $stmt = $this->_connexion->stmt_init();
        $stmt->prepare("select * from ".$this->table);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        $result = $stmt_result->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    

    
}



?>