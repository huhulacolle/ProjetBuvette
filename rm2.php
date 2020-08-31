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
include_once 'nav.php';
?>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" href="rm.php">Retour</a>
        </li>
    </ul>
    <br>
    <div class="mx-auto" style="width: 700px;">
        <form action="rm2.php" method="post">
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
                                <input type="number" class="form-control" name="amin" required>
                                </select>
                            </div>
                        </td>
                        <br>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Age Maximal :</label>
                                <input type="number" class="form-control" name="amax" required>
                                </select>
                            </div>
    </div>
    </td>
    <td>
        <div class="ml-auto" style="width:400px;">
            <button type="submit" class="btn btn-primary mb-2">Ajouter</button>
    </td>
    </tr>
    </tbody>
    </table>
    </div>
    <?php
if (isset($_POST['amin'])) {

        include 'Connect.php';
        if ($_POST['amin'] > $_POST['amax']) {
            echo '<br> <br> <br> <br> <br> <br>';
            echo "<center> <h2><strong> Erreur : </strong> Âge Maximal inferieur à l'âge minimal </h2> </center>";

        } else {
            $sql = 'SELECT DISTINCT V.nomV FROM Buvette, EstPresent
    E INNER JOIN Volontaire V ON E.idV = V.idV
    and age between ' . $_POST['amin'] . ' and ' . $_POST['amax'] . '';
            $sth = $dbh->query($sql);
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            if ($result == null) {
                echo '<br> <br> <br> <br> <br> <br>';
                echo "<center> <h2> Aucune personne n'a été trouvée </h2> </center>";
            } else {
                echo '<br>';
                echo '<center>';
                echo '<h4>  les personnes que vous cherchez sont : </h4>';
                echo '</center>';
                foreach ($result as $row) {

                    echo '<br>';
                    echo '<center>';
                    echo '<h3>';
                    echo '<strong>';
                    echo $row['nomV'];
                    echo '</strong>';
                    echo '</h3>';
                    echo '</center>';
                }
            }
        }
        echo '</div>';
    }
}?>
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
                                                <input type="text" class="form-control" name="nomV"
                                                    placeholder="Lindgren" required>
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
    <?php
if (isset($_POST['nomV'])) {
        include 'Connect.php';
        $sql = 'SELECT DISTINCT V.nomV FROM Buvette, EstPresent
        E INNER JOIN Volontaire V ON E.idV = V.idV
        WHERE nomV like "%' . $_POST['nomV'] . '"';
        $sth = $dbh->query($sql);
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        if ($_POST['nomV'] == null) {
            echo '<br> <br> <br> <br> <br> <br>';
            echo "<center> <h2> Vous avez oublié de marquer un nom </h2> </center>";
        } else if ($result == null) {
            echo '<br> <br> <br> <br> <br> <br>';
            echo "<center> <h2> Aucune personne n'a été trouvée </h2> </center>";
        } else {
            echo '<br>';
            echo '<center>';
            echo '<h4>  les personnes que vous cherchez sont : </h4>';
            echo '</center>';
            foreach ($result as $row) {

                echo '<br>';
                echo '<center>';
                echo '<h3>';
                echo '<strong>';
                echo $row['nomV'];
                echo '</strong>';
                echo '</h3>';
                echo '</center>';
            }
        }

        $dbh = null;
        echo '</div>';
    }
}?>
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
                                                <label for="exampleFormControlSelect1">Participations <br> minimal
                                                    :</label>
                                                <input type="number" class="form-control" name="particip" required>
                                            </div>
                                </tbody>
                            </table>
                    </div>
                    <div class="ml-auto" style="width:400px;">
                        <button type="submit" class="btn btn-primary mb-2">Validation</button>
                    </div>
                    <?php
if (isset($_POST['particip'])) {
        include 'Connect.php';
        $sql = 'SELECT distinct V.nomV AS Vnom FROM EstPresent E INNER JOIN Volontaire V ON E.idV = V.idV GROUP BY E.idV HAVING COUNT(idB) >= ' . $_POST['particip'] . '';
        $sth = $dbh->query($sql);
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        if ($result == null) {
            echo '<br> <br> <br> <br> <br> <br>';
            echo "<center> <h2> Aucune personne n'a été trouvée </h2> </center>";
        } else {
            echo '<br>';
            echo '<center>';
            echo '<h4>  les personnes que vous cherchez sont : </h4>';
            echo '</center>';
            foreach ($result as $row) {

                echo '<br>';
                echo '<center>';
                echo '<h3>';
                echo '<strong>';
                echo $row['Vnom'];
                echo '</strong>';
                echo '</h3>';
                echo '</center>';
            }
        }
        echo '</div>';
    }
}?>
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
                                                                                    <p> A-t-il déjà été responsable
                                                                                        d'une buvette ?
                                                                                    <p>
                                                                                    <div class="form-check">
                                                                                        <input class="form-check-input"
                                                                                            type="radio"
                                                                                            name="particip2"
                                                                                            id="exampleRadios1"
                                                                                            value="1" checked>
                                                                                        <label class="form-check-label"
                                                                                            for="exampleRadios1">
                                                                                            Oui
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="form-check">
                                                                                        <input class="form-check-input"
                                                                                            type="radio"
                                                                                            name="particip2"
                                                                                            id="exampleRadios1"
                                                                                            value="=0" checked>
                                                                                        <label class="form-check-label"
                                                                                            for="exampleRadios1">
                                                                                            Non
                                                                                        </label>
                                                                                    </div>
                                                                        </tbody>
                                                                    </table>
                                                            </div>
                                                            <div class="ml-auto" style="width:400px;">
                                                                <button type="submit"
                                                                    class="btn btn-primary mb-2">Validation</button>
                                                            </div>
                                                            <?php
if (isset($_POST['particip2'])) {
        if ($_POST['particip2'] == 1) {
            include 'Connect.php';
            $sql = 'SELECT nomV FROM Volontaire, Buvette WHERE Volontaire.idV = Buvette.responsable GROUP BY nomV;';
            $sth = $dbh->query($sql);
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            if ($result == null) {
                echo '<br> <br> <br> <br> <br> <br>';
                echo "<center> <h2> Aucune personne n'a été trouvée </h2> </center>";
            } else {
                echo '<br>';
                echo '<center>';
                echo '<h4>  les personnes que vous cherchez sont : </h4>';
                echo '</center>';
                foreach ($result as $row) {

                    echo '<br>';
                    echo '<center>';
                    echo '<h3>';
                    echo '<strong>';
                    echo $row['nomV'];
                    echo '</strong>';
                    echo '</h3>';
                    echo '</center>';
                }
            }
        } else {
            include 'Connect.php';
            $sql = 'SELECT DISTINCT t1.nomV as "nomV" FROM Volontaire t1 LEFT JOIN Buvette t2 ON t2.responsable = t1.idV WHERE t2.responsable IS NULL';
            $sth = $dbh->query($sql);
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            if ($result == null) {
                echo '<br> <br> <br> <br> <br> <br>';
                echo "<center> <h2> Aucune personne n'a été trouvée </h2> </center>";
            } else {
                echo '<br>';
                echo '<center>';
                echo '<h4>  les personnes que vous cherchez sont : </h4>';
                echo '</center>';
                foreach ($result as $row) {

                    echo '<br>';
                    echo '<center>';
                    echo '<h3>';
                    echo '<strong>';
                    echo $row['nomV'];
                    echo '</strong>';
                    echo '</h3>';
                    echo '</center>';
                }
            }
        }
        $dbh = null;
        echo '</div>';
    }

}?>
                                        </form>
                                        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
                                            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
                                            crossorigin="anonymous"></script>
                                        <script
                                            src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                                            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                                            crossorigin="anonymous"></script>
                                        <script
                                            src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
                                            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
                                            crossorigin="anonymous"></script>
</body>

</html>