<?php
/*  
	Opdracht PM09 STAP 1: menu op basis van gebruikers levels 
	Omschrijving: Zet het default level op 0 en vul de variabale MenuInUitloggen met de default html code voor de knop inloggen
*/

$Level = 0; // default level 0

$MenuInUitloggen = '<li><a href="index.php?PaginaNr=98">Inloggen</a></li>'; // default menuknop inloggen

/*  
	Opdracht PM09 STAP 2: menu op basis van gebruikers levels 
	Omschrijving: Controleer mbv de functie LoginCheck of iemand is ingelogd. Zo ja, dan overschrijf je de default waardes van Level en MenuInUitloggen met het level uit de database en de html code voor de knop uitloggen
*/
if(LoginCheck($pdo)){
	$Level = $_SESSION['level'];
	$MenuInUitloggen = '<li><a href="index.php?PaginaNr=99">Uitloggen</a></li>';
	
}



/*  
	Opdracht PM09 STAP 3 : menu op basis van gebruikers levels 
	Omschrijving: Maak een prepared statement waarbij je de menu items opvraagd die de gebruiker op basis van zij/haar level mag zien. Zorg er vervolgens voor dat deze netjes op het scerm worden getoond.
*/
	$parameters = array(':Level'=>$Level);
	$sth = $pdo->prepare('SELECT * FROM menu WHERE Level <= :Level');
 
    $sth->execute($parameters);
	
	echo '<ul id="menu">';
		echo '<li><a href="index.php">Home</a></li>';
	
		while($row = $sth->fetch()){
			echo '<li><a href="index.php?PaginaNr='.$row['PaginaNr'].'">'.$row['Tekst'].'</a></li>';
		}
		echo $MenuInUitloggen;
	echo '</ul>';
/*  
	Opdracht PM09 STAP 4 : menu op basis van gebruikers levels 
	Omschrijving: Verwijder tot slot de basiscode die we gemaakt hebben in opdracht 2.03 hieronder
*/



?>

<!--
	Opdracht PM03 STAP 1: Bioscoop Modulair
	Omschrijving: Voeg een link toe naar index.php met daarbij een variabele pagina en als waarde het pagina nr


<ul id="menu">
	<li><a href="index.php">Home</a></li>
	<li><a href="index.php?PaginaNr=1">Reserveren</a></li>
	<li><a href="index.php?PaginaNr=2">Verwacht</a></li>
	<li><a href="index.php?PaginaNr=3">Over ons</a></li>
	<li><a href="index.php?PaginaNr=4">Inloggen</a></li>
</ul>
-->