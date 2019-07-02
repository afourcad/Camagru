<?php $title = "Inscription";?>

<?php ob_start(); ?>
<div class="topnav">
  <a href="#home">Galerie</a>
  <a class="active" href="index.php?action=inscription">Inscription</a>
  <a href="index.php?action=connection">Connection</a>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('header.php'); ?>

<?php ob_start(); ?>
<div class="formArea">
    <h2>Inscription</h2>
    <form action="index.php?action=createUser" class="formArea" method="post">
        <input type="text" id="name" name="name" placeholder="Votre login">
        <input type="text" id="mail" name="mail" placeholder="Votre mail">
        <input type="text" id="mail2" name="mail2" placeholder="Retapez votre mail">
        <input type="password" id="pass" name="pass" placeholder="Votre mot de passe">
        <input type="password" id="pass2" name="pass2" placeholder="Retapez votre passe">
        <input type="submit">
    </form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/front/template.php');