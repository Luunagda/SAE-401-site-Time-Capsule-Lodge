<?php
namespace controllers;
class Angular extends \app\Controller{
    /**
    * Cette méthode affiche la liste des angular
    *
    * @return void
    */
    public function index(){
        $this->loadModel('Angular');
        // On stocke la liste des angular dans $angular
        $angular = $this->Angular->accueil('oui');
    // On envoie les données à la vue index
    $this->renderjson('index',compact('angular'));
    }
    public function epoque() {
        // On instancie le modèle "angular"
        
        $this->loadModel('Angular');
        // Récupérer les paramètres du filtre depuis la requête
        // Appeler la méthode de filtre dans le modèle angular
        //var_dump($angular);
        $angular = $this->Angular->join(2);
        // On envoie les données à la vue index
        $this->renderjson('index', compact('angular'));
        
    }
    public function evenement() {
        // On instancie le modèle "angular"
        
        $this->loadModel('Angular');
        // Récupérer les paramètres du filtre depuis la requête
        // Appeler la méthode de filtre dans le modèle angular
        //var_dump($angular);
        $angular = $this->Angular->join(1);
        // On envoie les données à la vue index
        $this->renderjson('index', compact('angular'));
        
    }
    
    public function filtreEpoque() {
        // On instancie le modèle "angular"
        
        $this->loadModel('Angular');
        // Récupérer les paramètres du filtre depuis la requête
        $prix = $_POST['prix'] ??  []; // Tableau des valeurs d'intervalle de prix sélectionnées
        $epoques = $_POST['epoque'] ?? []; // Tableau des valeurs d'intervalle d'époque sélectionnées
        $id_lieu = $_POST['lieu_id'] ?? [];
        $type = $_POST['type_chambre'] ?? [];
        // Appeler la méthode de filtre dans le modèle angular
        //var_dump($angular);
        $angular = $this->Angular->filtre($prix, $epoques, $id_lieu, 2, $type);
        //var_dump($angular);
        //$lieu = $this->Lieu->filtre_lieu();

        // On envoie les données à la vue index
        $this->renderjson('index', compact('angular'));
        
    }
    public function lieu(){
        // On instancie le modèle "angular"
        $this->loadModel('Angular');
        
        // On stocke la liste des angular dans $angular
        $angular = $this->Angular->orderbyannee();
        // On affiche les données
        // On envoie les données à la vue index
        $this->renderjson('index', compact('angular'));
        }
        
        public function filtre_lieu() {
            // On instancie le modèle "angular"
            
            $this->loadModel('Angular');
            // Récupérer les paramètres du filtre depuis la requête
            $id_lieu = $_POST['lieu'] ?? [];
            // Appeler la méthode de filtre dans le modèle angular
            //var_dump($angular);
            $angular = $this->Angular->filtre_lieu($id_lieu);
            //$lieu = $this->Lieu->filtre_lieu();
            
            // On envoie les données à la vue index
            $this->renderjson('index', compact('angular'));
            
        }
        /**
    * Méthode permettant d'afficher un article à partir de son slug
    *
    * @param string $slug
    * @return void
    */
    public function lire(string $slug){
        // On instancie le modèle "Article"
        $this->loadModel('Angular');
        // On stocke l'article dans $article
        $angular = $this->Angular->findBySlug($slug);
        // On envoie les données à la vue lire
        $this->renderjson('lire', compact('angular'));
        }
}
?>