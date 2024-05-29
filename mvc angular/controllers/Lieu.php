<?php
namespace controllers;
class Lieu extends \app\Controller{
    /**
    * Cette méthode affiche la liste des articles
    *
    * @return void
    */
    public function index(){
    // On instancie le modèle "Articles"
    $this->loadModel('Articles');
    
    // On stocke la liste des articles dans $articles
    $articles = $this->Articles->orderbyannee();
    // On affiche les données
    $lien['css'][]='/assets/css/frise.css';
    $lien['js'][]='/assets/js/catalogue.js';
    // On envoie les données à la vue index
    $this->render('index', compact('articles'),$lien);
    }
    
    public function filtre_lieu() {
        // On instancie le modèle "Articles"
        
        $this->loadModel('Articles');
        // Récupérer les paramètres du filtre depuis la requête
        $id_lieu = $_POST['lieu'] ?? [];
        // Appeler la méthode de filtre dans le modèle Articles
        //var_dump($articles);
        $articles = $this->Articles->filtre_lieu($id_lieu);
        //$lieu = $this->Lieu->filtre_lieu();
        $lien['css'][]='/assets/css/frise.css';
        $lien['js'][]='/assets/js/catalogue.js';
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