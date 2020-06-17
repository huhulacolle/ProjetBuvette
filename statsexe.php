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
        <a class="nav-link active" href="stats.php">Retour</a>
        </li>
        </ul>
<?php
include_once('Connect.php');
require 'fonctions.php';
echo '<br>';
echo '<div class="mx-auto" style="width: 600px;">';
if ($_POST['choix'] == NULL)
{
   echo "Erreur : aucune option n'a était saisi";
}
else if ($_POST['choix'] == 0)
{
	$idV=0;
   TopVolon($idV);
}
else if ($_POST['choix'] == 1)
{
		$idB=0;
	TopBuv($idB);
}
else 
{
	$idB=0;
  StatMatch($idB);
}
?>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
</body>
</html>