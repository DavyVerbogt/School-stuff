<?php
// beveiliging pagina voor niet geautoriseerde bezoekers
if (LoginCheck($pdo)) {
	// user is ingelogd
	if ($_SESSION['level'] >= 5) //pagina alleen zichtbaar voor level 5 of hoger
		{

			//-------------code---------------//	

			//init fields
			$Title = $Description = $Duration = $Genre = $Age = $Picture = $Price = $Type = $Status = NULL;

			//init error fields
			$TitleErr = $DescErr = $DurErr = $PriceErr = NULL;

			/* 
		Opdracht PM11 STAP 2 : Film Toevoegen 
		Maak een if statement waarmee je controleert of het formulier is ingevoerd. Zo ja, dan gaan we verder met het valideren van de gegevens en het toevoegen ervan aan de database, Zo nee, Dan wordt het formulier getoond.
		*/

			if (isset($_POST['Toevoegen'])) {

				/* 
			Opdracht PM11 STAP 3 : Film Toevoegen 
			Lees de formulier gegevens in met de POST methode
			Valideer de ingevoerde gegevens zoals ook gedaan is in de opdrachten registreren en Mijn Profiel.
			*/

				$CheckOnErrors = false; // hulpvariabele voor het valideren van het formulier
				$Title = $_POST['Title'];
				$Description = $_POST['Description'];
				$Duration = $_POST['Duration'];
				$Genre = $_POST['Genre'];
				$Age = $_POST['Age'];
				$Picture = $_POST['Picture'];
				$Price = $_POST['Price'];
				$Type = $_POST['Type'];
				$Status = $_POST['Status'];

				//BEGIN CONTROLES
				//controleer het Titel veld
				if (empty($Title)) {
					$TitleErr = "Dit veld is vereist om in te vullen";
					$CheckOnErrors = true;
				}
				//controleer het Omschrijving veld
				if (empty($Description)) {
					$DescErr = "Dit veld is vereist om in te vullen";
					$CheckOnErrors = true;
				}
				//controleer het duration veld
				if (empty($Duration)) {
					$DurErr = "Dit veld is vereist om in te vullen";
					$CheckOnErrors = true;
				} elseif (!ctype_digit($Duration)) {
					$DurErr = "Is geen geldig format ingevuld";
					$CheckOnErrors = true;
				}
				//controleer het Price veld
				if (empty($Price)) {
					$PriceErr = "Dit veld is vereist om in te vullen";
					$CheckOnErrors = true;
				} elseif (!is_numeric($Price)) {
					$PriceErr = "Dit is geen geldige prijs";
					$CheckOnErrors = true;
				}
				//EINDE CONTROLE

				/* 
			Opdracht PM11 STAP 4 : Film Toevoegen 
			Controleer of er een validatie fout is ontstaan. Zo ja, dan krijgt de gebruiker het formulier weer te zien, zo nee, Dan gaan we de gegevens toevoegen aan de Database. Dit doen we door een prepared statement te maken waarmee je de gegevens van de film middels een INSERT in de database Toevoegt. Wanneer dit is gelukt krijgt de gebruiker hiervan een melding op het scherm
			*/

				if ($CheckOnErrors) {
					require('./Forms/FilmToevoegenForm.php');
				} else {
					$parameters = array(
						'Title' => $Title,
						'Description' => $Description,
						'Duration' => $Duration,
						'Genre' => $Genre,
						'Age' => $Age,
						'Picture' => $Picture,
						'Price' => $Price,
						'Type' => $Type,
						'Status' => $Status
					);


					$sth = $pdo->prepare('INSERT INTO films (FilmID, Titel, Beschrijving, Duur, Genre, Leeftijd, Plaatje, Prijs, Type, Status)
										  VALUES (NULL, :Title, :Description, :Duration, :Genre, :Age, :Picture, :Price, :Type, :Status)');

					$sth->execute($parameters);
					echo "De film is toegevoed aan het database";
					RedirectNaarPagina(3, 7);
				}
			} else {
				require('./Forms/FilmToevoegenForm.php');
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
