<?php
//Notre site web n'enregistre pas les données dans les formulaires dates en base
namespace models;
class Commandes extends \app\Model{
    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->table = "commande";
    
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
    public function insert($statut, $date, $utilisateur_id){
        $stmt = $this->_connexion->stmt_init();
        $stmt->prepare("INSERT INTO ".$this->table." (statut, date, utilisateur_id) VALUES (?,?,?)");
        $stmt->bind_param("ssi", $statut, $date, $utilisateur_id);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        return $stmt_result;
    }

    public function update($id, $statut, $date, $utilisateur_id){//mise à jour
        $stmt = $this->_connexion->stmt_init();
        $stmt->prepare("update ".$this->table." SET statut=?, date=?, utilisateur_id=? WHERE id=?");
        $stmt->bind_param("ssii", $statut, $date, $utilisateur_id, $id);
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