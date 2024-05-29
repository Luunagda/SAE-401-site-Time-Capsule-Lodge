<?php
namespace controllers;
    class Main extends \app\Controller{
        /**
        * Cette méthode affiche la page principale
        *
        * @return void
        */
        public function index(){
        // On garde la structure avec une variable $main pour anticiper un éventuel besoin
            $main = array();
            $this->loadModel('Articles');
            $main = $this->Articles->accueil('oui');
            $lien['css'][]='/assets/css/main.css';
            $lien['js'][]='/assets/js/caroussel.js';
            $lien['js'][]='/assets/js/catalogue.js';
            // On envoie les données à la vue index
            $this->render('index', compact('main'),$lien);
    }
}
?>