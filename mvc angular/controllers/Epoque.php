<?php
namespace controllers;
class Epoque extends \app\Controller{
    /**
    * Cette méthode affiche la liste des articles
    *
    * @return void
    */
    public function index(){
    // On instancie le modèle "Articles"
    $this->loadModel('Articles');
    // On stocke la liste des articles dans $articles
    $articles = $this->Articles->join(2);
    
    // On envoie les données à la vue index
    $this->render('index', compact('articles'));
    }

    public function filtre() {
        // On instancie le modèle "Articles"
        
        $this->loadModel('Angular');
        // Récupérer les paramètres du filtre depuis la requête
        $prix = $_POST['prix'] ??  []; // Tableau des valeurs d'intervalle de prix sélectionnées
        $epoques = $_POST['epoque'] ?? []; // Tableau des valeurs d'intervalle d'époque sélectionnées
        $id_lieu = $_POST['lieu_id'] ?? [];
        $type = $_POST['type_chambre'] ?? [];
        // Appeler la méthode de filtre dans le modèle angular
        //var_dump($angular);
        $angular = $this->Angular->filtre($prix, $epoques, $id_lieu, 2, $type);
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
        $lien['css'][]='/assets/css/lire.css';
        $lien['js'][]='/assets/js/lire.js';
        // On envoie les données à la vue lire
        $this->render('lire', compact('angular'));
        }
    
}
?>