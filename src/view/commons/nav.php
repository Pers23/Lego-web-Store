
<?php if(isset($_SESSION['login'])){
    ?>
    <nav>
        <img src="/public/images/logo.jpeg">
        <a href="/">Accueil</a>
        <a href="/store">Boutique</a>
        <a class="account" href="/account/infos" ><img src="/public/images/avatar.png"><?php echo $_SESSION['userfirstname']. " " .$_SESSION['userlastname']; ?></a>
        <a href="">Panier</a>
        <a href="/account/logout">Déconnexion</a>
    </nav>
<?php
}
else{?>
<nav>
    <img src="/public/images/logo.jpeg">
    <a href="/">Accueil</a>
    <a href="/store">Boutique</a>
    <a class="account" href="/account" ><img src="/public/images/avatar.png">Compte</a>
</nav>
    <?php
}?>
