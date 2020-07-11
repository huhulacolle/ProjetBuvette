<?php

function affichematch ($idM) {
require'connect.php';
$i = 0;

$sql = 'SELECT COUNT(idB) AS ddb from EstOuverte group by idM';
$sth = $dbh->query($sql);
$result = $sth->fetchAll(PDO::FETCH_ASSOC); 
foreach ($result as $row){ 

       $ddb[$i] = $row['ddb'];
       $i++;
}

$i = 0;
$sql = 'SELECT count(DISTINCT idV) AS ddv FROM EstPresent GROUP BY idM';
$sth = $dbh->query($sql);
$result = $sth->fetchAll(PDO::FETCH_ASSOC); 
foreach ($result as $row){ 
      $ddv[$i] = $row['ddv'];
      $i++;
}

$i = 0;
$sql =  'SELECT dateM, e1.pays AS p1, e1.drapeau AS drapeau1, e2.pays AS p2, e2.drapeau AS drapeau2, scoreA, scoreB FROM Matchs, Equipe AS e1, Equipe AS e2 WHERE Matchs.eqA = e1.idE AND Matchs.eqB = e2.idE';
$sth = $dbh->query($sql); 
$result = $sth->fetchAll(PDO::FETCH_ASSOC); 
echo '</br>'; echo '</br>'; 
echo '<Table class="table">';
echo '<thead>';
echo '<tr>';
echo '<th scope="col"> Date </th>';
echo '<th scope="col"> EquipeA </th>';
echo '<th scope="col"> DrapeauA </th>';
echo '<th scope="col"> EquipeB </th>';
echo '<th scope="col"> DrapeauB </th>';
echo '<th scope="col"> Score </th>';
echo '<th scope="col"> Nb Buvettes Ouvertes </th>';
echo '<th scope="col"> Nb Volontaires Participants </th>';

echo '</tr>';
echo '</thead>';
foreach ($result as $row){ 
echo '<tbody>';
echo '<tr>';
      echo '<td>'; echo  $row['dateM']; echo '</td>';
      echo '<td>'; echo  $row['p1']; echo '</td>';
      echo '<td>'; echo '<img src="'.$row['drapeau1'].'" width="100"/>'; echo '</td>';
      echo '<td>'; echo $row['p2']; echo '</td>';
      echo '<td>';  echo '<img src="'.$row['drapeau2'].'" width="100"/>'; echo '</td>';
      echo '<td>'; echo $row['scoreA'] ; echo ' - '; echo $row['scoreB']; echo '</td>';
      echo '<td>'; echo $ddb[$i]; echo '</td>';
      echo '<td>'; echo $ddv[$i]; echo '</td>';
      $i++;
	  
}
echo '</tr>';
echo '</tbody>';
echo '</table>';
$dbh=NULL; 
}

function TopVolon ($idV) {
	require'connect.php';
$sql=('SELECT V.idV,Age,NomV,COUNT(DISTINCT idm) FROM EstPresent P, Volontaire V WHERE V.IDV=P.IDV GROUP BY idV ORDER BY 4 DESC LIMIT 5');
   $sth = $dbh->query($sql);
   $result = $sth->fetchAll(PDO::FETCH_ASSOC); 
   echo '<Table class="table">';
   echo '<thead>';
   echo '<tr>';
   echo '<th scope="col">ID Volontaire</th>';
   echo '<th scope="col">Nom Volontaire</th>';
   echo '<th scope="col">Age</th>';
   echo '<th scope="col">Nb Matchs</th>';
   echo '</tr>';
   echo '</thead>';
   foreach ($result as $row){ 
      echo '<tbody>';
      echo '<tr>';
      echo '<td>'; echo  $row['idV']; echo '</td>';
	  echo '<td>'; echo  $row['NomV']; echo '</td>';
		 echo '<td>'; echo  $row['Age']; echo '</td>';
      echo '<td>'; echo  $row['COUNT(DISTINCT idm)']; echo '</td>';
      echo '</tr>';
      echo '</tbody>';
   }
   echo '</table>';
   $dbh=NULL; 
}
function TopBuv ($idB) {
	require'connect.php';
$sql=('SELECT E.idB, nomB, emplacement,COUNT(DISTINCT E.idV) FROM EstPresent E, Buvette B WHERE B.idB = E.idB GROUP BY E.idB,nomB,emplacement ORDER BY COUNT( E.idV) DESC LIMIT 5; ');
$sth = $dbh->query($sql);
$result = $sth->fetchAll(PDO::FETCH_ASSOC); 
echo '<br>';
echo '<Table class="table">';
echo '<thead>';
echo '<tr>';
echo '<th scope="col">ID Buvette</th>';
echo '<th scope="col">Nom Buvette</th>';
echo '<th scope="col">emplacement</th>';
echo '<th scope="col">NB Volontaire</th>';
echo '</tr>';
echo '</thead>';
foreach ($result as $row){ 
echo '<tr>';
      echo '<td>'; echo  $row['idB']; echo '</td>';
      echo '<td>'; echo  $row['nomB']; echo '</td>';
      echo '<td>'; echo  $row['emplacement']; echo '</td>';
      echo '<td>'; echo  $row['COUNT(DISTINCT E.idV)']; echo '</td>';
   echo '</tr>';
}
	echo '</Table>';	
	$dbh=NULL;
}

function StatMatch($idB) {
		require'connect.php';
			 if ($_POST['buvOpen'] == NULL)
   {
      echo "Erreur : aucun Match n'a était saisi";
   }
   else
   {
$sql='SELECT nomB , emplacement, nomV FROM EstOuverte, Buvette, Volontaire WHERE Volontaire.idV = Buvette.responsable AND Buvette.idB = EstOuverte.idB AND idM='.$_POST['buvOpen'].'';
$sth = $dbh->query($sql);
$result = $sth->fetchAll(PDO::FETCH_ASSOC); 
if ($result == NULL)
{
   echo "Aucune personne n'a été trouvée";
}
else
{
   echo '<br>';
   echo '<Table class="table">';
   echo '<thead>';
   echo '<tr>';
   echo '<th scope="col">Buvette</th>';
   echo '<th scope="col">Emplacement</th>';
   echo '<th scope="col">Responsable</th>';
   echo '</tr>';
   echo '</thead>'; 
   foreach ($result as $row){ 
   echo '<tr>';
   echo '<td>'; echo  $row['nomB']; echo '</td>';
   echo '<td>'; echo  $row['emplacement']; echo '</td>';
   echo '<td>'; echo  $row['nomV']; echo '</td>';
   echo '</tr>';
}
echo '</Table>';
}
   }
   $dbh=NULL;
}

?>