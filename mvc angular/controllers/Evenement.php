<?php
namespace controllers;
class Evenement extends \app\Controller{
    /**
    * Cette méthode affiche la liste des articles
    *
    * @return void
    */
    // fonction index avant filtre au cas où c'est cassé
    public function index(){
    // On instancie le modèle "Articles"
    $this->loadModel('Articles');
    // On stocke la liste des articles dans $articles
    
    $articles = $this->Articles->join(1);
    $lien['css'][]='/assets/css/catalogue.css';
    $lien['js'][]='/assets/js/catalogue.js';
    //$articles = $this->Articles->join();
    // On affiche les données   
    // On envoie les données à la vue index
    $this->render('index', compact('articles'),$lien);
    }
    

    public function filtre() {
        // On instancie le modèle "Articles"
        
        $this->loadModel('Articles');
        // Récupérer les paramètres du filtre depuis la requête
        $prix = $_POST['prix'] ??  []; // Tableau des valeurs d'intervalle de prix sélectionnées
        $epoques = $_POST['epoque'] ?? []; // Tableau des valeurs d'intervalle d'époque sélectionnées
        $id_lieu = $_POST['lieu_id'] ?? [];
        $type = $_POST['type_chambre'] ?? [];
        // Appeler la méthode de filtre dans le modèle Articles
        //var_dump($articles);
        $articles = $this->Articles->filtre($prix, $epoques, $id_lieu, 1, $type);
        //var_dump($articles);
        //$lieu = $this->Lieu->filtre_lieu();
        $lien['js'][]='/assets/js/catalogue.js';
        $lien['css'][]='/assets/css/catalogue.css';
        // On envoie les données à la vue index
        $this->render('index', compact('articles'),$lien);
        
    }
    
        /**
    * Méthode permettant d'afficher un article à partir de son slug
    *
    * @param string $slug
    * @return void
    */
    public function lire(string $slug){
        // On instancie le modèle "Article"
        $this->loadModel('Articles');
        // On stocke l'article dans $article
        $articles = $this->Articles->findBySlug($slug);
        $lien['css'][]='/assets/css/lire.css';
        $lien['js'][]='/assets/js/lire.js';
        // On envoie les données à la vue lire
        $this->render('lire', compact('articles'),$lien);
        }
    
}
?>