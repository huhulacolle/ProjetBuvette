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
include('nav.php');

if ($_POST['choix'] == 1) {
    echo '<form action="rm2.php" method="post">';
    echo '<ul class="nav">';
    echo '<li class="nav-item">';
    echo '<button type="submit" name="choix" value="1" class="btn btn-link">Retour</button>';
    echo '</li>';
    echo '</ul>';

    include('Connect.php'); 
     if ($_POST['amin'] > $_POST['amax']) {
        echo '<br> <br> <br> <br> <br> <br>';
    echo "<center> <h2><strong> Erreur : </strong> Âge Maximal inferieur à l'âge minimal </h2> </center>";

    }
    else {
$sql =  'SELECT DISTINCT V.nomV FROM Buvette, EstPresent
E INNER JOIN Volontaire V ON E.idV = V.idV
and age between '.$_POST['amin'].' and '.$_POST['amax'].'';
$sth = $dbh->query($sql); 
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
if ($result == NULL)
{
    echo '<br> <br> <br> <br> <br> <br>';
	echo "<center> <h2> Aucune personne n'a été trouvée </h2> </center>";
}
else
{  
    echo '<br>';
    echo '<div class="ml-auto" style="width:1200px;">';
    echo '<h4>  les personnes que vous cherchez sont : </h4>';
    echo '</div>';
foreach ($result as $row){ 

    echo '<br>';
    echo '<center>';
    echo  '<h3>' ; echo '<strong>'; echo $row['nomV']; echo '</strong>'; echo '</h3>';
	echo '</center>';
}
}
}
$dbh=NULL;
echo '</div>';
}
if ($_POST['choix'] == 2) {
    echo '<form action="rm2.php" method="post">';
    echo '<ul class="nav">';
    echo '<li class="nav-item">';
    echo '<button type="submit" name="choix" value="2" class="btn btn-link">Retour</button>';
    echo '</li>';
    echo '</ul>';
    
    include('Connect.php'); 
    $sql =  'SELECT DISTINCT V.nomV FROM Buvette, EstPresent
    E INNER JOIN Volontaire V ON E.idV = V.idV
    WHERE nomV like "%'.$_POST['nomV'].'"';
    $sth = $dbh->query($sql); 
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    if ($_POST['nomV'] == NULL) {
        echo '<br> <br> <br> <br> <br> <br>';
        echo "<center> <h2> Vous avez oublié de marquer un nom </h2> </center>";
    }
    else if ($result == NULL)
    {
        echo '<br> <br> <br> <br> <br> <br>';
        echo "<center> <h2> Aucune personne n'a été trouvée </h2> </center>";
    }
    else
    {  
        echo '<br>';
        echo '<div class="ml-auto" style="width:1200px;">';
        echo '<h4>  les personnes que vous cherchez sont : </h4>';
        echo '</div>';
    foreach ($result as $row){ 
    
        echo '<br>';
        echo '<center>';
        echo  '<h3>' ; echo '<strong>'; echo $row['nomV']; echo '</strong>'; echo '</h3>';
        echo '</center>';
    }
    }

$dbh=NULL;
echo '</div>';
}
if ($_POST['choix'] == 3) {
    echo '<form action="rm2.php" method="post">';
    echo '<ul class="nav">';
    echo '<li class="nav-item">';
    echo '<button type="submit" name="choix" value="3" class="btn btn-link">Retour</button>';
    echo '</li>';
    echo '</ul>';
    
    include('Connect.php'); 
    $sql =  'SELECT distinct V.nomV AS Vnom FROM EstPresent E INNER JOIN Volontaire V ON E.idV = V.idV GROUP BY E.idV HAVING COUNT(idB) >= '.$_POST['particip'].'';
    $sth = $dbh->query($sql); 
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    if ($result == NULL)
    {
        echo '<br> <br> <br> <br> <br> <br>';
        echo "<center> <h2> Aucune personne n'a été trouvée </h2> </center>";
    }
    else
    {  
        echo '<br>';
        echo '<div class="ml-auto" style="width:1200px;">';
        echo '<h4>  les personnes que vous cherchez sont : </h4>';
        echo '</div>';
    foreach ($result as $row){ 
    
        echo '<br>';
        echo '<center>';
        echo  '<h3>' ; echo '<strong>'; echo $row['Vnom']; echo '</strong>'; echo '</h3>';
        echo '</center>';
    }
    }
$dbh=NULL;
echo '</div>';
}
if ($_POST['choix'] == 4) {
    echo '<form action="rm2.php" method="post">';
    echo '<ul class="nav">';
    echo '<li class="nav-item">';
    echo '<button type="submit" name="choix" value="4" class="btn btn-link">Retour</button>';
    echo '</li>';
    echo '</ul>';
    
    if ($_POST['particip'] == 1 ) {
        include('Connect.php'); 
        $sql =  'SELECT nomV FROM Volontaire, Buvette WHERE Volontaire.idV = Buvette.responsable GROUP BY nomV;';
        $sth = $dbh->query($sql); 
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        if ($result == NULL)
        {
            echo '<br> <br> <br> <br> <br> <br>';
            echo "<center> <h2> Aucune personne n'a été trouvée </h2> </center>";
        }
        else
        {  
            echo '<br>';
            echo '<div class="ml-auto" style="width:1200px;">';
            echo '<h4>  les personnes que vous cherchez sont : </h4>';
            echo '</div>';
        foreach ($result as $row){ 
        
            echo '<br>';
            echo '<center>';
            echo  '<h3>' ; echo '<strong>'; echo $row['nomV']; echo '</strong>'; echo '</h3>';
            echo '</center>';
        }
        }
    }
else {
    include('Connect.php'); 
        $sql =  'SELECT DISTINCT t1.nomV as "nomV" FROM Volontaire t1 LEFT JOIN Buvette t2 ON t2.responsable = t1.idV WHERE t2.responsable IS NULL';
        $sth = $dbh->query($sql); 
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        if ($result == NULL)
        {
            echo '<br> <br> <br> <br> <br> <br>';
            echo "<center> <h2> Aucune personne n'a été trouvée </h2> </center>";
        }
        else
        {  
            echo '<br>';
            echo '<div class="ml-auto" style="width:1200px;">';
            echo '<h4>  les personnes que vous cherchez sont : </h4>';
            echo '</div>';
        foreach ($result as $row){ 
        
            echo '<br>';
            echo '<center>';
            echo  '<h3>' ; echo '<strong>'; echo $row['nomV']; echo '</strong>'; echo '</h3>';
            echo '</center>';
        }
        }
}
$dbh=NULL;
echo '</div>';
}

?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
</body>
</html>