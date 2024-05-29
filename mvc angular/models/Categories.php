<?php
//Notre site web n'enregistre pas les données dans les formulaires dates en base
namespace models;
class Categories extends \app\Model{
    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->table = "categories";
    
        // Nous ouvrons la connexion à la base de données
        $this->getConnection();
    }
        /**
    * Retourne un article en fonction de son slug
    *
    * @param string $slug
    * @return void
    */
    //joindre deux table
    
    
//supprimer
    public function delete($id){
        $stmt = $this->_connexion->stmt_init();
        $stmt->prepare("delete from ".$this->table." where id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        return $stmt_result;
        }
    //insérer
    public function insert($nom){
        try {
            $stmt = $this->_connexion->stmt_init();
            $stmt->prepare("INSERT INTO ".$this->table." (nom) VALUES (?)");
            $stmt->bind_param("s", $nom);
            $stmt->execute();
            if($stmt->error){
                throw new \Exception($stmt->error);
            }
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
        $stmt_result = $stmt->get_result();
        return $stmt_result;
    }

    public function update($id, $nom){//mise à jour
        $stmt = $this->_connexion->stmt_init();
        $stmt->prepare("update ".$this->table." SET nom=? WHERE id=?");
        $stmt->bind_param("si", $nom, $id);
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