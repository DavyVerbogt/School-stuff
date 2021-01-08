<?php
// beveiliging pagina voor niet geautoriseerde bezoekers
if (LoginCheck($pdo)) {
	// user is ingelogd
	if ($_SESSION['level'] >= 5) //pagina alleen zichtbaar voor level 5 of hoger
		{
			//-------------code---------------//	

			if (isset($_GET['Action'])) {
				//haalt de action op die bepaald of de film gewijzigd of verwijderd wordt
				$Action = $_GET['Action'];

				//switch die bepaald wat er gebeurt wanneer de action Edit of Del is.
				switch ($Action) {
					case 'Edit':

						//init fields
						$Title = $Description = $Duration = $Genre = $Age = $Picture = $Price = $Type = $Status = NULL;

						//init error fields
						$TitleErr = $DescErr = $DurErr = $PriceErr = NULL;

						//controleert of het formulier is ge-submit. LET OP: de knop moet Aanpassen heten
						if (isset($_POST['Aanpassen'])) {
							//formulier is gesubmit 

							$CheckOnErrors = false; // hulpvariabele voor het valideren van het formulier

							/* 
								Opdracht PM12 STAP 5 : Film Aanpassen
								Valideer de gegevens weer op de zelfde manier als in opdracht 5.01, nadat je de gegevens middels een POST hebt ingelezen
								*/

							$Title = $_POST["Title"];
							$Description = $_POST["Description"];
							$Duration = $_POST['Duration'];
							$Genre = $_POST['Genre'];
							$Age = $_POST['Age'];
							$Picture = $_POST['Picture'];
							$Price = $_POST['Price'];
							$Type = $_POST['Type'];
							$Status = $_POST['Status'];

							//BEGIN CONTROLES
							//controleert het Titel veld
							if (empty($Title)) {
								$TitleErr = "Dit veld is vereist om in te vullen!";
								$CheckOnErrors = true;
							}

							//controleert het Omschrijving veld
							if (empty($Description)) {
								$DescErr = "Dit veld is vereist om in te vullen!";
								$CheckOnErrors = true;
							}

							//controleert het duration veld
							if (empty($Duration)) {
								$DurErr = "Dit veld is vereist om in te vullen!";
								$CheckOnErrors = true;
							} elseif (!ctype_digit($Duration)) {
								$DurErr = "Dit is geen geldige duur format";
								$CheckOnErrors = true;
							}

							//controleert het Price veld
							if (empty($Price)) {
								$PriceErr = "Dit veld is vereist om in te vullen!";
								$CheckOnErrors = true;
							} elseif (!is_numeric($Price)) {
								$PriceErr = "Dit is geen geldige prijs";
								$CheckOnErrors = true;
							}
							//EINDE CONTROLE


							/* 
								Opdracht PM12 STAP 6 : Film Aanpassen
								Controleer ook hier weer of er een validatie fout is ontstaan. Zo ja, dan krijgt de gebruiker het formulier weer te zien, zo nee, Dan gaan we de gegevens toevoegen aan de Database. Dit doen we door een prepared statement te maken waarmee je de gegevens van de film middels een UPDATE in de database aanpast. Wanneer dit is gelukt krijgt de gebruiker hiervan een melding op het scherm
								*/
							if ($CheckOnErrors) {
								//er zijn fouten geconstateerd
								require('./Forms/FilmAanpassenForm.php');
							} else {
								//formulier is succesvol gevalideerd

								//query opbouwen
								$parameters = array(
									':FilmID' => $_GET['FilmId'],
									':Title' => $Title,
									':Description' => $Description,
									':Duration' => $Duration,
									':Genre' => $Genre,
									':Age' => $Age,
									':Picture' => $Picture,
									':Price' => $Price,
									':Type' => $Type,
									':Status' => $Status
								);

								$sth = $pdo->prepare('UPDATE films SET Titel = :Title, Beschrijving = :Description, Duur = :Duration, Genre = :Genre, Leeftijd = :Age, Plaatje = :Picture, Prijs = :Price, Type = :Type, Status = :Status WHERE FilmID = :FilmID');

								$sth->execute($parameters);

								echo "De Film gegevens zijn succesvol aangepast";
								RedirectNaarPagina(3, 8);
							}
						} else {
							//formulier is nog niet gesubmit
							/*  
								Opdracht PM12 STAP 3 : Film Aanpassen 
								Omschrijving: maak een prepared statement waarmee je de gegevens van de Film die gewijzigd moet worden ophaald. Het FilmID dien je te verkrijgen uit de GET variabele zodat je de juiste gegevens er bij kan terugvinden
								*/

							$parameters = array(':FilmID' => $_GET['FilmId']);

							$sth = $pdo->prepare('SELECT * FROM Films WHERE FilmID = :FilmID');

							$sth->execute($parameters);
							$row = $sth->fetch(); // rij fetchen

							/*
								Opdracht PM12 STAP 4 : Film Aanpassen 
								Omschrijving: Zet de gegevens uit de database over naar de juiste variabelen zodat ze in het formulier bestand kunnen worden gebruikt. Roep vervolgens het formulier aan.
								*/

							$Title = $row["Titel"];
							$Description = $row["Beschrijving"];
							$Duration = $row['Duur'];
							$Genre = $row['Genre'];
							$Age = $row['Leeftijd'];
							$Picture = $row['Plaatje'];
							$Price = $row['Prijs'];
							$Type = $row['Type'];
							$Status = $row['Status'];

							require('./Forms/FilmAanpassenForm.php');
						}
						break;
					case 'Del':
						/*
							Opdracht PM13 STAP 1 : Film Verwijderen
							Omschrijving: Maak een prepared statement waarmee je een film uit de database verwijderd. LET OP dat je altijd het filmID meegeeft aan de DELETE!!!!!! Het FilmID dien je te verkrijgen uit de GET variabele. WANNEER JE DIT NIET MEEGEEFT VERWIJDER JE ALLE FILMS UIT DE DATABASE!!! De gebruiker krijgt een melding dat de film is verwijderd
							*/

						//let op dat je altijd het filmID meegeeft aan de DELETE!!!!!!
						$parameters = array(':FilmID' => $_GET['FilmId']);

						$sth = $pdo->prepare('DELETE FROM Films WHERE FilmID = :FilmID');

						$sth->execute($parameters);

						echo "De Film is verwijderd";
						RedirectNaarPagina(3, 8);
						break;
				}
			} else {
				//uitlezen films
				/*
				Opdracht PM12 STAP 2: Film Aanpassen
				Omschrijving: Voer een query uit middels een prepared statement waarmee je alle films weergeeft. Zorg er voor dat het result van de query netjes op het scherm wordt getoond. LET OP: Er dienen 2 knoppen gemaakt te worden (Links in html), waarvan 1 aanpassen en 1 verwijder knop. Deze links dienen pagina nr (huidige pagina) , Film ID en Action mee te krijgen als als GET parameters. De value bij action is voor de knop aanpassen "Edit" en voor de knop verwijderen "Del"
			*/
				$sth = $pdo->prepare('select * from films');
				$sth->execute();

				echo '<table border="0">';
				echo '<tr>';
				echo	'<th></th>';
				echo	'<td>Titel</td>';
				echo	'<td>Duur</td>';
				echo	'<td>Genre</td>';
				echo	'<td>Leeftijd</td>';
				echo	'<td>Type</td>';
				echo	'<td>Prijs</td>';
				echo '</tr>';

				while ($row = $sth->fetch()) {
					echo '<tr>';
					echo '<td rowspan="2"><img src="./Images/' . $row['Plaatje'] . '" alt="' . $row['Titel'] . '"</td>';
					echo '<td>' . $row['Titel'] . '</td>';
					echo '<td>' . $row['Duur'] . '</td>';
					echo '<td>' . $row['Genre'] . '</td>';
					echo '<td>' . $row['Leeftijd'] . '</td>';
					echo '<td>' . $row['Type'] . '</td>';
					echo '<td>&#8364; ' . number_format($row['Prijs'], 2, ',', '') . '</td>';
					echo '</tr>';

					echo '<tr>';
					echo '<td colspan="4">' . $row['Beschrijving'] . '</td>';
					echo '<td><ul id="reserveren"><li><a href="./index.php?PaginaNr=8&Action=Edit&FilmId=' . $row['FilmID'] . '">Aanpassen</a></li></ul></td>';
					echo '<td><ul id="reserveren"><li><a href="./index.php?PaginaNr=8&Action=Del&FilmId=' . $row['FilmID'] . '">Verwijderen</a></li></ul></td>';
					echo '</tr>';
				}
				echo '</table>';
			}

			//-------------code--------------//


		} else {
		//user heeft niet het correcte level
		echo 'U heeft niet de juiste bevoegdheid voor deze pagina.';
		RedirectNaarPagina(5); //redirect naar home
	}
} else {
	//user is niet ingelogd
	RedirectNaarPagina(NULL, 98); //instant redirect naar inlogpagina
}
