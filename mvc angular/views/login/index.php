<div class="form">
    <h2 class="login-title">Se connecter</h2>

    <form class="login-form" action="/login/connexion" method="post">
      <div>
        <label for="login">Login </label>
        <input
               id="login"
               type="text"
               placeholder="votre login"
               name="login"
               required
               />
      </div>
      <div>
        <label for="password">Password </label>
        <input
               id="password"
               type="password"
               placeholder="Votre mot de passe"
               name="password"
               required
               />
      </div>

      <button class="btn btn-connect" type="submit" value="Connexion">
        Connexion
      </button>
    </form>
</div>