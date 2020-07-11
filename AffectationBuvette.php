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
        <a class="nav-link active" href="Affectation.php">Retour</a>
        </li>
        </ul>
<br>
<div class="mx-auto" style="width: 500px;">
<form action="AffectationBuvetteExe.php" method="post">
<center> Buvettes Ouvertes </center>
<br> <br>
<table class="table table-borderless">

<tr>
<th scope="col"> Match : </th>
<td>
<div class="form-group">
    <select class="form-control" name="idM">
<?php
include_once('connect.php'); 
$sql =  'SELECT idM, e1.pays AS p1, e2.pays AS p2 FROM Matchs, Equipe AS e1, Equipe AS e2 WHERE Matchs.eqA = e1.idE AND Matchs.eqB = e2.idE;';
$sth = $dbh->query($sql); 
$result = $sth->fetchAll(PDO::FETCH_ASSOC);  
foreach ($result as $row){ 
echo '<option value="'.$row['idM'].'">'; echo $row['p1']; echo ' vs '; echo $row['p2'];  echo '</option>';
  }
?>
</div>
</td>
</tr>
<tr>
<th scope="col"> Buvette : </th>

<td>
<div class="form-group">
    <select class="form-control" name="idB">
<?php
include_once('connect.php'); 
$sql =  'SELECT idB, nomB FROM Buvette';
$sth = $dbh->query($sql); 
$result = $sth->fetchAll(PDO::FETCH_ASSOC);  
foreach ($result as $row){ 
echo '<option value="'.$row['idB'].'">'; echo $row['nomB']; echo '</option>';
  }
?>
</div>
</td>
</tr>
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