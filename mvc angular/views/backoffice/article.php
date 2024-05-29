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
    <th>Titre</th>
    <th>Contenu</th>
	<th>Image et alt</th>
    <th>Slug</th>
	<th>Prix</th>
	<th>Catégorie ID</th>
	<th>Lieu ID</th>
	<th>Accueil</th>
	<th>CSS</th>
	<th>Année</th>
	<th>Type de chambre</th>
	<th>Chambre ID</th>
	<th></th>
  </tr>
  <?php foreach($articles as $article): ?>
  <tr>
    <td><?=$article['id'] ?></td>
    <td><?=$article['titre'] ?></td>
    <td><p><?=substr($article['contenu'],0,30)."..." ?></p></td>
	<td><img src="<?=$article['image'] ?>" alt="<?=$article['alt'] ?>"><p><?=$article['alt'] ?></p></td>
    <td><?=$article['slug'] ?></td>
	<td><?=$article['prix'] ?></td>
	<td><?=$article['categories_id'] ?></td>
	<td><?=$article['lieu_id'] ?></td>
	<td><?=$article['accueil'] ?></td>
	<td><?=$article['css'] ?></td>
	<td><?=$article['annee'] ?></td>
	<td><?=$article['type_chambre'] ?></td>
	<td><?=$article['chambre_id'] ?></td>
    <td>
        <form action="/backoffice/updateArticles/<?=$article['id'] ?>" method="post">
            <input type="submit" value="Modifier">
        </form>
        <form action="/backoffice/deleteArticles/<?=$article['id'] ?>" method="post">
            <input type="submit" value="Supprimer">
        </form>
    </td>
  </tr>
  <?php endforeach ?>
</table>    

  </br>

<form enctype="multipart/form-data" action="/backoffice/insertArticles" method="post">
<fieldset>
    <legend>Insérer un nouvel élément</legend>
	<div>
		<label for="id">ID</label>
		
	</div>
	<div>
		<label for="titre">Titre</label>
		<input type="text" id="titre" name="titre">
	</div>
	<div>
		<label for="contenu">Contenu</label>
		<textarea type="text" id="contenu" name="contenu"></textarea>
	</div>
	<div>
		<label for="slug">Slug</label>
		<input type="text" id="slug" name="slug">
	</div>
	<div>
		<input type="hidden" name="MAX_FILES_SIZE" value="3000000"/>
		<label for="idfile">Envoyer ce fichier</label>
		<input id="idfile" name="userfile" type="file"/>
	</div>
	<div>
		<label for="alt">Alt</label>
		<input type="text" id="alt" name="alt">
	</div>
	<div>
		<label for="prix">Prix</label>
		<input type="number" id="prix" name="prix">
	</div>
	<div>
		<label for="categorie">Catégorie</label>
		<select name="categorie" id="categorie">
			<option value="1">Évènement</option>
			<option value="2">Époque</option>
		</select>
	</div>
	<div>
		<label for="lieu">Lieu</label>
		<select name="lieu" id="lieu">
			<option value="1">Afrique</option>
			<option value="2">Amérique du Nord et du Sud</option>
			<option value="3">Europe</option>
			<option value="4">Asie</option>
			<option value="5">Moyen-Orient</option>
			<option value="6">Océanie</option>
		</select>
	</div>
	<div>
		<label for="accueil">Accueil</label>
		<select name="accueil" id="accueil">
			<option value="oui">Oui</option>
			<option value="non">Non</option>
		</select>
	</div>
	<div>
		<label for="css">CSS</label>
		<textarea type="text" id="css" name="css"></textarea>
	</div>
	<div>
		<label for="annee">Année</label>
		<input type="number" id="annee" name="annee">
	</div>
	<div>
		<label for="chambre">Type de chambre</label>
		<select name="chambre" id="chambre">
			<option value="couple">Chambre de couple</option>
			<option value="familial">Chambre familiale</option>
		</select>
	</div>
	<div>
		<label for="id_chambre">Chambre ID</label>
		<select name="id_chambre" id="id_chambre">
			<option value="11">Case</option>
			<option value="12">Minka </option>
			<option value="13">Renaissance </option>
			<option value="14">Simple </option>
			<option value="15">Vintage </option>
			<option value="16">Antique </option>
			<option value="17">Egyptien </option>
		</select>
	</div>
	<input type="submit" value="Insérer" name='envoi'>
</fieldset>
   
</form>

<a href="/Main" class="lien"><button class="button-89" role="button" >Retour à la page précédente</button></a>
