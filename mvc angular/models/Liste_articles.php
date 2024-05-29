<?php
//Notre site web n'enregistre pas les données dans les formulaires dates en base
namespace models;
class Liste_articles extends \app\Model{
    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->table = "liste_articles";
    
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
    public function insert($date_depart, $date_arrivee, $prix_unitaire, $commande_id, $articles_id){
        try{
            $stmt = $this->_connexion->stmt_init();
            $stmt->prepare("INSERT INTO ".$this->table." (date_depart, date_arrivee, prix_unitaire, commande_id, articles_id) VALUES (?,?,?,?,?)");
            $stmt->bind_param("ssiii", $date_depart, $date_arrivee, $prix_unitaire, $commande_id, $articles_id);
            
            if($stmt->execute() === false){
                throw new \Exception("dommage : ".$stmt->error);
            }   
            return $stmt->affected_rows; 
        }   
        catch(\Exception $e){
            return $e->getMessage();
        }
        
    }

    public function update($id, $date_depart, $date_arrivee, $prix_unitaire, $commande_id, $articles_id){//mise à jour
        try{
            $stmt = $this->_connexion->stmt_init();
            $stmt->prepare("update ".$this->table." SET date_depart=?, date_arrivee=?, prix_unitaire=?, commande_id=?, articles_id=? WHERE id=?");
            $stmt->bind_param("ssiiii", $date_depart, $date_arrivee, $prix_unitaire, $commande_id, $articles_id, $id);
            if($stmt->execute() === false){
                throw new \Exception("dommage : ".$stmt->error);
            }
            return $stmt->affected_rows;

        }
        catch(\Exception $e){
            var_dump($_POST);
            die("**************************".$e->getMessage());
            return $e->getMessage();
        }
        
    }
    
    
    public function findBySlug($slug){
        $sql = "SELECT * FROM ".$this->table." WHERE `slug`='".$slug."'";
        $query = $this->_connexion->query($sql);
        return $query->fetch_assoc();
    }
}
?>