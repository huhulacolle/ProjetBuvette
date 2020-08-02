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
    <form action="admin.php" method="post">
        <ul class="nav">
        <li class="nav-item">
        <button type="submit" name="pass" value="admins" class="btn btn-link">Retour</button>
        </li>
        </ul>
    </form>
<br>
<?php
if ($_POST['choix'] == 1) {
    ?>  
<input type="hidden" name="choix" value=1>
<?php
include_once('Connect.php');
    $sql =  'SELECT MAX(idV) as idV from volontaire';
    $sth = $dbh->query($sql); 
    $result = $sth->fetchAll(PDO::FETCH_ASSOC); 
    foreach ($result as $row){ 
    $max = $row['idV'];
    }
    $max++;
    echo '<br>';
    echo '<div class="mx-auto" style="width: 800px;">';
    ?>
    <Table class="table">
  <thead>
    <tr>
    <th scope="col"> idV </th>
    <th scope="col"> nomV </th>
    <th scope="col"> age </th>
    <th scope="col"> </th>
    </tr>
  </thead>
<?php
include_once('Connect.php'); 
$sql =  'SELECT * FROM volontaire';
$sth = $dbh->query($sql); 
$result = $sth->fetchAll(PDO::FETCH_ASSOC); 
foreach ($result as $row) {
    echo '<tbody>';
    echo '<tr>';
          echo '<td>'; echo  $row['idV']; echo '</td>';
          echo '<td>'; echo  $row['nomV']; echo '</td>';
          echo '<td>'; echo $row['age']; echo '</td>';
}
?>
<form action="adminExe.php" method="post">
<input type="hidden" name="choix" value="1">
</tr>
<tr>
    <td>
        <?php
            echo '<input type=text class="form-control" value="'.$max.'"readonly>';
        ?>
    </td>
    <form action="adminExe.php">
    <input type="hidden" name="mod" value="Inserer">
    <td>
        <input type="text" class="form-control" name="nomV">
    </td>
    <td>
        <?php
        echo '<select class="form-control" name="age">';
        for ($i=1; $i <= 150 ; $i++) { 
          echo "<option>";
          echo $i;
          echo "</option>";
        }
        ?>
    </td>
    <td colspan="2">
    <button type="submit" class="btn btn-primary btn-lg btn-block">Ajouter</button>
    </td>
    </form>
</tr>
</tbody>
</Table>
</div>
<?php
} ?>
<?php
if ($_POST['choix'] == 2) {
  ?>  
  <input type="hidden" name="choix" value=2>
  <?php
  include_once('Connect.php');
      $sql =  'SELECT MAX(idM) as idM from matchs';
      $sth = $dbh->query($sql); 
      $result = $sth->fetchAll(PDO::FETCH_ASSOC); 
      foreach ($result as $row){ 
      $max = $row['idM'];
      }
      $max++;
      echo '<br>';
      echo '<div class="mx-auto" style="width: 1200px;">';
      ?>
      <Table class="table">
    <thead>
      <tr>
      <th scope="col"> idM </th>
      <th scope="col"> dateM </th>
      <th scope="col"> eqA </th>
      <th scope="col"> eqB </th>
      <th scope="col"> scoreA </th>
      <th scope="col"> scoreB </th>
      <th scope="col"> </th>
      </tr>
    </thead>
  <?php
  include_once('Connect.php'); 
  $sql =  'SELECT idM, dateM,  e1.pays AS eqA, e2.pays AS eqB, scoreA, scoreB FROM matchs, equipe AS e1, equipe AS e2 WHERE matchs.eqA = e1.idE AND matchs.eqB = e2.idE;';
  $sth = $dbh->query($sql); 
  $result = $sth->fetchAll(PDO::FETCH_ASSOC); 
  foreach ($result as $row) {
      echo '<tbody>';
      echo '<tr>';
            echo '<td>'; echo  $row['idM']; echo '</td>';
            echo '<td>'; echo  $row['dateM']; echo '</td>';
            echo '<td>'; echo $row['eqA']; echo '</td>';
            echo '<td>'; echo  $row['eqB']; echo '</td>';
            echo '<td>'; echo  $row['scoreA']; echo '</td>';
            echo '<td>'; echo $row['scoreB']; echo '</td>';
            echo '<td>';
            echo '<form action="AdminModif.php" method="post">'; 
            echo '<input type=hidden name="choix" value=2>';
            echo '<button type="submit" name="idM" value="'.$row['idM'].'" class="btn btn-primary mb-2">Modifier</button>';
            echo '</form>';
            echo '</td>';
  }
  ?>
  <form action="adminExe.php" method="post">
  <input type="hidden" name="choix" value="2">
  </tr>
  <tr>
      <td>
          <?php
              echo '<input type=text class="form-control" value="'.$max.'"readonly>';
          ?>
      </td>
      <form action="adminExe.php">
      <input type="hidden" name="mod" value="Inserer">
      <td>
          <input type="date" class="form-control" name="dateM">
      </td>
      <td>
  <div class="form-group">
    <select class="form-control" name="eqA">
  <?php
       include_once('Connect.php'); 
       $sql =  'SELECT idE, pays FROM equipe;';
       $sth = $dbh->query($sql); 
       $result = $sth->fetchAll(PDO::FETCH_ASSOC); 
       foreach ($result as $row) {
         echo '<option value="'.$row['idE'].'">'; echo $row['pays'];  echo '</option>';
       }
  ?>
    </select>
  </div>
  </td>
  <td>
  <div class="form-group">
    <select class="form-control" name="eqB">
  <?php
       include_once('Connect.php'); 
       $sql =  'SELECT idE, pays FROM equipe;';
       $sth = $dbh->query($sql); 
       $result = $sth->fetchAll(PDO::FETCH_ASSOC); 
       foreach ($result as $row) {
         echo '<option value="'.$row['idE'].'">'; echo $row['pays'];  echo '</option>';
       }
  ?>
    </select>
  </div>
  </td>
      <td>
      <input type="number" class="form-control" name="scoreA">       
      </td>
      <td>
      <input type="number" class="form-control" name="scoreB">       
      </td>
      <td colspan="2">
      <button type="submit" class="btn btn-primary btn-lg btn-block">Ajouter</button>
      </td>
      </form>
  </tr>
  </tbody>
  </Table>
  </div>
  <?php } ?>
<?php
if ($_POST['choix'] == 3) {
  ?>  
  <input type="hidden" name="choix" value=3>
  <?php
  include_once('Connect.php');
      $sql =  'SELECT MAX(idB) as idB from buvette';
      $sth = $dbh->query($sql); 
      $result = $sth->fetchAll(PDO::FETCH_ASSOC); 
      foreach ($result as $row){ 
      $max = $row['idB'];
      }
      $max++;
      echo '<br>';
      echo '<div class="mx-auto" style="width: 800px;">';
      ?>
      <Table class="table">
    <thead>
      <tr>
      <th scope="col"> idB </th>
      <th scope="col"> nomB </th>
      <th scope="col"> emplacement </th>
      <th scope="col"> responsable </th>
      <th scope="col"> </th>
      </tr>
    </thead>
  <?php
  include_once('Connect.php'); 
  $sql =  'SELECT idB, nomB, emplacement, responsable, nomV FROM buvette, volontaire WHERE buvette.responsable = volontaire.idv;';
  $sth = $dbh->query($sql); 
  $result = $sth->fetchAll(PDO::FETCH_ASSOC); 
  foreach ($result as $row) {
      echo '<tbody>';
      echo '<tr>';
            echo '<td>'; echo  $row['idB']; echo '</td>';
            echo '<td>'; echo  $row['nomB']; echo '</td>';
            echo '<td>'; echo $row['emplacement']; echo '</td>';
            echo '<td>'; echo  $row['nomV']; echo '</td>';
  }
  ?>
  <form action="adminExe.php" method="post">
  <input type="hidden" name="choix" value=3>
  </tr>
  <tr>
      <td>
          <?php
              echo '<input type=text class="form-control" value="'.$max.'"readonly>';
          ?>
      </td>
      <form action="adminExe.php">
      <input type="hidden" name="mod" value="Inserer">
  <td>
  <input type="text" class="form-control" name="nomB">   
  </td>
      <td>
      <input type="text" class="form-control" name="emplacement">       
      </td>
      <td>
        <?php
        echo '<select class="form-control" name="responsable">';
        $sql =  'SELECT idV, nomV FROM volontaire;';
        $sth = $dbh->query($sql); 
        $result = $sth->fetchAll(PDO::FETCH_ASSOC); 
        foreach ($result as $row) {
          echo '<option value="'.$row['idV'].'">'; echo $row['nomV']; echo "</option>";
        }
        ?>
    </td>
      <td colspan="2">
      <button type="submit" class="btn btn-primary btn-lg btn-block">Ajouter</button>
      </td>
      </form>
  </tr>
  </tbody>
  </Table>
  </div>
  <?php } ?>
</form>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
</body>
</html>