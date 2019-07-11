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
<main>
  <div class="leftVideoArea">
    <video id="video"></video>
    <canvas id="canvas"></canvas>
    <button id="startbutton">Take photo</button>
  </div>
  <div class="rightGalerie">
  </div>
</main>
  <script src="public/js/webcam.js"></script>
<?php $content = ob_get_clean(); ?>
<?php require('view/front/template.php');