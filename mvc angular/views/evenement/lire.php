<style>
    .image::before{
        background-image: url(<?= $articles['image'] ?>);
        }
</style>
<div class="image">
    <h1 class='title'><b><?= $articles['titre'] ?></b></h1>
</div>
<a href="/evenement" class="btn-retour"><img src="/img/icone-fleche-droite-noir.png" alt="fleche retour arrière"></a>


<div class="container">
    <div class="row">
        <div class="col-12">
            <p><?=$articles['contenu'] ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <img src="<?=$articles['image_chambre'] ?>" alt="<?=$articles['alt'] ?>" class="chambre-image">
        </div>
        <div class="col-lg-6 form-option">
            <ul>
                <li>
                    <input type="checkbox" class="checkbox-input" name="photo" id="photo"> 
                    <label for="photo">
                        <span class="checkbox"></span>
                        Appareil photo d'époque
                    </label>
                </li>
                <li>
                    <input type="checkbox" class="checkbox-input" name="robe" id="robe"> 
                    <label for='robe'>
                        <span class="checkbox"></span>
                        Garde robe
                    </label>
                </li>
                <li>
                    <input type="checkbox" class="checkbox-input" name="vie" id="vie"> 
                    <label for="vie">
                        <span class="checkbox"></span>
                        Assurance vie
                    </label>
                </li>
                <li>
                    <input type="checkbox" class="checkbox-input" name="restauration" id="restauration"> 
                    <label for="restauration">
                        <span class="checkbox"></span>
                        Restauration
                    </label>
                </li>
                <li>
                    <h4 class="price"><?=$articles['prix'] ?> XPF</h4>
                </li>
                <li>
                    <div class="form-group">
                        <label for="date-arrivee">Date d'arrivée :</label>
                        <input type="date" class="form-control" id="date-arrivee">
                    </div>
                </li>
                <li>
                  <div class="form-group">
                    <label for="date-depart">Date de départ :</label>
                    <input type="date" class="form-control" id="date-depart">
                  </div>
                </li>
                <li style="display: flex;">
                    <a href="#" class="btn btn-lg btn-dark ms-3 add-to-card voirplus" data-id="<?=$articles['id'] ?>">Réserver</a>
                    <a href="/panier" class="btn btn-lg btn-dark ms-3 voirplus" data-id="<?=$articles['id'] ?>">Voir le panier</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <p><?=$articles['contenu_chambre'] ?></p>
        </div>
    </div>
</div>