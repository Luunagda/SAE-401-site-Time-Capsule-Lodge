<?php
//Notre site web n'enregistre pas les données dans les formulaires dates en base
namespace models;
class Articles extends \app\Model{
    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->table = "articles";
        $this->table_lieu = "lieu";
        $this->table_chambre = "chambre";
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
    public function join($categories_id){
        $stmt = $this->_connexion->stmt_init();
        $stmt->prepare("SELECT * FROM `{$this->table}` INNER JOIN `{$this->table_lieu}` ON (id_lieu=lieu_id) where `categories_id`= ?");
        $stmt->bind_param("i", $categories_id);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        $result = $stmt_result->fetch_all(MYSQLI_ASSOC);
        return $result;
        
    }
//de Camille
    public function categorie($id_categorie){
        $stmt = $this->_connexion->stmt_init();
        if(intval($id_categorie)>0){
            $stmt->prepare("SELECT * FROM `{$this->table}` INNER JOIN `{$this->table_lieu}` ON (id_lieu=lieu_id) where `categories_id`= ?");
            $stmt->bind_param("i", $categories_id);
        } else {
            $stmt->prepare("SELECT * FROM `{$this->table}` INNER JOIN `{$this->table_lieu}` ON (id_lieu=lieu_id) where categories_id in (select `id` from `categories` where `nom`= ?)");
            $stmt->bind_param("s", $id_categorie);
        }
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        $result = $stmt_result->fetch_all(MYSQLI_ASSOC);
        return $result;
        
    }

    public function findBySlug(string $slug){
        /*$sql = "SELECT * FROM `".$this->table."` WHERE `slug`='".$slug."'";
        $query = $this->_connexion->query($sql);
        return $query->fetch_assoc();
        */
        $stmt = $this->_connexion->stmt_init();
        $stmt->prepare("select * from ".$this->table." INNER JOIN `{$this->table_chambre}` ON (id_chambre=chambre_id) where `slug`= ?");
        $stmt->bind_param("s", $slug);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        $result = $stmt_result->fetch_assoc();
        return $result;
        }
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
    public function insert($titre, $contenu, $slug, $alt, $image, $prix, $categorie, $lieu, $accueil, $css, $annee, $chambre, $id_chambre){
        $stmt = $this->_connexion->stmt_init();
        $stmt->prepare("INSERT INTO ".$this->table." (titre,contenu,slug,alt,image,prix,categories_id,lieu_id,accueil,css,annee,type_chambre,chambre_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssiiissisi", $titre, $contenu, $slug, $alt, $image, $prix, $categorie, $lieu, $accueil, $css, $annee, $chambre, $id_chambre);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        return $stmt_result;
    }

    public function update($id, $titre, $contenu, $slug, $image, $alt, $prix, $categorie, $lieu, $accueil, $css, $annee, $chambre, $id_chambre){//mise à jour
        $stmt = $this->_connexion->stmt_init();
        $stmt->prepare("update ".$this->table." SET titre=?, contenu=?, slug=?, image=?, alt=?, prix=?, categories_id=?, lieu_id=?, accueil=?, css=?, annee=?, type_chambre=?, chambre_id=? WHERE id=?");
        $stmt->bind_param("sssssiiissisii", $titre, $contenu, $slug, $image, $alt, $prix, $categorie, $lieu, $accueil, $css, $annee, $chambre, $id_chambre, $id);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        return $stmt_result;
    }
    
    
    public function accueil($test){
        $stmt = $this->_connexion->stmt_init();
        $stmt->prepare("select * from ".$this->table." where `accueil`= ?");
        $stmt->bind_param("s", $test);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        $result = $stmt_result->fetch_all(MYSQLI_ASSOC);
        return $result;
    }
    public function filtre_lieu($lieu){//filtre ne fonction du lieu
        $stmt = $this->_connexion->stmt_init();
        var_dump($lieu);
        foreach ($lieu as $endroit) {
        $stmt->prepare("select * from ".$this->table." INNER JOIN `{$this->table_lieu}` ON (id_lieu=lieu_id) where `Nom`= ? order by annee");
        $stmt->bind_param("s", $endroit);
        
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        $result = $stmt_result->fetch_all(MYSQLI_ASSOC);
        }

        return $result;
    }
    
    public function filtre($prix, $epoques, $lieu, $categories_id, $type) {//filtre en fonction de toutes les caractéristique
        $stmt = $this->_connexion->stmt_init();
        $result = array(); // Tableau pour stocker les résultats
        if (!empty($prix) && !empty($epoques) && !empty($lieu) && !empty($type)) {
            foreach ($prix as $prixInterval) {
                $prixIntervalParts = explode('-', $prixInterval);
                $minPrice = $prixIntervalParts[0];
                $maxPrice = $prixIntervalParts[1];
                
                foreach ($epoques as $epoqueInterval) {
                    $epoqueIntervalParts = explode('/', $epoqueInterval);
                    $startYear = $epoqueIntervalParts[0];
                    $endYear = $epoqueIntervalParts[1];
                    
                    foreach ($lieu as $endroit) {
                        foreach ($type as $chambre) {
                        $stmt->prepare("SELECT * FROM ".$this->table." where `categories_id`= ? AND prix BETWEEN ? AND ? AND annee BETWEEN ? AND ? AND lieu_id = ? AND type_chambre = ?");
                        $stmt->bind_param("iiiiiis", $categories_id, $minPrice, $maxPrice, $startYear, $endYear, $endroit, $chambre);
                        $stmt->execute();
                        $stmt_result = $stmt->get_result();
                        $result = array_merge($result, $stmt_result->fetch_all(MYSQLI_ASSOC));
                        }
                    }
                }
            }
        } else if (!empty($prix) && !empty($epoques) && !empty($lieu)) {
            foreach ($prix as $prixInterval) {
                $prixIntervalParts = explode('-', $prixInterval);
                $minPrice = $prixIntervalParts[0];
                $maxPrice = $prixIntervalParts[1];
                
                foreach ($epoques as $epoqueInterval) {
                    $epoqueIntervalParts = explode('/', $epoqueInterval);
                    $startYear = $epoqueIntervalParts[0];
                    $endYear = $epoqueIntervalParts[1];
                    
                    foreach ($lieu as $endroit) {
                        $stmt->prepare("SELECT * FROM ".$this->table." where `categories_id`= ? AND prix BETWEEN ? AND ? AND annee BETWEEN ? AND ? AND lieu_id = ?");
                        $stmt->bind_param("iiiiii", $categories_id, $minPrice, $maxPrice, $startYear, $endYear, $endroit);
                        $stmt->execute();
                        $stmt_result = $stmt->get_result();
                        $result = array_merge($result, $stmt_result->fetch_all(MYSQLI_ASSOC));
                    }
                }
            }
        }else if (!empty($prix) && !empty($epoques) && !empty($type)) {
            foreach ($prix as $prixInterval) {
                $prixIntervalParts = explode('-', $prixInterval);
                $minPrice = $prixIntervalParts[0];
                $maxPrice = $prixIntervalParts[1];
                
                foreach ($epoques as $epoqueInterval) {
                    $epoqueIntervalParts = explode('/', $epoqueInterval);
                    $startYear = $epoqueIntervalParts[0];
                    $endYear = $epoqueIntervalParts[1];
                    
                    foreach ($type as $chambre) {
                        $stmt->prepare("SELECT * FROM ".$this->table." where `categories_id`= ? AND prix BETWEEN ? AND ? AND annee BETWEEN ? AND ? AND type_chambre = ?");
                        $stmt->bind_param("iiiiis", $categories_id, $minPrice, $maxPrice, $startYear, $endYear, $chambre);
                        $stmt->execute();
                        $stmt_result = $stmt->get_result();
                        $result = array_merge($result, $stmt_result->fetch_all(MYSQLI_ASSOC));
                    }
                }
            }
        } else if (!empty($prix) && !empty($type) && !empty($lieu)) {
            foreach ($prix as $prixInterval) {
                $prixIntervalParts = explode('-', $prixInterval);
                $minPrice = $prixIntervalParts[0];
                $maxPrice = $prixIntervalParts[1];
                
                foreach ($type as $chambre) {
                    
                    foreach ($lieu as $endroit) {
                        $stmt->prepare("SELECT * FROM ".$this->table." where `categories_id`= ? AND prix BETWEEN ? AND ? AND type_chambre = ? AND lieu_id = ?");
                        $stmt->bind_param("iiisi", $categories_id, $minPrice, $maxPrice, $chambre,$endroit);
                        $stmt->execute();
                        $stmt_result = $stmt->get_result();
                        $result = array_merge($result, $stmt_result->fetch_all(MYSQLI_ASSOC));
                    }
                }
            }
        } else if (!empty($type) && !empty($epoques) && !empty($lieu)) {
            foreach ($type as $chambre) {
                
                foreach ($epoques as $epoqueInterval) {
                    $epoqueIntervalParts = explode('/', $epoqueInterval);
                    $startYear = $epoqueIntervalParts[0];
                    $endYear = $epoqueIntervalParts[1];
                    
                    foreach ($lieu as $endroit) {
                        $stmt->prepare("SELECT * FROM ".$this->table." where `categories_id`= ? AND type_chambre = ? AND annee BETWEEN ? AND ? AND lieu_id = ?");
                        $stmt->bind_param("isiii", $categories_id, $chambre, $startYear, $endYear, $endroit);
                        $stmt->execute();
                        $stmt_result = $stmt->get_result();
                        $result = array_merge($result, $stmt_result->fetch_all(MYSQLI_ASSOC));
                    }
                }
            }
        } else if (!empty($prix) && !empty($epoques)) {
            foreach ($prix as $prixInterval) {
                $prixIntervalParts = explode('-', $prixInterval);
                $minPrice = $prixIntervalParts[0];
                $maxPrice = $prixIntervalParts[1];
                
                foreach ($epoques as $epoqueInterval) {
                    $epoqueIntervalParts = explode('/', $epoqueInterval);
                    $startYear = $epoqueIntervalParts[0];
                    $endYear = $epoqueIntervalParts[1];
                    
                    $stmt->prepare("SELECT * FROM ".$this->table." where`categories_id`= ? AND prix BETWEEN ? AND ? AND annee BETWEEN ? AND ?");
                    $stmt->bind_param("iiiii", $categories_id, $minPrice, $maxPrice, $startYear, $endYear);
                    $stmt->execute();
                    $stmt_result = $stmt->get_result();
                    $result = array_merge($result, $stmt_result->fetch_all(MYSQLI_ASSOC));
                }
            }
        } else if (!empty($prix) && !empty($lieu)) {
            foreach ($prix as $prixInterval) {
                $prixIntervalParts = explode('-', $prixInterval);
                $minPrice = $prixIntervalParts[0];
                $maxPrice = $prixIntervalParts[1];
                
                foreach ($lieu as $endroit) {                    
                    $stmt->prepare("SELECT * FROM ".$this->table." where`categories_id`= ? AND prix BETWEEN ? AND ? AND lieu_id = ?");
                    $stmt->bind_param("iiii", $categories_id, $minPrice, $maxPrice, $endroit);
                    $stmt->execute();
                    $stmt_result = $stmt->get_result();
                    $result = array_merge($result, $stmt_result->fetch_all(MYSQLI_ASSOC));
                }
            }
        } else if (!empty($lieu) && !empty($epoques)) {
            foreach ($epoques as $epoqueInterval) {
                $epoqueIntervalParts = explode('/', $epoqueInterval);
                $startYear = $epoqueIntervalParts[0];
                $endYear = $epoqueIntervalParts[1];

                foreach ($lieu as $endroit) {
                    $stmt->prepare("SELECT * FROM ".$this->table." where`categories_id`= ? AND lieu_id = ? AND annee BETWEEN ? AND ?");
                    $stmt->bind_param("iiii", $categories_id, $endroit, $startYear, $endYear);
                    $stmt->execute();
                    $stmt_result = $stmt->get_result();
                    $result = array_merge($result, $stmt_result->fetch_all(MYSQLI_ASSOC));
                }
            }
        }else if (!empty($type) && !empty($epoques)) {
            foreach ($epoques as $epoqueInterval) {
                $epoqueIntervalParts = explode('/', $epoqueInterval);
                $startYear = $epoqueIntervalParts[0];
                $endYear = $epoqueIntervalParts[1];

                foreach ($type as $chambre) {
                    $stmt->prepare("SELECT * FROM ".$this->table." where`categories_id`= ? AND type_chambre = ? AND annee BETWEEN ? AND ?");
                    $stmt->bind_param("isii", $categories_id, $chambre, $startYear, $endYear);
                    $stmt->execute();
                    $stmt_result = $stmt->get_result();
                    $result = array_merge($result, $stmt_result->fetch_all(MYSQLI_ASSOC));
                }
            }
        }else if (!empty($lieu) && !empty($type)) {
            foreach ($type as $chambre) {
            
                foreach ($lieu as $endroit) {
                    $stmt->prepare("SELECT * FROM ".$this->table." where`categories_id`= ? AND lieu_id = ? AND type_chambre = ?");
                    $stmt->bind_param("iis", $categories_id, $endroit, $chambre);
                    $stmt->execute();
                    $stmt_result = $stmt->get_result();
                    $result = array_merge($result, $stmt_result->fetch_all(MYSQLI_ASSOC));
                }
            }
        }else if (!empty($prix) && !empty($type)) {
            foreach ($prix as $prixInterval) {
                $prixIntervalParts = explode('-', $prixInterval);
                $minPrice = $prixIntervalParts[0];
                $maxPrice = $prixIntervalParts[1];

                foreach ($type as $chambre) {
                    $stmt->prepare("SELECT * FROM ".$this->table." where`categories_id`= ? AND type_chambre = ? AND prix BETWEEN ? AND ?");
                    $stmt->bind_param("isii", $categories_id, $chambre, $minPrice, $maxPrice);
                    $stmt->execute();
                    $stmt_result = $stmt->get_result();
                    $result = array_merge($result, $stmt_result->fetch_all(MYSQLI_ASSOC));
                }
            }
        } else if (!empty($prix)) {
            foreach ($prix as $prixInterval) {
                $prixIntervalParts = explode('-', $prixInterval);
                $minPrice = $prixIntervalParts[0];
                $maxPrice = $prixIntervalParts[1];
                
                $stmt->prepare("SELECT * FROM ".$this->table." where`categories_id`= ? AND prix BETWEEN ? AND ?");
                $stmt->bind_param("iii", $categories_id, $minPrice, $maxPrice);
                $stmt->execute();
                $stmt_result = $stmt->get_result();
                $result = array_merge($result, $stmt_result->fetch_all(MYSQLI_ASSOC));
            }
        } else if (!empty($epoques)) {
            foreach ($epoques as $epoqueInterval) {
                $epoqueIntervalParts = explode('/', $epoqueInterval);
                $startYear = $epoqueIntervalParts[0];
                $endYear = $epoqueIntervalParts[1];

                $stmt->prepare("SELECT * FROM ".$this->table." where`categories_id`= ? AND annee BETWEEN ? AND ?");
                $stmt->bind_param("iii", $categories_id, $startYear, $endYear);
                $stmt->execute();
                $stmt_result = $stmt->get_result();
                $result = array_merge($result, $stmt_result->fetch_all(MYSQLI_ASSOC));
            }
        } else if (!empty($lieu)) {
            foreach ($lieu as $endroit) {
                $stmt->prepare("SELECT * FROM ".$this->table." where`categories_id`= ? AND lieu_id = ?");
                $stmt->bind_param("ii", $categories_id, $endroit);
                $stmt->execute();
                $stmt_result = $stmt->get_result();
                $result = array_merge($result, $stmt_result->fetch_all(MYSQLI_ASSOC));
            }
        } else if (!empty($type)) {
            foreach ($type as $chambre) {
                $stmt->prepare("SELECT * FROM ".$this->table." where`categories_id`= ? AND type_chambre = ?");
                $stmt->bind_param("is", $categories_id, $chambre);
                $stmt->execute();
                $stmt_result = $stmt->get_result();
                $result = array_merge($result, $stmt_result->fetch_all(MYSQLI_ASSOC));
            }
        }
        
        if (!empty($result)) {
            return $result;
        }
    }
    
    public function orderbyannee(){
        $stmt = $this->_connexion->stmt_init();
        $stmt->prepare("SELECT * FROM `{$this->table}`order by annee");
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        $result = $stmt_result->fetch_all(MYSQLI_ASSOC);
        return $result;
        
    }
}
?>