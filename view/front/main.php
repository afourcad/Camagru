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
    <div id="camera" ondrop="drop(event)" ondragover="allowDrop(event)">
      <video id="video" width="400px" height="300px" autoplay></video>
      <canvas id="canvas_filters" width="400px" height="300px"></canvas>
      <canvas id="canvas" width="400px" height="300px"></canvas>
    </div>
    <button id="startbutton">Click</button>
  </div>
  <div class="rightGalerie">
  </div>
</main>
  <script src="public/js/webcam.js"></script>
<?php $content = ob_get_clean(); ?>
<?php require('view/front/template.php');