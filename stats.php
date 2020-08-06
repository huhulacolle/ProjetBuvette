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
    <center>
        <h4> <strong> Statistiques </strong> </h4>
        <br> <br>
        <center>
            <form method="post" action="statsexe.php">
                <div class="mx-auto" style="width: 500px;">
                    <table class="table table-borderless">
                        <tr>
                            <td> <input type="radio" name="choix" value="0" /> </td>
                            <td> Les 5 volontaires les plus présents </td>
                        </tr>
                        <tr>
                            <td> <input type="radio" name="choix" value="1" /> </td>
                            <td> Les 5 buvettes ayant le plus de volontaires </td>
                        </tr>
                        <tr>
                            <td> <input type="radio" name="choix" value="3" /> </td>
                            <td> Les buvettes ouvertes pour le match : </td>
                            <td>
                                <div class="form-group">
                                    <select class="form-control" name="buvOpen">
                                        <?php
include_once 'Connect.php';
$sql = 'SELECT idM, e1.pays AS p1, e2.pays AS p2 FROM Matchs, Equipe AS e1, Equipe AS e2 WHERE Matchs.eqA = e1.idE AND Matchs.eqB = e2.idE;';
$sth = $dbh->query($sql);
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    echo '<option value="' . $row['idM'] . '">';
    echo $row['p1'];
    echo ' VS ';
    echo $row['p2'];
    echo '</option>';
}
?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="ml-auto" style="width:700px;">
                    <button type="submit" class="btn btn-primary mb-2">Validation</button>
                </div>
                <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
                    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
                    crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                    crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
                    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
                    crossorigin="anonymous"></script>
</body>

</html>