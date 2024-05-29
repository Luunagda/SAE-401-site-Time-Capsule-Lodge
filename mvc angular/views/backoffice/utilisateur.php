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
    <th>Login</th>
    <th>Password</th>
    <th>Email</th>
    <th>Image de profil</th>
	<th>Adresse</th>
  <th>Téléphone</th>
	<th></th>
  </tr>
  <?php foreach($login as $liste_article): ?>
  <tr>
    <td><?=$liste_article['id'] ?></td>
    <td><?=$liste_article['login'] ?></td>
    <td><?=$liste_article['password'] ?></td>
    <td><?=$liste_article['email'] ?></td>
    <td><?=$liste_article['imageprofil'] ?></td> 
    <td><?=$liste_article['adresse'] ?></td>
    <td><?=$liste_article['telephone'] ?></td>
    <td>
        <form action="/backoffice/updateUtilisateurs/<?=$liste_article['id'] ?>" method="post">
            <input type="submit" value="Modifier">
        </form>
        <form action="/backoffice/deleteUtilisateurs/<?=$liste_article['id'] ?>" method="post">
            <input type="submit" value="Supprimer">
        </form>
    </td>
  </tr>
  <?php endforeach ?>
</table>    

  </br>

<form enctype="multipart/form-data" action="/backoffice/insertUtilisateurs" method="post">
<fieldset>
    <legend>Insérer un nouvel élément</legend>
	<div>
		<label for="id">ID</label>
		
	</div>
	<div>
		<label for="login">login</label>
		<input type="text" id="login" name="login">
	</div>
  <div>
		<label for="password">password</label>
		<input type="text" id="password" name="password">
	</div>
  <div>
		<label for="email">email</label>
		<input type="text" id="email" name="email">
	</div>
  <div>
    <label for="imageprofil">imageprofil</label>
    <input type="text" id="imageprofil" name="imageprofil">
  </div>
  <div>
		<label for="adresse">adresse</label>
		<input type="text" id="adresse" name="adresse">
	</div>
  <div>
		<label for="telephone">téléphone</label>
		<input type="tel" id="telephone" name="telephone">
	</div>
  
	<input type="submit" value="Insérer" name='envoi'>
</fieldset>
   
</form>

<a href="/Main" class="lien"><button class="button-89" role="button" >Retour à la page précédente</button></a>
