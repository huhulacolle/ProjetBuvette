<?php
$i = 0;
include_once 'connect.php';
$sql = 'SELECT COUNT(idB) AS ddb from estouverte group by idM';
$sth = $dbh->query($sql);
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {

    $ddb[$i] = $row['ddb'];
    $i++;
}

$i = 0;
$sql = 'select count(idV) AS ddv from estpresent group by idM';
$sth = $dbh->query($sql);
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    $ddv[$i] = $row['ddv'];
    $i++;
}

$i = 0;
$sql = 'SELECT dateM, e1.pays AS p1, e1.drapeau AS drapeau1, e2.pays AS p2, e2.drapeau AS drapeau2, scoreA, scoreB FROM matchs, equipe AS e1, equipe AS e2 WHERE matchs.eqA = e1.idE AND matchs.eqB = e2.idE';
$sth = $dbh->query($sql);
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
echo '</br>';
echo '</br>';
echo '<Table class="table">';
echo '<thead>';
echo '<tr>';
echo '<th scope="col"> Date </th>';
echo '<th scope="col"> EquipeA </th>';
echo '<th scope="col"> DrapeauA </th>';
echo '<th scope="col"> EquipeB </th>';
echo '<th scope="col"> DrapeauB </th>';
echo '<th scope="col"> Score </th>';
echo '<th scope="col"> Nb Buvette Ouverte </th>';
echo '<th scope="col"> Nb Volontaires Participant </th>';

echo '</tr>';
echo '</thead>';
foreach ($result as $row) {
    echo '<tbody>';
    echo '<tr>';
    echo '<td>';
    echo $row['dateM'];
    echo '</td>';
    echo '<td>';
    echo $row['p1'];
    echo '</td>';
    echo '<td>';
    echo '<img src="' . $row['drapeau1'] . '" width="100"/>';
    echo '</td>';
    echo '<td>';
    echo $row['p2'];
    echo '</td>';
    echo '<td>';
    echo '<img src="' . $row['drapeau2'] . '" width="100"/>';
    echo '</td>';
    echo '<td>';
    echo $row['scoreA'];
    echo ' - ';
    echo $row['scoreB'];
    echo '</td>';
    echo '<td>';
    echo $ddb[$i];
    echo '</td>';
    echo '<td>';
    echo $ddv[$i];
    echo '</td>';
    $i++;

}
echo '</tr>';
echo '</tbody>';
echo '</table>';
$dbh = null;
?>



<?php
?>