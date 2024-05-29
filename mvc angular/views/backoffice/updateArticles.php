<!-- Malgré les erreurs qui sont affichées, le code marche. Il insère correctement des valeurs.-->
<form enctype="multipart/form-data" action="/backoffice/updatesaveArticles/<?= $article['id'] ?>" method="post">
<fieldset>
    <legend>Insérer un nouvel élément</legend>
	<div>
		<label for="id">ID</label>
		
	</div>
	<div>
		<label for="titre">Titre</label>
		<input type="text" id="titre" name="titre" value="<?= $article['titre'] ?>">
	</div>
	<div>
		<label for="contenu">Contenu</label>
		<input type="text" id="contenu" name="contenu" value="<?= $article['contenu'] ?>">
	</div>
	<div>
		<label for="slug">Slug</label>
		<input type="text" id="slug" name="slug" value="<?= $article['slug'] ?>">
	</div>
	<img src="<?=$article['image'] ?>" alt="<?=$article['alt'] ?>">
	<div>	
		<input type="hidden" name="MAX_FILES_SIZE" value="3000000"/>
		<label for="idfile">Envoyer ce fichier</label>
		<input id="idfile" name="userfile" type="file"/>
	</div>
	<div>
		<label for="alt">Alt</label>
		<input type="text" id="alt" name="alt" value="<?= $article['alt'] ?>">
	</div>
	<div>
		<label for="prix">Prix</label>
		<input type="number" id="prix" name="prix" value="<?=$article['prix'] ?>">
	</div>
	<div>
		<label for="categorie">Catégorie</label>
		<select name="categorie" id="categorie">
			<option value="<?=$article['categories_id'] ?>">Valeur sélectionné précédemment</option>
			<option value="1">Évènement</option>
			<option value="2">Époque</option>
		</select>
	</div>
	<div>
		<label for="lieu">Lieu</label>
		<select name="lieu" id="lieu">
			<option value="<?=$article['lieu_id'] ?>">Valeur sélectionné précédemment</option>
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
			<option value="<?=$article['accueil'] ?>">Valeur sélectionné précédemment</option>
			<option value="oui">Oui</option>
			<option value="non">Non</option>
		</select>
	</div>
	<div>
		<label for="css">CSS</label>
		<input type="text" id="css" name="css" value="<?=$article['css'] ?>">
	</div>
	<div>
		<label for="annee">Année</label>
		<input type="number" id="annee" name="annee" value="<?=$article['annee'] ?>">
	</div>
	<div>
		<label for="chambre">Type de chambre</label>
		<select name="chambre" id="chambre" >
			<option value="<?=$article['type_chambre'] ?>">Valeur sélectionné précédemment</option>
			<option value="couple">Chambre de couple</option>
			<option value="familial">Chambre familiale</option>
		</select>
	</div>
	<div>
		<label for="id_chambre">Chambre ID</label>
		<select name="id_chambre" id="id_chambre" >
			<option value="<?=$article['chambre_id'] ?>">Valeur sélectionné précédemment</option>
			<option value="11">Case</option>
			<option value="12">Minka </option>
			<option value="13">Renaissance </option>
			<option value="14">Simple </option>
			<option value="15">Vintage </option>
			<option value="16">Antique </option>
			<option value="17">Egyptien </option>
		</select>
	</div>
	<input type="submit" value="Mettre à jour" name='envoi'>
</fieldset>

</form>


<a href="/Main"><button class="button-89" role="button" >Retour au Back Office</button></a>


<style>

form{
		display:flex;
		flex-direction: column;
		justify-content: center;
		align-items:center;
	}
img{
	height: 10vh;
}
	fieldset {
	margin-bottom: 15px;
	padding: 10px;
	width:30%;
	}
	
	legend {
	padding: 0px 3px;
	font-weight: bold;
	font-variant: small-caps;
	}
	
	label {
	width: 110px;
	display: inline-block;
	vertical-align: top;
	margin: 6px;
	}
	
	
	
	input:focus , textarea:focus{
	background: #eaffff;
	}
	
	input, textarea {
	width: 249px;
	}
	
	textarea {
	height: 100px;
	}
	
	input[type=submit] {
	width: 150px;
	padding: 10px;
	margin: 5px;
	width:100px;
	background-color: #3498db;
	color: white;
	border: 2px solid #3498db;
	}
	
	input[type=submit]:hover {
	width: 150px;
	padding: 10px;
	margin: 5px;
	width:100px;
	background-color: rgba(255, 255, 128, 0); 
	color: black; 
	border: 2px solid #3498db;
	}

	fieldset{
		background-color: #eee;
	}
	/* CSS */
.button-89 {
  --b: 3px;   /* border thickness */
  --s: .45em; /* size of the corner */
  --color: #373B44;
  
  padding: calc(.5em + var(--s)) calc(.9em + var(--s));
  color: var(--color);
  --_p: var(--s);
  background:
    conic-gradient(from 90deg at var(--b) var(--b),#0000 90deg,var(--color) 0)
    var(--_p) var(--_p)/calc(100% - var(--b) - 2*var(--_p)) calc(100% - var(--b) - 2*var(--_p));
  transition: .3s linear, color 0s, background-color 0s;
  outline: var(--b) solid #0000;
  outline-offset: .6em;
  font-size: 25px;

  border: 0;

  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-89:hover,
.button-89:focus-visible{
  --_p: 0px;
  outline-color: var(--color);
  outline-offset: .05em;
}

.button-89:active {
  background: var(--color);
  color: #fff;
}


a{
	display: flex;
  	justify-content:center;
	margin: 2%;
	text-decoration: none;
}
</style>