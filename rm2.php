<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buvette</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<?php
include_once('nav.php');
?>
            <ul class="nav">
        <li class="nav-item">
        <a class="nav-link active" href="rm.php">Retour</a>
        </li>
        </ul>
<br>
<div class="mx-auto" style="width: 500px;">
<form action="rmExe.php" method="post">
<?php
if ($_POST['choix'] == 1) {
    ?>  
<input type="hidden" name="choix" value=1>
<table class="table table-borderless">
  <tbody>
    <tr>
      <td>
    <div class="form-group">
    <label for="exampleFormControlSelect1">Age Minimal :</label>
    <select class="form-control" name="amin">
      <?php
      for ($i=1; $i <= 99 ; $i++) { 
        echo "<option>";
        echo $i;
        echo "</option>";
      }
      ?>
    </select>
  </div>
      </td>
        <br>
    </tr>
    <tr>
      <td> 
      <div class="form-group">
    <label for="exampleFormControlSelect1">Age Maximal :</label>
    <select class="form-control" name="amax">
      <?php
      for ($i=1; $i <= 99 ; $i++) { 
        echo "<option>";
        echo $i;
        echo "</option>";
      }
      ?>
    </select>
  </div>
  </div>
  </td>
    </tr>
  </tbody>
</table>
</div>
        <div class="ml-auto" style="width:400px;">
    <button type="submit" class="btn btn-primary mb-2">Ajouter</button>
</div>
<?php } ?>
<?php
if ($_POST['choix'] == 2) {
    ?>  
<input type="hidden" name="choix" value=2>
<table class="table table-borderless">
  <tbody>
    <tr>
      <td>
      <div class="mx-auto" style="width: 500px;">
<form action="rmNomExe.php" method="post">
<table class="table table-borderless">
  <tbody>
    <tr>
      <td>
        <br>
      <div class="form-group">
    <label for="formGroupExampleInput">Nom de famille :</label>
    <input type="text" class="form-control" name="nomV" placeholder="Lindgren">
  </div>
    </td>
      <td>
        <br>
  
  </div>

        <br> <br> <br> <br>
      <center> <button type="submit" class="btn btn-primary mb-2">Validation</button> </center>
    </td>
    </tr>
  </tbody>
</table>
</div>
<?php } ?>
<?php
if ($_POST['choix'] == 3) {
    ?>  
<input type="hidden" name="choix" value=3>
<table class="table table-borderless">
  <tbody>
    <tr>
      <td>
      <div class="mx-auto" style="width: 500px;">
<form action="rmExe.php" method="post">
<table class="table table-borderless">
  <tbody>
    <tr>
    <td>
    <div class="form-group">
    <label for="exampleFormControlSelect1">Participations <br> minimal :</label>
    <select class="form-control" name="particip">
      <?php
      for ($i=0; $i <= 99 ; $i++) { 
        echo "<option>";
        echo $i;
        echo "</option>";
      }
      ?>
    </select>
  </div>
  </tbody>
</table>
</div>
<div class="ml-auto" style="width:400px;">
    <button type="submit" class="btn btn-primary mb-2">Validation</button>
</div>
<?php } ?>
<?php
if ($_POST['choix'] == 4) {
    ?>  
<input type="hidden" name="choix" value=4>
<table class="table table-borderless">
  <tbody>
    <tr>
      <td>
      <div class="mx-auto" style="width: 500px;">
<form action="rmExe.php" method="post">
<table class="table table-borderless">
  <tbody>
    <tr>
    <td>
    <div class="mx-auto" style="width: 500px;">
<form action="rmBuvetteExe.php" method="post">
<table class="table table-borderless">
  <tbody>
    <tr>
    <td>
    <p> A-t-il déjà été responsable d'une buvette ? <p>
      <div class="form-check">
  <input class="form-check-input" type="radio" name="particip" id="exampleRadios1" value="1" checked>
  <label class="form-check-label" for="exampleRadios1">
    Oui
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="particip" id="exampleRadios1" value="=0" checked>
  <label class="form-check-label" for="exampleRadios1">
    Non
  </label>
</div>
  </tbody>
</table>
</div>
<div class="ml-auto" style="width:400px;">
    <button type="submit" class="btn btn-primary mb-2">Validation</button>
</div>
<?php } ?>
</form>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
</body>
</html>