<?php
namespace controllers;
class Backoffice extends \app\Controller{
    /**
    * Cette méthode affiche la liste des articles
    *
    * @return void
    */
    public function index(){
    $this->isGranted();
    // On instancie le modèle "Articles"
    
    // On stocke la liste des articles dans $articles
    
    // On affiche les données
    $lien['css'][]='/assets/css/backoffice.css';
    $lien['js'][]='/assets/js/catalogue.js';
    // On envoie les données à la vue index
    $this->render('index', [],$lien);
    }
        /**
    * Méthode permettant d'afficher un article à partir de son slug
    *
    * @param string $slug
    * @return void
    */


    public function article_categorie($id) {
        // On instancie le modèle "articles"
        
        $this->loadModel('Articles');
        $articles = $this->Articles->categorie($id);
        // On envoie les données à la vue index
        $this->render('article_categorie', compact('articles'));
        
    }

    public function connexion() {
        // Récupérez les données POST depuis la requête
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        if ($requestMethod === 'POST') {
            // Si la méthode est PUT, cela s
            $postdata = file_get_contents("php://input");
            $request = json_decode($postdata);
            
            //code donné par Matthew
            //ob_start();
            //var_dump($request);
            //fin du code donné par Matthew


            // Assurez-vous que les données ont été correctement décodées
            if (!isset($request->username) || !isset($request->password)) {
                
                echo json_encode(array('authenticated' => false));
                return;
            }
        
            $login = $request->username;
            $password = $request->password;
        
            //var_dump($login);
            //var_dump($password);
        
            $this->loadModel('Utilisateurs');
            $utilisateur = $this->Utilisateurs->findByLogin($login);
            //var_dump($utilisateur);
            //var_dump($utilisateur['login']);
            //$result = ob_get_clean();
            //file_put_contents("bug.html", $result);
            if ($utilisateur == null) {
                // L'authentification a échoué
                // Retournez une réponse JSON d'échec
                echo json_encode(array('authenticated' => false));
            } else  if ($utilisateur['login'] === $login && password_verify($password, $utilisateur['password']) === true){
                //var_dump('ok');
                //var_dump($utilisateur['id']);
                //var_dump($utilisateur['login']);
                echo json_encode(array('authenticated' => true, 'userId' => $utilisateur['id']));
            } else {
                // L'authentification a échoué
                // Retournez une réponse JSON d'échec
                echo json_encode(array('authenticated' => false));
            }
        } else {
            //erreur lors de la connexion
            echo json_encode(array('authenticated' => false));
        }
    }
    
    

    public function Article(){
        
        // On instancie le modèle "Articles"
        $this->loadModel('Articles');
        // On stocke la liste des articles dans $articles
        $articles = $this->Articles->getAll();
        // On affiche les données
        $lien['css'][]='/assets/css/backoffice.css';
        $lien['js'][]='/assets/js/catalogue.js';
        // On envoie les données à la vue index
        $this->render('article', compact('articles'),$lien);
        }

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


    public function Categorie(){
        
        // On instancie le modèle "Articles"
        $this->loadModel('Categories');
        // On stocke la liste des articles dans $articles
        $categories = $this->Categories->getAll();
        // On affiche les données
        $lien['css'][]='/assets/css/backoffice.css';
        $lien['js'][]='/assets/js/catalogue.js';
        // On envoie les données à la vue index
        $this->render('categorie', compact('categories'),$lien);
        }

    public function Commande(){
        $this->loadModel('Commandes');
        // On stocke la liste des commandes dans $commandes
        $commandes = $this->Commandes->getAll();
        // On affiche les données
        $lien['css'][]='/assets/css/backoffice.css';
        $lien['js'][]='/assets/js/catalogue.js';
        // On envoie les données à la vue index
        $this->render('commande', compact('commandes'),$lien);
        }

    public function Liste_article(){
        $this->loadModel('Liste_articles');
        // On stocke la liste des liste_articles dans $liste_articles
        $liste_articles = $this->Liste_articles->getAll();
        // On affiche les données
        $lien['css'][]='/assets/css/backoffice.css';
        $lien['js'][]='/assets/js/catalogue.js';
        // On envoie les données à la vue index
        $this->render('liste_article', compact('liste_articles'),$lien);
        }
    
    
    public function Utilisateur(){
        $this->loadModel('Utilisateurs');
        // On stocke la liste des login dans $login
        $login = $this->Utilisateurs->getAll();
        // On affiche les données
        $lien['css'][]='/assets/css/backoffice.css';
        $lien['js'][]='/assets/js/catalogue.js';
        // On envoie les données à la vue index
        $this->render('utilisateur', compact('login'),$lien);
        }





   
    public function deleteUtilisateurs($id){//supprimer un artcile
        // On instancie le modèle "categorie"
        $this->loadModel('Utilisateurs');
        // On stocke l'categorie dans $categorie
        $this->Utilisateurs->id = $id;
        $login = $this->Utilisateurs->getOne();

        //var_dump($login);
        
        $login = $this->Utilisateurs->delete($id);

        $this->render('deletesavedUtilisateurs', compact('login'));
        }

    public function deleteCommandes($id){//supprimer un artcile
        // On instancie le modèle "categorie"
        $this->loadModel('Commandes');
        // On stocke l'categorie dans $categorie
        $this->Commandes->id = $id;
        $commande = $this->Commandes->getOne();
    
        //var_dump($commande);
        
        $commande = $this->Commandes->delete($id);

        $this->render('deletesavedCommandes', compact('commande'));
        }

    public function deleteCategories($id){//supprimer un artcile
        // On instancie le modèle "categorie"
        $this->loadModel('Categories');
        // On stocke l'categorie dans $categorie
        $this->Categories->id = $id;
        $categorie = $this->Categories->getOne();
    
        //var_dump($categorie);
        
        $categorie = $this->Categories->delete($id);

        $this->render('deletesavedCategories', compact('categorie'));
        }

    public function deleteListeArticles($id){//supprimer un artcile
        // On instancie le modèle "categorie"
        $this->loadModel('Liste_articles');
        // On stocke l'categorie dans $categorie
        $this->Liste_articles->id = $id;
        $liste_article = $this->Liste_articles->getOne();
    
        //var_dump($liste_article);
        
        $liste_article = $this->Liste_articles->delete($id);

        $this->render('deletesavedListeArticles', compact('liste_article'));
        }
    public function deleteArticles($id){//supprimer un artcile
        // On instancie le modèle "Article"
        $this->loadModel('Articles');
        // On stocke l'article dans $article
        $this->Articles->id = $id;
        $article = $this->Articles->getOne();
    
        //var_dump($article);
        if($article['image']!=='../../img/'){
            $lien=str_replace('../../','',$article['image']);
            unlink($lien);
            
        }
        $article = $this->Articles->delete($id);

        $this->render('deletesavedArticles', compact('article'));
        }




    public function insertCategories(){//inserer un artcile
        // On instancie le modèle "categorie"
        $this->loadModel('Categories');
        // On stocke l'categorie dans $categorie
 
        $categorie = $this->Categories->insert($_POST['nom']);

        $this->render('createCategorie', compact('categorie'));
        }

    
    public function insertCommandes(){//inserer un artcile
        // On instancie le modèle "commande"
        $this->loadModel('Commandes');
        // On stocke l'commande dans $commande    
        
        $commande = $this->Commandes->insert($_POST['statut'], $_POST['date'], $_POST['utilisateur_id']);

        $this->render('createCommande', compact('commande'));
        }


    public function insertListeArticles(){//inserer un artcile
        // On instancie le modèle "liste_article"
        $this->loadModel('Liste_articles');
        // On stocke l'liste_article dans $liste_article
        
        $liste_article = $this->Liste_articles->insert($_POST['date_depart'], $_POST['date_arrivee'], $_POST['prix_unitaire'], $_POST['commande_id'], $_POST['articles_id']);

        $this->render('createListeArticles', compact('liste_article'));
        }    

    public function insertUtilisateurs(){//inserer un artcile
        // On instancie le modèle "login"
        $this->loadModel('Utilisateurs');
        // On stocke l'login dans $login
         
        $login = $this->Utilisateurs->insert($_POST['login'], $_POST['password'], $_POST['email'], $_POST['imageprofil'], $_POST['adresse'] , $_POST['telephone']);
    
        $this->render('createUtilisateurs', compact('login'));
        }
    
    
    public function insertArticles(){//inserer un artcile
        // On instancie le modèle "Article"
        $this->loadModel('Articles');
        // On stocke l'article dans $article

        move_uploaded_file($_FILES['userfile']['tmp_name'],"img/".$_FILES["userfile"]["name"]);
       
        $article = $this->Articles->insert($_POST['titre'],  $_POST['contenu'],  $_POST['slug'],  $_POST['alt'], "../../img/".$_FILES["userfile"]["name"], $_POST['prix'], $_POST['categorie'], $_POST['lieu'], $_POST['accueil'], $_POST['css'],$_POST['annee'],$_POST['chambre'],$_POST['id_chambre']);

        $this->render('createArticles', compact('article'));
        }










    public function updateCommandes($id){//charger les données deja présent en base un artcile
        // On instancie le modèle "commande"
        $this->loadModel('Commandes');
        // On stocke l'commande dans $commande
        $this->Commandes->id = $id;
        $commande = $this->Commandes->getOne();

        $this->render('updateCommandes', compact('commande'));
        }

    
    public function updateListeArticles($id){//charger les données deja présent en base un artcile
        // On instancie le modèle "liste_article"
        $this->loadModel('Liste_articles');
        // On stocke l'liste_article dans $liste_article
        $this->Liste_articles->id = $id;
        $liste_article = $this->Liste_articles->getOne();

        $this->render('updateListeArticles', compact('liste_article'));
        }
    
    public function updateCategories($id){//charger les données deja présent en base un artcile
        // On instancie le modèle "categorie"
        $this->loadModel('Categories');
        // On stocke l'categorie dans $categorie
        $this->Categories->id = $id;
        $categorie = $this->Categories->getOne();

        $this->render('updateCategories', compact('categorie'));
        }
    
    public function updateUtilisateurs($id){//charger les données deja présent en base un artcile
        ob_start();
        // On instancie le modèle "login"
        $this->loadModel('Utilisateurs');
        // On stocke l'login dans $login
        $this->Utilisateurs->id = $id;
        $login = $this->Utilisateurs->getOne();

        var_dump($login['password']);
        $result = ob_get_clean();
        file_put_contents("bug1.html", $result);
    


        $this->render('updateUtilisateurs', compact('login'));
        }
        
    public function updateArticles($id){//charger les données deja présent en base un artcile
        // On instancie le modèle "Article"
        $this->loadModel('Articles');
        // On stocke l'article dans $article
        $this->Articles->id = $id;
        $article = $this->Articles->getOne();
    

        $this->render('updateArticles', compact('article'));
        }








    /*public function updatesaveUtilisateurs($id){//mettre à jour un artcile
        // On instancie le modèle "login"
        $this->loadModel('Utilisateurs');
        //var_dump(UPLOAD_ERR_OK);
        $this->Utilisateurs->id = $id;
        //permet de récupérer les données de la base de données de la ligne sélectionner. 
        $login = $this->Utilisateurs->getOne();
        
        
            // On stocke l'login dans $login
        $login = $this->Utilisateurs->update($id, $_POST['login'], $_POST['password'], $_POST['email'], $_POST['imageprofil'], $_POST['adresse'], $_POST['telephone']);
        
        $this->render('savedUtilisateurs', compact('login'));
        }
*/
    public function updatesaveUtilisateurs($id) {
        ob_start();
        // On instancie le modèle "login"
        $this->loadModel('Utilisateurs');
        //var_dump(UPLOAD_ERR_OK);
        $this->Utilisateurs->id = $id;

        // Vérifier la méthode HTTP pour déterminer le type de requête
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        if ($requestMethod === 'PUT') {
            // Si la méthode est PUT, cela signifie que les données sont envoyées en tant que JSON
            // Récupérer les données JSON depuis le corps de la demande
            $json = file_get_contents('php://input');
            $data = json_decode($json, true);

            // Vérifier que les données ont été correctement décodées
            if ($data) {
                // Mettre à jour l'utilisateur avec les données JSON
                var_dump($data['password']);
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                var_dump($data['password']);
                $result = ob_get_clean();
                file_put_contents("bug1.html", $result);
                $login = $this->Utilisateurs->update($id, $data['login'], $data['password'], $data['email'], $data['imageprofil'], $data['adresse'], $data['telephone']);
                $this->render('savedUtilisateurs', compact('login'));
            } else {
                // Gérer l'erreur de décodage JSON
                // Vous pouvez renvoyer une réponse d'erreur appropriée ici
            }
        } else {
            // Si la méthode n'est pas PUT, traitez la requête comme vous le feriez normalement
            $login = $this->Utilisateurs->update($id, $_POST['login'], $_POST['password'], $_POST['email'], $_POST['imageprofil'], $_POST['adresse'], $_POST['telephone']);
            $this->render('savedUtilisateurs', compact('login'));
        }
    }


    public function updatesaveListeArticles($id){//mettre à jour un artcile
        // On instancie le modèle "liste_article"
        $this->loadModel('Liste_articles');
        //var_dump(UPLOAD_ERR_OK);
        $this->Liste_articles->id = $id;
        //permet de récupérer les données de la base de données de la ligne sélectionner. 
        $liste_article = $this->Liste_articles->getOne();
        
        
            // On stocke l'liste_article dans $liste_article
        $liste_article = $this->Liste_articles->update($id, $_POST['date_depart'], $_POST['date_arrivee'], $_POST['prix_unitaire'], $_POST['commande_id'], $_POST['articles_id']);
        
        $this->render('savedListeArticles', compact('liste_article'));
        }


    public function updatesaveCategories($id){//mettre à jour un artcile
        // On instancie le modèle "categorie"
        $this->loadModel('Categories');
        //var_dump(UPLOAD_ERR_OK);
        $this->Categories->id = $id;
        //permet de récupérer les données de la base de données de la ligne sélectionner. 
        $categorie = $this->Categories->getOne();
        
        
            // On stocke l'categorie dans $categorie
            $categorie = $this->Categories->update($id, $_POST['nom']);
        
        $this->render('savedCategorie', compact('categorie'));
        }

    public function updatesaveCommandes($id){//mettre à jour un artcile
        // On instancie le modèle "commande"
        $this->loadModel('Commandes');
        //var_dump(UPLOAD_ERR_OK);
        $this->Commandes->id = $id;
        //permet de récupérer les données de la base de données de la ligne sélectionner. 
        $commande = $this->Commandes->getOne();
        
        
            // On stocke l'commande dans $commande
            $commande = $this->Commandes->update($id, $_POST['statut'], $_POST['date'], $_POST['utilisateur_id']);
        
        $this->render('savedCommandes', compact('commande'));
        }
        


    public function updatesaveArticles($id){//mettre à jour un artcile
        // On instancie le modèle "Article"
        $this->loadModel('Articles');
        //var_dump(UPLOAD_ERR_OK);
        $this->Articles->id = $id;
        //permet de récupérer les données de la base de données de la ligne sélectionner. 
        $article = $this->Articles->getOne();
       
        if($_FILES['userfile']['error']==UPLOAD_ERR_OK){//s'il y a une image un article
            //var_dump($_FILES['userfile']);
            //Permet de supprimer les parties du lien en trop
            if($article['image']!=='../../img/'){
                $lien=str_replace('../../','',$article['image']);
                //var_dump($lien);
                unlink($lien);
            }
            move_uploaded_file($_FILES['userfile']['tmp_name'],"img/".$_FILES["userfile"]["name"]);
            $article = $this->Articles->update($id, $_POST['titre'],  $_POST['contenu'],  $_POST['slug'], "../../img/".$_FILES["userfile"]["name"], $_POST['alt'],  $_POST['prix'], $_POST['categorie'], $_POST['lieu'], $_POST['accueil'], $_POST['css'],$_POST['annee'],$_POST['chambre'],$_POST['id_chambre']);
        }
        else {
          
            // On stocke l'article dans $article
            $article = $this->Articles->update($id, $_POST['titre'],  $_POST['contenu'], $_POST['slug'], $article['image'], $article['alt'],  $_POST['prix'], $_POST['categorie'], $_POST['lieu'], $_POST['accueil'], $_POST['css'],$_POST['annee'],$_POST['chambre'],$_POST['id_chambre']);
        }
        $this->render('savedArticles', compact('article'));
        }
}
?>