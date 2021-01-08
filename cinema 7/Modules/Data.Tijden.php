<?php
// beveiliging pagina voor niet geautoriseerde bezoekers
if (LoginCheck($pdo)) {
	// user is ingelogd
	if ($_SESSION['level'] >= 1) //pagina alleen zichtbaar voor level 1 of hoger
		{
			/* ===============CODE================== */


			if (isset($_POST['BestelOverzicht'])) {

				/*
			Opdracht PM14 STAP 2: Film Data/Tijden
			Omschrijving: lees de gegevens uit het verstuurde formulier in (POST) en lees het FilmId in middels de GET methode. Maak vervolgens een associatief array met de naam Film aan en vul deze met de gegevens zoals deze in de opdracht gevraagd worden.
			*/
				$FilmID = $_GET['FilmId'];
				$FilmTitle = $_POST['FilmTitle'];
				$Price = $_POST['Prijs'];
				$VertoningsId = $_POST['VertoningsId'];
				$AantalKaartjes = $_POST['AantalKaartjes'];
				$Film = array(
					'Titel' => $FilmTitle,
					'Prijs' => $Price,
					'VertoningsId' => $VertoningsId,
					'AantalKaartjes' => $AantalKaartjes
				);
				/*
			Opdracht PM14 STAP 3: Film Data/Tijden
			Omschrijving: controleer of de sessie bestelling bestaat. Zo ja, lees het array bestelling uit deze sessie in. Zo nee, maak een nieuw leeg array met de naam bestelling. Voeg vervolgens het array film toe aan het array bestelling en zet alles terug in de sessie bestelling. Stuur de gebruiker daarna door naar de pagina besteloverzicht middels een header refresh
			*/
				if (!isset($_SESSION['bestelling'])) {
					$Bestelling = $_SESSION['bestelling'];
					$Bestelling[] = $Film;
					$_SESSION['bestelling'] = $Bestelling;
				}
				else{
					$Bestelling = array();
					$Bestelling[] = $Film;
					$_SESSION['bestelling'] = $Bestelling;
				}

				header("location:index.php?PaginaNr=10");

			} else {
				/*
			Opdracht PM14 STAP 1: Film Data/Tijden
			Omschrijving: Lees middels een SELECT query de tabel vertoningen uit, specifiek voor de film die door de gebruiker is aangeklikt. Hiervoor dien je het FilmId middels de GET methode uit te lezen. Geef vervolgens alle gegevens netjes weer in een tabel met achter iedere regel een radio button. Onderaan maak je een select Field waarin de waarden 1-10 staan. De gebruiker kan hier het aantal kaartjes kiezen. Tot slot geef je bovenaan de titel van de film weer en de prijs van de film. Kijk in opdracht voor een verkorte sql query (JOIN)
			*/
				$FilmID = $_GET['FilmId'];
				$parameters = array(':FilmID' => $FilmID);

				$sth = $pdo->prepare('SELECT f.Titel, f.Prijs, v.* FROM Films f, Vertoningen v WHERE v.FilmId = f.FilmId AND v.FilmId = :FilmID');

				$sth->execute($parameters);
				$row = $sth->fetch();

				echo '<h1>Film Reserveren: ' . $row['Titel'] . '</h1>';
				echo '<h3>Prijs: €' . number_format($row['Prijs'], 2) . 'pp</h3><br />';

				echo '<form name="VertoningenForm" method="post" action="">';
				echo '<input type="hidden" name="FilmTitle" value="' . $row['Titel'] . '" />';
				echo '<input type="hidden" name="Prijs" value="' . $row['Prijs'] . '" />';
				echo '<table border="1">';
				echo '<tr>';
				echo	'<th>Datum:</th>';
				echo	'<th>Tijd:</th>';
				echo 	'<th>ZaalNr:</th>';
				echo 	'<th>Selecteren:</th>';
				echo '</tr>';
				echo '<tr>';
				echo	'<td>' . date('d-m-Y', strtotime($row['Datum'])) . '</td>';
				echo	'<td>' . substr($row['Tijd'], 0.5) . '</td>';
				echo	'<td>' . $row['ZaalNR'] . '</td>';
				echo	'<td><input type="radio" name="VertoningsId" value="' . $row['VertoningsID'] . '" /></td>';
				echo '</tr>';

				while ($row = $sth->fetch()) {
					echo '<tr>';
					echo	'<td>' . date('d-m-Y', strtotime($row['Datum'])) . '</td>';
					echo	'<td>' . substr($row['Tijd'], 0.5) . '</td>';
					echo	'<td>' . $row['ZaalNR'] . '</td>';
					echo	'<td><input type="radio" name="VertoningsId" value="' . $row['VertoningsID'] . '" /></td>';
					echo '</tr>';
				}

				echo '<tr>';
				echo '<td colspan="3">Kies aantal Kaartjes:</td>';
				echo '<td>
					<select id="AantalKaartjes" name="AantalKaartjes">
						<option value"1">1</option>
						<option value"2">2</option>
						<option value"3">3</option>
						<option value"4">4</option>
						<option value"5">5</option>
						<option value"6">6</option>
						<option value"7">7</option>
						<option value"8">8</option>
						<option value"9">9</option>
						<option value"10">10</option>
					</select>
				</td>';
				echo '</tr>';
				echo '<tr>';
				echo '<td colspan="3">&nbsp;</td>';
				echo '<td><input type="submit" name="BestelOverzicht" value="Verder" /></td>';
				echo '</tr>';
				echo '</table>';
				echo '</form>';
			}

			/* ===============CODE================== */
		} else {
		//user heeft niet het correcte level
		echo 'U heeft niet de juiste bevoegdheid voor deze pagina.';
		RedirectNaarPagina(5); //redirect naar home
	}
} else {
	//user is niet ingelogd
	RedirectNaarPagina(NULL, 98); //instant redirect naar inlogpagina
}
?>