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
include 'nav.php';

if ($_POST['choix'] == 1) {
    echo '<form action="admin2.php" method="post">';
    echo '<ul class="nav">';
    echo '<li class="nav-item">';
    echo '<button type="submit" name="choix" value="1" class="btn btn-link">Retour</button>';
    echo '</li>';
    echo '</ul>';
    echo '</form>';
    if ($_POST['mod'] == "Inserer") {

        include 'Connect.php';
        $sql = 'SELECT MAX(idV) as idV FROM Volontaire;';
        $sth = $dbh->query($sql);
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $max = $row['idV'];
        }

        $max = $max + 1;
        $sql = 'Insert Into Volontaire (idV, nomV, age) Values (' . $max . ',"' . $_POST['nomV'] . '","' . $_POST['age'] . '");';
        $sth = $dbh->query($sql);
        echo '</div>';
    } else if ($_POST['mod'] == "Modifier") {
        include 'Connect.php';
        $sql = 'UPDATE Volontaire SET nomV = "' . $_POST['nomV'] . '", age = "' . $_POST['age'] . '" WHERE idV = ' . $_POST['idV'] . '';
        $sth = $dbh->query($sql);
        echo '</div>';

    }
    ?>
    <form name="admin2" action="admin2.php" method="post">
        <input type="hidden" name="choix" value=1>
        <script>
        setTimeout("document.forms['admin2'].submit()", 0);
        </script>
    </form>
    <?php

}
if ($_POST['choix'] == 2) {
    echo '<form action="admin2.php" method="post">';
    echo '<ul class="nav">';
    echo '<li class="nav-item">';
    echo '<button type="submit" name="choix" value="2" class="btn btn-link">Retour</button>';
    echo '</li>';
    echo '</ul>';
    echo '</form>';
    if ($_POST['mod'] == "Inserer") {

        include 'Connect.php';
        $sql = 'SELECT MAX(idM) as idM FROM Matchs;';
        $sth = $dbh->query($sql);
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $max = $row['idM'];
        }

        $max = $max + 1;
        $scoreA = $_POST['scoreA'];
        $scoreB = $_POST['scoreB'];
        if ($scoreA == null) {
            $scoreA = "NULL";
        }
        if ($scoreB == null) {
            $scoreB = "NULL";
        }
        $sql = 'Insert Into Matchs (idM, dateM, eqA, eqB, scoreA, scoreB) Values (' . $max . ',"' . $_POST['dateM'] . '","' . $_POST['eqA'] . '","' . $_POST['eqB'] . '",' . $scoreA . ',' . $scoreB . ');';
        $sth = $dbh->query($sql);
        echo '</div>';
    } else if ($_POST['mod'] == "Modifier") {
        $i = 0;
        include 'Connect.php';
        $scoreA = $_POST['scoreA'];
        $scoreB = $_POST['scoreB'];
        if ($scoreA == null) {
            $scoreA = "NULL";
        }
        if ($scoreB == null) {
            $scoreB = "NULL";
        }
        $sql = 'UPDATE Matchs SET dateM = "' . $_POST['dateM'] . '", eqA = "' . $_POST['eqA'] . '", eqB = "' . $_POST['eqB'] . '", scoreA = ' . $scoreA . ', scoreB = ' . $scoreB . ' WHERE idM = ' . $_POST['idM'] . '';
        $sth = $dbh->query($sql);
        echo '</div>';

    }
    ?>
    <form name="admin2" action="admin2.php" method="post">
        <input type="hidden" name="choix" value=2>
        <script>
        setTimeout("document.forms['admin2'].submit()", 0);
        </script>
    </form>
    <?php

}
if ($_POST['choix'] == 3) {
    echo '<form action="admin2.php" method="post">';
    echo '<ul class="nav">';
    echo '<li class="nav-item">';
    echo '<button type="submit" name="choix" value="2" class="btn btn-link">Retour</button>';
    echo '</li>';
    echo '</ul>';
    echo '</form>';
    if ($_POST['mod'] == "Inserer") {

        include 'Connect.php';
        $sql = 'SELECT MAX(idB) as idB from Buvette';
        $sth = $dbh->query($sql);
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $max = $row['idB'];
        }

        $max = $max + 1;
        $sql = 'Insert Into Buvette (idB, nomB, emplacement, responsable ) Values (' . $max . ',"' . $_POST['nomB'] . '","' . $_POST['emplacement'] . '",' . $_POST['responsable'] . ')';
        $sth = $dbh->query($sql);
        echo '</div>';
    } else if ($_POST['mod'] == "Modifier") {
        include 'Connect.php';
        $sql = 'UPDATE Buvette SET nomB = "' . $_POST['nomB'] . '", emplacement = "' . $_POST['emplacement'] . '", responsable = "' . $_POST['responsable'] . '" WHERE idB = ' . $_POST['idB'] . '';
        $sth = $dbh->query($sql);
        echo '</div>';

    }
    ?>
    <form name="admin2" action="admin2.php" method="post">
        <input type="hidden" name="choix" value=3>
        <script>
        setTimeout("document.forms['admin2'].submit()", 0);
        </script>
    </form>
    <?php
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