<?php $title = "Camera";?>

<?php ob_start(); ?>
<div class="topnav">
  <a href="#home">Galerie</a>
  <a class="active" href="#news">Createur</a>
  <a href="#contact">Mon compte</a>
  <a href="index.php?action=deconnection">Deconnection</a>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('header.php'); ?>

<?php ob_start(); ?>
    <h1>Je suis connecté</h1>
<?php $content = ob_get_clean(); ?>
<?php require('view/front/template.php');