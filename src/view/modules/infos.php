<?php if(isset($_SESSION['login'])){
    ?>
        <?php
    if(isset($_GET['status']) == 'update_success'){?>
        <div class="box info">
            Vos informations personnelles ont bien été mises à jour 😉
        </div>
    <?php
    }
    elseif(isset($_GET['status'])=='update_fail'){
        ?>
        <div class="box error">
            Oups,quelque chose s'est mal passé😅.
            Veuillez réessayer s'il vous plaît😇
        </div>
            <?php
    }
    ?>
<div id="account">
    <form class="account-signin" action="/account/update" method="POST">
        <h2> Informations du compte</h2><br>
        <h3>Informations personnelles</h3>
        <p>Prénom </p><input type="text" name="userfirstname" value="<?=$_SESSION['userfirstname']?>" id="prenom"/>
        <p>Nom </p><input type="text" name="userlastname" value="<?=$_SESSION['userlastname'] ?>"/>
            <p>Adresse mail </p><input type="text" name="usermail" value="<?=$_SESSION['usermail'] ?>"/>
        <input type="submit" value="Modifier mes informations"/>
    </form>
</div>
<?php
}?>