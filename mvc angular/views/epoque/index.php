<section>
  <form class="form-filtre" action="/epoque/filtre" method="POST">
      <fieldset>
          <legend>Prix :</legend></br>

          <input type="checkbox" class="checkbox-input" name="prix[]" id="prix1" value="0-30000">
          <label for="prix1"> 
              <span class="checkbox"></span>
              A partir de 30 000 XPF
          </label>
          <input type="checkbox" class="checkbox-input" name="prix[]" id="prix2" value="30001-50000">
          <label for="prix2">
              <span class="checkbox"></span>
              Entre 30 001 et 50 000 XPF
          </label>
          <input type="checkbox" class="checkbox-input" name="prix[]" id="prix3" value="50001-70000">
          <label for="prix3">
              <span class="checkbox"></span>
              Entre 50 001 et 70 000 XPF
          </label>
          <input type="checkbox" class="checkbox-input" name="prix[]" id="prix4" value="70001-100000">
          <label for="prix4">
              <span class="checkbox"></span>
              Entre 70 001 et 100 000 XPF
          </label>
      </fieldset>
      
      <fieldset>
          <legend>Époque :</legend></br>
          <input type="checkbox" class="checkbox-input" name="epoque[]" id="epoque1" value="-30000/-5000">
          <label for="epoque1">
              <span class="checkbox"></span>
              Avant -5000
          </label>
          <input type="checkbox" class="checkbox-input" name="epoque[]" id="epoque2" value="-5001/-500">
          <label for="epoque2">
              <span class="checkbox"></span>
              De -5000 à -500
          </label>
          <input type="checkbox" class="checkbox-input" name="epoque[]" id="epoque3" value="-501/0">
          <label for="epoque3">
              <span class="checkbox"></span>
              De -501 à 0
          </label>
          <input type="checkbox" class="checkbox-input" name="epoque[]" id="epoque4" value="1/500">
          <label for="epoque4">
              <span class="checkbox"></span>
              De 1 à 500
          </label>
          <input type="checkbox" class="checkbox-input" name="epoque[]" id="epoque5" value="501/1000">
          <label for="epoque5">
              <span class="checkbox"></span>
              De 501 à 1000
          </label>
          <input type="checkbox" class="checkbox-input" name="epoque[]" id="epoque6" value="1001/1500">
          <label for="epoque6">
              <span class="checkbox"></span>
              De 1001 à 1500
          </label>
          <input type="checkbox" class="checkbox-input" name="epoque[]" id="epoque7" value="1501/1900">
          <label for="epoque7">
              <span class="checkbox"></span>
              De 1501 à 1900
          </label>
          <input type="checkbox" class="checkbox-input" name="epoque[]" id="epoque8" value="1901/1950">
          <label for="epoque8">
              <span class="checkbox"></span>
              De 1901 à 1950
          </label>
          <input type="checkbox" class="checkbox-input" name="epoque[]" id="epoque9" value="1951/1990">
          <label for="epoque9">
              <span class="checkbox"></span>
              De 1951 à 1980
          </label>
          <input type="checkbox" class="checkbox-input" name="epoque[]" id="epoque10" value="1981/2023">
          <label for="epoque10">
              <span class="checkbox"></span>
              De 1981 à aujourd'hui
          </label>
      </fieldset>
      <fieldset>
          <legend>Lieu :</legend></br>
          <input type="checkbox" class="checkbox-input" name="lieu_id[]" id="lieu_id1" value="1">
            <label for="lieu_id1">
                <span class="checkbox"></span>
                Afrique
            </label>
            <input type="checkbox" class="checkbox-input" name="lieu_id[]" id="lieu_id2" value="2">
            <label for="lieu_id2">
                <span class="checkbox"></span>
                Amérique du Nord et du Sud
            </label>

            <input type="checkbox" class="checkbox-input" name="lieu_id[]" id="lieu_id3" value="3">
            <label for="lieu_id3">
                <span class="checkbox"></span>
                Europe
            </label>
            
            <input type="checkbox" class="checkbox-input" name="lieu_id[]" id="lieu_id4" value="4">
            <label for="lieu_id4">
                <span class="checkbox"></span>
                Asie
            </label>
            <input type="checkbox" class="checkbox-input" name="lieu_id[]" id="lieu_id5" value="5">
            <label for="lieu_id5">
                <span class="checkbox"></span>
                Moyen-Orient
            </label>
            <input type="checkbox" class="checkbox-input" name="lieu_id[]" id="lieu_id6" value="6">
            <label for="lieu_id6">
                <span class="checkbox"></span>
                Océanie
            </label>
      </fieldset>
      <fieldset>
          <legend>Type de chambre :</legend></br>
          <input type="checkbox" class="checkbox-input" name="type_chambre[]" id="type_chambre1" value="couple">
            <label for="type_chambre1">
                <span class="checkbox"></span>
                Chambre de couple (2 personnes)
            </label>
            <input type="checkbox" class="checkbox-input" name="type_chambre[]" id="type_chambre2" value="familial">
            <label for="type_chambre2">
                <span class="checkbox"></span>
                Chambre familiale (5 personnes)
            </label>
      </fieldset>
      <input class="btn btn-dark ms-3 btn-filtre" type="submit" value="Filtrer">
  </form>

    <main class="d-flex grid gap-5 flex-wrap justify-content-around catalogue" style="margin: 2%;">
        <div class="titre-catalogue">
            <h1 class='titre-page'>Chambre proposant une époque</h1>
            <nav aria-label="breadcrumb" class="fil_arianne">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/Main" class="lien">Accueil</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="/epoque" class="lien" style="color: black;"><strong>Époque</strong></a></li>
                </ol>
            </nav>
        </div>
  <?php 
  if($articles===null){
      echo "<h3 style='text-align: center; color: rgb(87, 87, 87);'>Aucune chambre ne correspond à votre recherche.</br>Veuillez réessayer.</h3>";
  }else {
  foreach($articles as $article){ ?>
          <div class="card " style="width: 25rem;" >
              <img src="<?=$article['image'] ?>" class="card-img-top img"  alt="<?=$article['alt'] ?>">
              <div class="card-body">
                  <h5 class="card-title"><b><?=$article['titre'] ?></b></h5>
                  <p class="card-text"><?=substr($article['contenu'],0,100)."..." ?></p>
                  <h4 class="price"><?=$article['prix'] ?> XPF</h4>
                  <div class="form-group">
                    <label for="date-arrivee">Date d'arrivée :</label>
                    <input type="date" class="form-control" id="date-arrivee">
                  </div>

                  <div class="form-group">
                    <label for="date-depart">Date de départ :</label>
                    <input type="date" class="form-control" id="date-depart">
                  </div>

                  <div class="btn-card">
                    <a href="/epoque/lire/<?=$article['slug'] ?>" class="btn btn-lg btn-dark ms-3 voirplus" data-id="<?=$article['id'] ?>">Voir +</a>
                    <a href="#" class="ms-3 btn btn-warning add-to-card btn-circle p-2 link-offset-2 link-underline link-underline-opacity-0" data-id="<?=$article['id'] ?>">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-add-to-card me-2" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                      </svg>
                    </a>
                  </div>
              </div>
          </div>
  <?php } } ?>
  </main>
</section>
