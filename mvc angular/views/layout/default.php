<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/bootstrap/bootstrap.css">
   
    
    <title>Time Capsule Lodge</title>
    
    <?= $css; ?>
   <!-- <link rel="stylesheet" href="../css/css.css">-->
    <link rel="stylesheet" href="/assets/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/bootstrap/bootstrap-grid.css">
    <link rel="stylesheet" href="/assets/css/bootstrap/bootstrap-reboot.css">
    <link rel="stylesheet" href="/assets/css/bootstrap/bootstrap-utilities.css">
    <link rel="stylesheet" href="/assets/css/aos.css">
    <link rel="stylesheet" href="/assets/css/css.css">
    <link rel="stylesheet" href="/assets/slick/slick.css">
    <link rel="stylesheet" href="/assets/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" type="image/png" href="/img/TCL Logo.png"/>

    
</head>
<body>
<header>
<nav class="navbar navbar-expand-lg  pt-3 pb-3" style="background-color: black;">
  <div class="container-fluid">
    <a class="a-nav" href="/Main"><img src="/img/TCL Logo.png" alt="Logo"  class="d-inline-block align-text-top logo"></a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link"  href="/Main">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/epoque">Époque</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/lieu">Lieu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/evenement">Évènement</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/backoffice">Backoffice</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/apropos">A propos</a>
        </li>
        <?php 
        if ($user !== null){
          ?>
        <li class="nav-item">
            <a class="nav-link" href="/backoffice">Backoffice</a>
        </li>
        <?php 
        }
        if ($user == null){
            ?>
        <li class="nav-item position-absolute login">
            <a class="nav-link" href="/login">Se connecter</a>
        </li>
        <!-- permet de s'inscrire, cela m=n'a pas d'intéret actuellement dans le site mais pourra en avoir un à l'avenir pour un espace client.
        <li class="nav-item position-absolute register">
            <a class="nav-link" href="/register">S'inscrire</a>
        </li>
        -->
        <?php 
        } else {
            ?>
        <li class="nav-item position-absolute deconnexion">
            <a class="nav-link" href="/login/deconnexion">Se déconnecter</a>
        </li>
        <?php } ?>
        
      </ul>
    </div>
  </div>
    <div>
        <a href="/panier" class="d-flex me-2 btn-circle btn-lg p-2 link-offset-2 link-underline link-underline-opacity-0" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-add-to-card me-2" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
            <span id="nb">0</span>
        </a>       
    </div>
</nav>
</header>
<main class="element">
<?php if($erreur !== null): ?>
    <div class="alert alert-danger mt-2 mb-2">
        <strong>Erreur !</strong><p><?= $erreur ?></p>
    </div>
<?php endif; ?>
<?= $content ?>
</main>
<footer class="footer bg-dark text-white">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <h4>À propos</h4>
        <p>Time Capsule vous propose de loyer de chambre d'hotel confortable et luxieuse. Mais ce n'est pas tout, TCL est le seul hotel a proposer des capsules temporelle. Le principe est simple votre chambre possede une porte mennant vers un bout d'histoire visitable sur le longterme et a plusieur reprise. Grace a cette technologie vous pouvez assister a des événement historique comme le débarquement de Normandie.</p>
      </div>
      <div class="col-lg-3">
        <h4>Liens utiles</h4>
        <ul class="list-unstyled">
          <li ><a class="nav-link underline" href="/Main">Accueil</a></li>
          <li ><a class="nav-link underline" href="/apropos">À propos et contact</a></li>
          <li ><a class="nav-link underline" href="/mentions">Mentions légales</a></li>
        </ul>
      </div>
      <div class="col-lg-3">
        <h4>Contact</h4>
        <ul class="list-unstyled">
          <li><i ></i>+687 14.17.89</li>
          <li><i></i>time.capsule@gmail.lodge</li>
          <li><i ></i> 20 rue de l’Espace Temps, à Y</li>
        </ul>
      </div>
    </div>
  </div>
</footer>
<script src="/assets/js/jquery-3.6.0.min.js"></script>
<script src="/assets/js/aos.js"></script>
<script>
  AOS.init();
</script>
<script src="/assets/js/bootstrap/bootstrap.js"></script>
<script src="/assets/slick/slick.min.js"></script>
<script src="/assets/magnific-popup/jquery.magnific-popup.js"></script>

<?= $js; ?>
</body>
</html>
