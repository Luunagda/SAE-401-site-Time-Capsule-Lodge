<?php
namespace controllers;
class Formulaire extends \app\Controller{
    /**
    * Cette méthode affiche la liste des articles
    *
    * @return void
    */
    public function index(){
    // On instancie le modèle "Articles"
    $this->loadModel('Articles');
    // On stocke la liste des articles dans $articles
    $articles = $this->Articles->getAll();
    // On affiche les données
    $lien['js'][]='/assets/js/verifications.js';
    $lien['css'][]='/assets/css/formulaire.css';
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
        // On envoie les données à la vue lire
       
        $this->render('lire', compact('articles'));
        }
    
}
?>