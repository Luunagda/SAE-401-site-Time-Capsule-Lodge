<?php
namespace app;
abstract class Controller{

    protected bool $apimode;
    
    public function __construct($apimode = false){
        $this->apimode = $apimode;
        session_start();
    }
        /**
    * Permet de charger un modèle
    *
    * @param string $model
    * @return void
    */
    public function loadModel(string $model){
        // On va chercher le fichier correspondant au modèle souhaité
        require_once(ROOT.'models/'.$model.'.php');
        // Le modèle souhaité se trouve dans le namespace models
        $c_model = "\\models\\".$model;
        // On crée une instance de ce modèle. Ainsi "Articles" sera accessible par $this->Articles
        $this->$model = new $c_model();
        }
        /**
    * Afficher une vue
    *
    * @param string $fichier
    * @param array $data
    * @return void
    */
    public function render(string $fichier, array $data = [], array $el_additionel=[]){
        // Récupère les données et les extrait sous forme de variables
        extract($data);
        $vue="";
        if($this->apimode){
            $vue = "_api";
        }
        ob_start();
        // Crée le chemin et inclut le fichier de vue
        require_once(ROOT.'views/'.explode("\\",strtolower(get_class($this)))[1].'/'.$fichier.$vue.'.php');
        
        /*
        boucle: $css = '<link href>'
        else
        */

//if (isset($test['js'])) boucle tableau test

//Pour afficher du css ou du js uniquement pour une seule page
        $js='';
        $css='';
        
        if (isset($el_additionel['js'])){
     
            for ($i = 0; $i < count($el_additionel['js']); $i++){
          
                $js .= '<script src="'.$el_additionel['js'][$i].'"></script>'."\n";
            }
        }

        if (isset($el_additionel['css'])){
            for ($i = 0; $i < count($el_additionel['css']); $i++){
                $css .= '<link rel="stylesheet" href="'.$el_additionel['css'][$i].'">'."\n";
            }
        }


        // On stocke le contenu dans $content
        $content = ob_get_clean();

        $user = isset($_SESSION['LOGIN']) ? $_SESSION['LOGIN'] : null;

        if(isset($_SESSION['erreur'])){
            $erreur = $_SESSION['erreur'];
            unset($_SESSION['erreur']);
        } else {
            $erreur = null;
        }

        // On enlève ou met le template en fonction du mode api ou pas
        if(!$this->apimode){
            // On fabrique le "template"
            require_once(ROOT.'views/layout/default.php');
        } else {
            echo $content;
        }
    }














    public function isGranted(){
        
        if (!isset($_SESSION['LOGIN'])){
            header('Location: /login');
            die();
        }
    }
    
    public function renderjson(string $fichier, array $data = []){
        // Récupère les données et les extrait sous forme de variables
        extract($data);

        // On démarre le buffer de sortie
        ob_start();

        // Crée le chemin et inclut le fichier de vue
        require_once(ROOT.'views/'.explode("\\",strtolower(get_class($this)))[1].'/'.$fichier.'.php');
        // On stocke le contenu dans $content
    $content = ob_get_clean();

    // On fabrique le "template"
    echo($content);
        }
}
?>