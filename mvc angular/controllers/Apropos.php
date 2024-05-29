<?php
namespace controllers;
class Apropos extends \app\Controller{
    /**
    * Cette méthode affiche la liste des articles
    *
    * @return void
    */
    public function index(){

    $lien['css'][]='/assets/css/Apropos.css';
    $lien['js'][]='/assets/js/catalogue.js';
    // On envoie les données à la vue index
    $this->render('index', [],$lien);
    }
}
?>