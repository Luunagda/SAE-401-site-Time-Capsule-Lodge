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
    <th>Statut</th>
    <th>Date</th>
	<th>Utilisateur ID</th>
	<th></th>
  </tr>
  <?php foreach($commandes as $commande): ?>
  <tr>
    <td><?=$commande['id'] ?></td>
    <td><?=$commande['statut'] ?></td>
    <td><?=$commande['date'] ?></td>
    <td><?=$commande['utilisateur_id'] ?></td> 
    
    <td>
        <form action="/backoffice/updateCommandes/<?=$commande['id'] ?>" method="post">
            <input type="submit" value="Modifier">
        </form>
        <form action="/backoffice/deleteCommandes/<?=$commande['id'] ?>" method="post">
            <input type="submit" value="Supprimer">
        </form>
    </td>
  </tr>
  <?php endforeach ?>
</table>    

  </br>

<form enctype="multipart/form-data" action="/backoffice/insertCommandes" method="post">
<fieldset>
    <legend>Insérer un nouvel élément</legend>
	<div>
		<label for="id">ID</label>
		
	</div>
	<div>
		<label for="statut">statut</label>
		<input type="text" id="statut" name="statut">
	</div>
  <div>
    <label for="date">date</label>
    <input type="date" id="date" name="date" value="<?php echo date('Y-m-d'); ?>">
  </div>
  <div>
    <label for="utilisateur_id">Utilisateur ID</label>
    <input type="text" id="utilisateur_id" name="utilisateur_id">
  </div>
	<input type="submit" value="Insérer" name='envoi'>
</fieldset>
   
</form>

<a href="/Main" class="lien"><button class="button-89" role="button" >Retour à la page précédente</button></a>
