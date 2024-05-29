<?php
namespace models;
class Utilisateurs extends \app\Model{
    public function __construct()
    {
        $this->table = "utilisateur";

        $this->getConnection();
    }
    public function findByLogin($login){//trouver l'utilisateur dans la base de données
        $sql = "SELECT * FROM ".$this->table." WHERE `login`='".$login."'";
        $query = $this->_connexion->query($sql);

        return $query->fetch_assoc();
    }
    public function create($login, $passwordCrypt, $email){//créer un login et mot de passe, il s'agit de s'inscrire qui n'est pas encore utile
        $stmt = $this->_connexion->stmt_init();
        $stmt->prepare("INSERT INTO ".$this->table." (login,password,email) VALUES (?,?,?)");
        $stmt->bind_param("sss", $login, $passwordCrypt, $email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        return $stmt_result;
    }

    public function findByLoginAndEmail($login, $email){
        $sql = "SELECT * FROM ".$this->table." WHERE `login`='".$login."' OR email='".$email."'";
        $query = $this->_connexion->query($sql);

        return $query->fetch_assoc();
    }

    public function delete($id){
        $stmt = $this->_connexion->stmt_init();
        $stmt->prepare("delete from ".$this->table." where id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        return $stmt_result;
        }
    //insérer
    public function insert($login, $password, $email, $imageprofil, $adresse, $telephone){
        $stmt = $this->_connexion->stmt_init();
        $stmt->prepare("INSERT INTO ".$this->table." (login, password, email, imageprofil, adresse, telephone) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("sssssi", $login, $password, $email, $imageprofil, $adresse, $telephone);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        return $stmt_result;
    }

    public function update($id, $login, $password, $email, $imageprofil, $adresse, $telephone){//mise à jour
        $stmt = $this->_connexion->stmt_init();
        $stmt->prepare("update ".$this->table." SET login=?, password=?, email=?, imageprofil=?, adresse=?, telephone=? WHERE id=?");
        $stmt->bind_param("sssssii", $login, $password, $email, $imageprofil, $adresse, $telephone, $id);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        return $stmt_result;
    }
    
    
    public function findBySlug($slug){
        $sql = "SELECT * FROM ".$this->table." WHERE `slug`='".$slug."'";
        $query = $this->_connexion->query($sql);
        return $query->fetch_assoc();
    }
}

?>