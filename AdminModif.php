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
    include_once('nav.php');
    if ($_POST['choix'] == 1) {
        echo '<form action="admin2.php" method="post">';
        echo '<ul class="nav">';
        echo '<li class="nav-item">';
        echo '<button type="submit" name="choix" value="1" class="btn btn-link">Retour</button>';
        echo '</li>';
        echo '</ul>';
        echo '</form>';
        ?>
  <form action="adminExe.php" method="post">
    <input type=hidden name="mod" value="Modifier">
    <input type=hidden name="choix" value=1>
    <div class="mx-auto" style="width: 1000px;">

      <table class="table table-borderless">
        <tbody>
        </tbody>
      </table>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col"> idV </th>
            <th scope="col"> nomV </th>
            <th scope="col"> age </th>
          </tr>
        </thead>
        <?php
    include_once('connect.php'); 
    $sql =  'SELECT * FROM Volontaire WHERE idV = '.$_POST['idV'].'';
    $sth = $dbh->query($sql); 
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);  
    foreach ($result as $row){ 
    echo '<tbody>';
    echo '<tr>';
          echo '<td>'; echo  $row['idV'];  echo '</td>';
          echo '<td>'; echo'<input type="text" name="nomV" value = "'.$row['nomV'].'">';  ; echo '</td>';
          echo '<td>'; echo '<input type="text" name="age" value = "'. $row['age'].'">'; echo '</td>';
      }
      echo '<input type=hidden name="idV" value='.$row['idV'].'>';
    }
    else if ($_POST['choix'] == 2) {
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
          <div class="mx-auto" style="width: 1200px;">

            <table class="table table-borderless">
              <tbody>
              </tbody>
            </table>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col"> idV </th>
                  <th scope="col"> dateM </th>
                  <th scope="col"> eqA </th>
                  <th scope="col"> eqB </th>
                  <th scope="col"> scoreA </th>
                  <th scope="col"> scoreB </th>
                </tr>
              </thead>
              <?php
    include_once('connect.php'); 
    $sql =  'SELECT * FROM Matchs WHERE idM = '.$_POST['idM'].'';
    $sth = $dbh->query($sql); 
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);  
    foreach ($result as $row){ 
    echo '<tbody>';
    echo '<tr>';
          echo '<td>'; echo  $row['idM'];  echo '</td>';
          echo '<td>'; echo'<input type="date" name="dateM" value = "'.$row['dateM'].'">';  ; echo '</td>';
          echo '<td>'; echo'<input type="text" name="eqA" value = "'.$row['eqA'].'">';  ; echo '</td>';
          echo '<td>'; echo '<input type="text" name="eqB" value = "'. $row['eqB'].'">'; echo '</td>';
          echo '<td>'; echo'<input type="text" name="scoreA" value = "'.$row['scoreA'].'">';  ; echo '</td>';
          echo '<td>'; echo '<input type="text" name="scoreB" value = "'. $row['scoreB'].'">'; echo '</td>';
      }
      echo '<input type=hidden name="idM" value='.$row['idM'].'>';
    }
    else if ($_POST['choix'] == 3) {
        echo '<form action="admin2.php" method="post">';
        echo '<ul class="nav">';
        echo '<li class="nav-item">';
        echo '<button type="submit" name="choix" value="3" class="btn btn-link">Retour</button>';
        echo '</li>';
        echo '</ul>';
        echo '</form>';
        ?>
              <form action="adminExe.php" method="post">
                <input type=hidden name="mod" value="Modifier">
                <input type=hidden name="choix" value=3>
                <div class="mx-auto" style="width: 1200px;">

                  <table class="table table-borderless">
                    <tbody>
                    </tbody>
                  </table>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col"> idB </th>
                        <th scope="col"> nomB </th>
                        <th scope="col"> emplacement </th>
                        <th scope="col"> responsable </th>
                      </tr>
                    </thead>
                    <?php
    include_once('connect.php'); 
    $sql =  'SELECT * FROM Buvette WHERE idB = '.$_POST['idB'].'';
    $sth = $dbh->query($sql); 
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);  
    foreach ($result as $row){ 
    echo '<tbody>';
    echo '<tr>';
          echo '<td>'; echo  $row['idB'];  echo '</td>';
          echo '<td>'; echo'<input type="text" name="nomB" value = "'.$row['nomB'].'">';  ; echo '</td>';
          echo '<td>'; echo'<input type="text" name="emplacement" value = "'.$row['emplacement'].'">';  ; echo '</td>';
          echo '<td>'; echo '<input type="text" name="responsable" value = "'. $row['responsable'].'">'; echo '</td>';
      }
      echo '<input type=hidden name="idB" value='.$row['idB'].'>';
    }
?>
                    </tr>
                    </tbody>
                  </Table>
                  <br>
                  <div class="ml-auto" style="width:50px;">
                    <button type="submit" class="btn btn-primary mb-2">Modifier</button>
                  </div>
              </form>
              <br> <br> <br>

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