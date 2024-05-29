<h1> Bienvenue sur le Back Office</h1>
<style>

</style> 

<button class="button-89" role="button" ><a href="/backoffice">Backoffice</a></button>
<button class="button-89" role="button" ><a href="/backoffice/article">Articles</a></button>
<button class="button-89" role="button" ><a href="/backoffice/categorie">Catégories</a></button>
<button class="button-89" role="button" ><a href="/backoffice/commande">Commandes</a></button>
<button class="button-89" role="button" ><a href="/backoffice/liste_article">Liste article</a></button>
<button class="button-89" role="button" ><a href="/backoffice/utilisateur">Utilisateur</a></button>



<table>
  <tr>
    <th>ID</th>
    <th>Date de départ</th>
    <th>Date d'arrivée</th>
    <th>Prix unitaire</th>
    <th>Articles ID</th>
	<th>Commande ID</th>
	<th></th>
  </tr>
  <?php foreach($liste_articles as $liste_article): ?>
  <tr>
    <td><?=$liste_article['id'] ?></td>
    <td><?=$liste_article['date_depart'] ?></td>
    <td><?=$liste_article['date_arrivee'] ?></td>
    <td><?=$liste_article['prix_unitaire'] ?></td>
    <td><?=$liste_article['commande_id'] ?></td> 
    <td><?=$liste_article['articles_id'] ?></td>
    
    <td>
        <form action="/backoffice/updateListeArticles/<?=$liste_article['id'] ?>" method="post">
            <input type="submit" value="Modifier">
        </form>
        <form action="/backoffice/deleteListeArticles/<?=$liste_article['id'] ?>" method="post">
            <input type="submit" value="Supprimer">
        </form>
    </td>
  </tr>
  <?php endforeach ?>
</table>    

  </br>

<form enctype="multipart/form-data" action="/backoffice/insertListeArticles" method="post">
<fieldset>
    <legend>Insérer un nouvel élément</legend>
	<div>
		<label for="id">ID</label>
		
	</div>
	<div>
		<label for="date_depart">date_depart</label>
		<input type="date" id="date_depart" name="date_depart">
	</div>
  <div>
		<label for="date_arrivee">date_arrivee</label>
		<input type="date" id="date_arrivee" name="date_arrivee">
	</div>
  <div>
		<label for="prix_unitaire">prix_unitaire</label>
		<input type="text" id="prix_unitaire" name="prix_unitaire">
	</div>
  <div>
    <label for="commande_id">commande_id</label>
    <input type="text" id="commande_id" name="commande_id">
  </div>
  <div>
		<label for="articles_id">articles_id</label>
		<input type="text" id="articles_id" name="articles_id">
	</div>
  
	<input type="submit" value="Insérer" name='envoi'>
</fieldset>
   
</form>

<a href="/Main" class="lien"><button class="button-89" role="button" >Retour à la page précédente</button></a>
