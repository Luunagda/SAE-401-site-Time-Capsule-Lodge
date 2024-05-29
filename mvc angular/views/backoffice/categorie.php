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
    <th>Nom</th>
	<th></th>
  </tr>
  <?php foreach($categories as $categorie): ?>
  <tr>
    <td><?=$categorie['id'] ?></td>
    <td><?=$categorie['nom'] ?></td>
    
    <td>
        <form action="/backoffice/updateCategories/<?=$categorie['id'] ?>" method="post">
            <input type="submit" value="Modifier">
        </form>
        <form action="/backoffice/deleteCategories/<?=$categorie['id'] ?>" method="post">
            <input type="submit" value="Supprimer">
        </form>
    </td>
  </tr>
  <?php endforeach ?>
</table>    

  </br>

<form enctype="multipart/form-data" action="/backoffice/insertCategories" method="post">
<fieldset>
    <legend>Insérer un nouvel élément</legend>
	<div>
		<label for="id">ID</label>
		
	</div>
	<div>
		<label for="nom">nom</label>
		<input type="text" id="nom" name="nom">
	</div>
	<input type="submit" value="Insérer" name='envoi'>
</fieldset>
   
</form>

<a href="/Main" class="lien"><button class="button-89" role="button" >Retour à la page précédente</button></a>
