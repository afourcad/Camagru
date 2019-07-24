<?php $title = "Camera";?>

<?php ob_start(); ?>
<nav class="topnav">
  <a href="#home">Galerie</a>
  <a class="active" href="#news">Createur</a>
  <a href="#contact">Compte</a>
  <a href="index.php?action=deconnection">Deconnection</a>
</nav>
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
    <button type="submit" id="saveButton">Save</button>
    <form method="post" accept-charset="utf-8" name="form1">
      <input name="hidden_data" id="hidden_data" type="hidden"/>
      <input name="hidden_data2" id="hidden_data2" type="hidden"/>
    </form>
    <div class="filtersChoice">
      <label>
        <input type="radio" name="filters" value="hat" onclick="changeFilters('chapeau')">
        <img src="data/filters/chapeau.png" alt="chapeau">
      </label>
      <label>
        <input type="radio" name="filters" value="crown" onclick="changeFilters('crown')">
        <img src="data/filters/crown.png" alt="crown">
      </label>
      <label>
        <input type="radio" name="filters" value="hearth" onclick="changeFilters('hearth')">
        <img src="data/filters/hearth.png" alt="hearth">
      </label>
    </div>
  </div>
  <div class="rightGalerie">
  </div>
</main>
  <script src="public/js/webcam.js"></script>
<?php $content = ob_get_clean(); ?>
<?php require('view/front/template.php');