<div>
    <div><?php
if(isset($_GET['status']) == 'login_fail'){
        ?>
<?php if($_GET['status'] == 'login_fail'){
    ?>
<div class="box error">
    La connexion a échouée.Veuillez vos identifiants et réessayez
</div>
    <?php
}
    elseif($_GET['status'] == 'signin_fail'){
    ?>
<div class="box error">
    Problème d'inscription 😅😅😅.
    Veuillez vérifier les informations tranmises.😁
</div>
    <?php
    } elseif ($_GET['status'] == 'signin_success'){
    ?>
<div class="box info">
    Inscription réussie! Vous pouvez dès à présent vous connecter 😎
</div>

    <?php
}elseif($_GET['status'] == 'logout_success'){
    ?>
<div class="box info">
    Vous êtes déconnecté... À bientôt !😊
</div>
    <?php
}
}
?>
    </div>
</div>
<div id="account">

<form class="account-login" method="post" action="/account/login">

  <h2>Connexion</h2>
  <h3>Tu as déjà un compte ?</h3>

  <p>Adresse mail</p>
  <input type="text" name="usermail" placeholder="Adresse mail" />

  <p>Mot de passe</p>
  <input type="password" name="userpass" placeholder="Mot de passe" />

  <input type="submit" value="Connexion" />

</form>

<form class="account-signin" method="post" action="/account/signin" id="formInscript">

  <h2>Inscription</h2>
  <h3>Crée ton compte rapidement en remplissant le formulaire ci-dessous.</h3>

  <p>Nom</p>
  <input type="text" name="userlastname" placeholder="Nom" id="nom"/>

  <p>Prénom</p>
  <input type="text" name="userfirstname" placeholder="Prénom" id="prenom"/>

  <p>Adresse mail</p>
  <input type="text" name="usermail" placeholder="Adresse mail"  id="mail"/>

  <p>Mot de passe</p>
  <input type="password" name="userpass" placeholder="Mot de passe" id="passe"/>

  <p>Répéter le mot de passe</p>
  <input type="password" name="userpass" placeholder="Mot de passe" id="conf-pass"/>

  <input type="submit" value="Inscription" />

</form>

</div>

<script src="/public/scripts/signin.js"></script>

