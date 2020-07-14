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
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" href="AffectationBuvette.php">Retour</a>
        </li>
    </ul>
    <?php
echo '<br>';
include_once('connect.php'); 
$sql =  'SELECT idB FROM EstOuverte WHERE idM = '.$_POST['idM'].' AND idB = '.$_POST['idB'].'';
$sth = $dbh->query($sql); 
$result = $sth->fetchAll(PDO::FETCH_ASSOC);  
if ($result == NULL) {
    ?>
    <br>
    <center>
        <h4> Cette buvette n'est pas ouverte pour ce match </h4>
    </center>
    <?php
}
else {
    $sql =  'SELECT nomB FROM Buvette WHERE idB = '.$_POST['idB'].'';
    $sth = $dbh->query($sql); 
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row){ 
        $idB = $row['nomB'];
    }
    $sql =  'SELECT eqA, eqB FROM Matchs WHERE idM = '.$_POST['idM'].'';
    $sth = $dbh->query($sql); 
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row){ 
        $eqA = $row['eqA'];
        $eqB = $row['eqB'];
    }
    echo "<center> <h2> La buvette $idB est ouverte pour le match opposant l'equipe $eqA contre l'équipe $eqB </h2> </center>";
}
?>

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