<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buvette</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
  <?php
include_once('nav.php');
?>
  <br> <br>
  <div class="mx-auto" style="width: 200px;">
    <form method="post" action="statsexe.php">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="exampleRadios" id="0" value="0" checked>
        <label class="form-check-label" for="0">
          Les 5 volontaires les plus présents
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="exampleRadios" id="1" value="1">
        <label class="form-check-label" for="1">
          Les 5 buvettes ayant le plus de volontaires
        </label>
      </div>
      <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="exampleRadios" id="3" value="3">
          <label class="form-check-label" for="3">
            <label for="formGroupExampleInput">Les buvettes ouvertes pour le match numéro</label>
            <input type="text" class="form-control" id="3" placeholder="Saisir Match">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Validation</button>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
          integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
          integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
          integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>
</body>

</html>