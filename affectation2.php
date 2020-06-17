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
<br>
<div class="mx-auto" style="width: 700px;">
<form action="affectationexe.php" method="post">
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Nouveau Responsable</th>
      <th scope="col">Nouveau Volontaire</th>
      <th scope="col">Buvette Ouverte</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><input type="text" name="BidB" placeholder="Buvette" />
      <br> <br>
      <input type="text" name="BidV" placeholder="Volontaire" />
	  <br> <br>
	  <input type="text" name="BidM" placeholder="Match" />
      </td>
      <td><input type="text" name="VidM" placeholder="Buvette" />
      <br> <br>
      <input type="text" name="VidB" placeholder="Volontaire" />
	  <br> <br>
	  <input type="text" name="VidM" placeholder="Match" /></td>
      <td>
        <input type="text" name="OidM" placeholder="Match" /></p>
        <input type="text" name="OidB" placeholder="Buvette" /></p>
    </tr>
    <tr>
      <td> <center> <input type="radio" name="choix" value="1">  </center> </td>
      <td><center> <input type="radio" name="choix" value="2">  </center></td>
      <td><center> <input type="radio" name="choix" value="3">  </center></td>
    </tr>
  </tbody>
</table>
</div>
<div class="ml-auto" style="width:350px;">
    <button type="submit" class="btn btn-primary mb-2">Validation</button>
</div>
</form>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
</body>
</html>