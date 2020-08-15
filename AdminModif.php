<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crosl</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <?php
include_once 'nav.php';
echo '<form action="admin2.php" method="post">';
echo '<ul class="nav">';
echo '<li class="nav-item">';
echo '<button type="submit" name="choix" value="2" class="btn btn-link">Retour</button>';
echo '</li>';
echo '</ul>';
echo '</form>';
?>
    <form action="adminExe.php" method="post">
        <input type=hidden name="mod" value="Modifier">
        <input type=hidden name="choix" value=2>
        <div class="mx-auto" style="width: 1100px;">

            <table class="table table-borderless">
                <tbody>
                </tbody>
            </table>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col"> idM </th>
                        <th scope="col"> dateM </th>
                        <th scope="col"> eqA </th>
                        <th scope="col"> eqB </th>
                        <th scope="col"> scoreA </th>
                        <th scope="col"> scoreB </th>
                    </tr>
                </thead>
                <?php
include_once 'Connect.php';
$sql = 'SELECT idM, dateM,  e1.pays AS eqA, e2.pays AS eqB, scoreA, scoreB FROM Matchs, Equipe AS e1, Equipe AS e2 WHERE Matchs.eqA = e1.idE AND Matchs.eqB = e2.idE AND idM = ' . $_POST['idM'] . '';
$sth = $dbh->query($sql);
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    echo '<tbody>';
    echo '<tr>';
    echo '<td>';
    echo '<input type="text" class="form-control" value="' . $row['idM'] . '" readonly>';
    echo '</td>';
    echo '<td>';
    echo '<input type="date" class="form-control" name="dateM" value = "' . $row['dateM'] . '" required>';
    echo '</td>';
    echo '<td>';
    echo '<div id="eqA">';
    echo '<input type="text" class="form-control" name="eqA" onclick="change_eqA()" value = "' . $row['eqA'] . '">';
    echo '</div>';
    echo '</td>';
    echo '<td>';
    echo '<div id="eqB">';
    echo '<input type="text" class="form-control" name="eqB" onclick="change_eqB()" value = "' . $row['eqB'] . '">';
    echo '</div>';
    echo '</td>';
    echo '<td>';
    echo '<input type="text" class="form-control" name="scoreA" value = "' . $row['scoreA'] . '">';
    echo '</td>';
    echo '<td>';
    echo '<input type="text" class="form-control" name="scoreB" value = "' . $row['scoreB'] . '">';
    echo '</td>';
}
echo '<input type=hidden name="idM" value=' . $row['idM'] . '>';
?>
                </tr>
                </tbody>
            </Table>
            <script>
            function change_eqA() {
                let elem = document.getElementById("eqA");
                elem.innerHTML = '<?php
                echo '<div class="form-group">';
                echo '<select class="form-control" name="eqA">';

                include_once 'Connect.php';
                $sql = 'SELECT idE, pays FROM Equipe;';
                $sth = $dbh -> query($sql);
                $result = $sth -> fetchAll(PDO::FETCH_ASSOC);
                foreach($result as $row) {
                        echo '<option value="'.$row['pays'].
                        '">';
                        echo $row['pays'];
                        echo '</option>';
                    }
                    ?> ';
            }
            function change_eqB() {
                let elem = document.getElementById("eqB");
                elem.innerHTML = '<?php
                echo '<div class="form-group">';
                echo '<select class="form-control" name="eqB">';

                include_once 'Connect.php';
                $sql = 'SELECT pays FROM Equipe;';
                $sth = $dbh -> query($sql);
                $result = $sth -> fetchAll(PDO::FETCH_ASSOC);
                foreach($result as $row) {
                        echo '<option value="'.$row['pays'].
                        '">';
                        echo $row['pays'];
                        echo '</option>';
                    }

                    ?> ';
            }
            </script>
            <br>
            <div class="ml-auto" style="width:50px;">
                <button type="submit" class="btn btn-primary mb-2">Modifier</button>
            </div>
    </form>
    <br> <br> <br>

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