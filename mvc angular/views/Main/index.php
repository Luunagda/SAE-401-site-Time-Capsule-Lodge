<img src="/img/sablier.jpg" alt="image de sablier" width="100%">
<div class="sablier">
    <p>Une porte vers l'histoire</p>
</div>
<a href="#page">
  <div class="fleche btn-circle btn-lg">
    <img src="/img/fleche.png" alt="fleche bas">
  </div>
</a>
<div class="caroussel scroll-container" id="page" data-aos="fade-right" data-aos-offset= "400">
        <ul class="slick-slider">
        <?php foreach($main as $article): ?>
            <li>
                <img src="<?=$article['image'] ?>" alt="<?=$article['alt'] ?>">
                <div class="bloc p-3" style="<?=$article['css'] ?>">
                    <p>
                    <b><?=$article['titre'] ?></b>
                    <?=$article['contenu'] ?>
                    </p>
                    <?php if($article['categories_id']==1) {?>
                    <a href="/evenement/lire/<?=$article['slug'] ?>" class="btn btn-dark">En savoir +</a>
                    <?php }else{?>
                      <a href="/epoque/lire/<?=$article['slug'] ?>" class="btn btn-dark">En savoir +</a>
                      <?php }?>
                </div>
            </li>
        <?php endforeach ?>
        </ul>
        
</div>
<div class="ligne">
    <div class="p-3 bloc-ligne">
        <h2>À propos de nous</h2>
        <p>
        Bienvenu au Time Capsule Lodge ! 
        Le seul hôtel vous offrant l’opportunité de revivre l’histoire, grâce aux divers capsules temporelles de nos chambres. Aucun risque de modifier l’histoire comme dans un vulgaire voyage temporel classique, ici chaque événement historique est protégé et rien ne vous empêche de le revivre plusieurs fois.
        </p>
        <a href="#" class="btn btn-dark">En savoir +</a>
    </div>
    <img src="img/accueil.jpg" alt="Image de réception.">
</div>


<section style="color: #000; ">
  <div class="container py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-10 col-xl-8 text-center">
        <h3 class="fw-bold mb-4">Les avis clients</h3>
        <p class="mb-4 pb-2 mb-md-5 pb-md-0">
        Partagez votre avis avec les autres utilisateurs, votre expérience nous intéresse. 
        </p>
      </div>
    </div>

    <div class="row text-center">
      <div class="col-md-4 mb-4 mb-md-0">
        <div class="card">
          <div class="card-body py-4 mt-2">
            <div class="d-flex justify-content-center mb-4">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp"
                class="rounded-circle shadow-1-strong" width="100" height="100" />
            </div>
            <h5 class="font-weight-bold">Teresa May</h5>
            <h6 class="font-weight-bold my-3">Photographe</h6>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <p class="mb-2">

              <i class=" pe-2"></i>J’ai passé 4 jours en 1932 lors de la grande guerre contre les émeus d’Australie. C'était fabuleux de voir cet événement historique et farfelu. J’ai pu faire de très belles photos grâce à la technologie de camouflage d’anachronisme. Vraiment un séjour incroyable, seul recommandation j’aimerais plus de proposition de chambre un peu folle comme la guerre des émeus.

            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4 mb-md-0">
        <div class="card">
          <div class="card-body py-4 mt-2">
            <div class="d-flex justify-content-center mb-4">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(15).webp"
                class="rounded-circle shadow-1-strong" width="100" height="100" />
            </div>
            <h5 class="font-weight-bold">Maggie McLoan</h5>
            <h6 class="font-weight-bold my-3">Docteur</h6>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <p class="mb-2">
              <i class="pe-2"></i>J’ai vécu le siège d’Alésia au côté des derniers gaulois libres, c'était une expérience unique. J’ai beaucoup appris sur leurs modes de vie et la médecine de l’époque. Attention au âmes sensibles les romains comme les gaulois ne sont pas des tendres. J’ai plusieurs fois eu peur pour ma vie. C’est pour ça que l’assurance vie est importante, même si dans mon cas je n’en est pas l'utilité. Mieux vaut prévenir que guérir et comme disait l’autre Vidi, vini, vici.

            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-0">
        <div class="card">
          <div class="card-body py-4 mt-2">
            <div class="d-flex justify-content-center mb-4">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(17).webp"
                class="rounded-circle shadow-1-strong" width="100" height="100" />
            </div>
            <h5 class="font-weight-bold">Alexa Horwitz</h5>
            <h6 class="font-weight-bold my-3">Professeur</h6>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <p class="mb-2">
              <i class=" pe-2"></i>Je suis très heureuse de l'expérience proposée par Time Capsule Lodge. J’ai pu assister à la crucifixion, c'était là l'occasion de prendre des notes sur l’histoire du christianisme. J’ai maintenant beaucoup de sources pour faire cours à mes élèves. Je pense reprendre une chambre un jour ou l’autre, peut-être même essayer de faire une sortie scolaire si possible.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>