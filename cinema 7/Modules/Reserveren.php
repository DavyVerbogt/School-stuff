<?php
/*
	Opdracht PM05 STAP 1: Reserveren
	Omschrijving: Voer een query uit middels een prepared statement
*/

$parameters = array(':Status'=>'InBios');
$sth = $pdo->prepare('SELECT * FROM films WHERE status = :Status');

$sth->execute($parameters);


/*
	Opdracht PM05 STAP 2: Reserveren
	Omschrijving: Zorg er voor dat het result van de query netjes op het scherm wordt getoond. Zorg er voor dat er een knopje "reserveren" is waarmee je doorgestuurd wordt naar de reserveren pagina
*/
echo '<table border="0">';
echo '<tr>';
echo '<th></th>';
echo '<td>Title</td>';
echo '<td>Duur</td>';
echo '<td>Genre</td>';
echo '<td>Type</td>';
echo '<td>Leeftijd</td>';
echo '<td>Prijs</td>';
echo '</tr>';
while ($row = $sth->fetch())
{
	echo '<tr>';
	echo '<td rowspan="2"><img src="./Images/'.$row['Plaatje'].'"alt="'.$row['Titel'].'"</td>';
	
	echo '<td>'.$row['Titel'].'</td>';
	echo '<td>'.$row['Duur'].'</td>';
	echo '<td>'.$row['Genre'].'</td>';
	echo '<td>'.$row['Type'].'</td>';
	echo '<td>'.$row['Leeftijd'].'</td>';
	echo '<td>€'.number_format($row['Prijs'], 2, ',', '').'</td>';
	echo '</tr>';

	echo '<tr>';
	echo '<td colspan="5">'.$row['Beschrijving'].'</td>';
	echo '<td><ul id="reserveren"><li><a href="index.php?PaginaNr=5&FilmId='.$row['FilmID'].'">Reserveren</a></li></ul></td>';
	echo '</tr>';
}
echo '</table>';
