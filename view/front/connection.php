<?php $title = "Connection";?>

<?php ob_start(); ?>
<div class="topnav">
  <a href="#home">Galerie</a>
  <a href="index.php?action=inscription">Inscription</a>
  <a class= "active" href="index.php?action=connection">Connection</a>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('header.php'); ?>

<?php ob_start(); ?>

<div class="formArea">
    <h2>Bienvenue</h2>
    <form action="index.php?action=connectUser" class="formArea" method="post">
            <input type="text" id="name" name="name" placeholder="Votre login">
            <input type="password" id="pass" name="pass" placeholder="Votre mot de passe">
            <input type="submit">
    </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php');