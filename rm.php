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
    <br>
    <center>
        <h4> <strong> Recherche de membre(s) </strong> </h4> <br>
        <h6> Rechercher à partir de ces critères : </h6>
    </center>
    <br>
    <center>
        <form action="rm2.php" method="post">
            <button type="submit" name="choix" value="1" class="btn btn-link">Age</button>
            <button type="submit" name="choix" value="2" class="btn btn-link">Nom</button>
            <button type="submit" name="choix" value="3" class="btn btn-link">NB minimal participations </button>
            <button type="submit" name="choix" value="4" class="btn btn-link">Responsable Buvette (Oui/Non)</button>
        </form>
    </center>
    <br> <br> <br> <br>

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