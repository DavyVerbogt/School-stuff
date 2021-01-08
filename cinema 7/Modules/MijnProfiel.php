<?php
// beveiliging pagina voor niet geautoriseerde bezoekers
if (LoginCheck($pdo)) {
	// user is ingelogd
	if ($_SESSION['level'] >= 1) //pagina alleen zichtbaar voor level 1 of hoger
		{
			/* ===============CODE================== */
			//init fields
			$FirstName = $LastName = $Adres = $ZipCode = $City = $TelNr = $Email = null;

			//init error fields
			$FnameErr = $LnameErr = $ZipErr = $CityErr = $TelErr = $MailErr = null;

			if (isset($_POST['Wijzigen'])) {
				$CheckOnErrors = false; // hulpvariabele voor het valideren van het formulier

				/*  
				Opdracht PM10 STAP 3 : Mijn Profiel 
				Omschrijving: Lees de formulier gegevens in met de POST methode
			*/

				$FirstName = $_POST["FirstName"];
				$LastName = $_POST["LastName"];
				$Adres = $_POST["Adres"];
				$ZipCode = $_POST["ZipCode"];
				$City = $_POST["City"];
				$TelNr = $_POST["TelNr"];
				$Email = $_POST["Email"];

				//BEGIN CONTROLES

				/*  
				Opdracht PM10 STAP 4 : Mijn Profiel 
				Omschrijving: Valideer de ingevoerde gegevens weer met de zelfde voorwaarden als in de opdracht registreren.
			*/

				if (empty($FirstName)) {
					$FnameErr = "Dit veld is vereist in te vullen";
					$CheckOnErrors = true;
				} elseif (!is_Char_Only($FirstName)) {
					$FnameErr = "In dit veld mogen aleen karakters ingevuld worden";
					$CheckOnErrors = true;
				} elseif (!is_minlength($FirstName, 2)) {
					$FnameErr = "Het moet uit minimaal 2 karakters bestaan";
					$CheckOnErrors = true;
				}

				//controleer het achternaam veld

				if (empty($LastName)) {
					$LnameErr = "Dit veld is vereist in te vullen";
					$CheckOnErrors = true;
				} elseif (!is_Char_Only($LastName)) {
					$LnameErr = "In dit veld mogen aleen karakters ingevuld worden";
					$CheckOnErrors = true;
				} elseif (!is_minlength($LastName, 2)) {
					$LnameErr = "Het moet uit minimaal 2 karakters bestaan";
					$CheckOnErrors = true;
				}

				//controleer het postcode veld	

				if (!is_NL_PostalCode($ZipCode)) {
					$ZipErr = "Dit is geen geldige postcode";
					$CheckOnErrors = true;
				}

				//controleer het plaats veld

				if (!is_Char_Only($City)) {
					$CityErr = "In dit veld mogen aleen karakters ingevuld worden";
					$CheckOnErrors = true;
				}

				//controleer het telnr veld

				if (empty($TelNr)) {
					$TelErr = "Dit veld is vereist in te vullen";
					$CheckOnErrors = true;
				}

				//controleer het email veld

				if (empty($Email)) {
					$MailErr = "Dit veld is vereist in te vullen";
					$CheckOnErrors = true;
				} elseif (!is_email($Email)) {
					$MailErr = "Dit is geen geldige e-mail";
					$CheckOnErrors = true;
				}



				//EINDE CONTROLES

				/*  
				Opdracht PM10 STAP 5 : Mijn Profiel 
				Omschrijving: Vul aan, net als in de opdracht registreren
			*/
				if ($CheckOnErrors) {
					require('./Forms/MijnProfielForm.php');
				} else {
					//formulier is succesvol gevalideerd

					/*  
				Opdracht PM10 STAP 5 : Mijn Profiel 
				Omschrijving: maak een prepared statement waarmee je de gegevens van de gebruiker middels een UPDATE in de database aanpast. 
				*/


					$parameters = array(
						':FirstName' => $FirstName,
						':LastName' => $LastName,
						':Adres' => $Adres,
						':ZipCode' => $ZipCode,
						':City' => $City,
						':TelNr' => $TelNr,
						':Email' => $Email,
						':KlantID' => $_SESSION['user_id']
					);


					$sth = $pdo->prepare('UPDATE klanten SET Voornaam = :FirstName, Achternaam = :LastName, Adres = :Adres, PostCode = :ZipCode, Plaats = :City, TelefoonNr = :TelNr, Email = :Email FROM Klanten WHERE KlantID = :KlantID');

					$sth->execute($parameters);


					/*  
				Opdracht PM10 STAP 6 : Mijn Profiel 
				Wanneer dit is gelukt krijgt de gebruiker hiervan een melding op het scherm
				*/
					require('./Forms/MijnProfielForm.php');
					echo "Uw gegevens zijn succesvol gewijzigd";
				}
			} else {
				/*  
				Opdracht PM10 STAP 1 : Mijn Profiel 
				Omschrijving: maak een prepared statement waarmee je de gegevens van de gebruiker ophaald. Zijn/Haar KlantId dien je te verkrijgen uit de sessie zodat je de juiste gegevens er bij kan terugvinden
			*/
				$parameters = array(':KlantID' => $_SESSION['user_id']);


				$sth = $pdo->prepare('SELECT Voornaam, Achternaam , Adres , Postcode , Plaats , TelefoonNr , Email FROM Klanten WHERE KlantID = :KlantID');

				$sth->execute($parameters);
				$row = $sth->fetch();



				/*  
				Opdracht PM10 STAP 2 : Mijn Profiel 
				Omschrijving: Zet de gegevens uit de database over naar de juiste variabelen zodat ze in het formulier bestand kunnen worden gebruikt. Roep vervolgens het formulier aan.
			*/
			$FirstName = $row["Voornaam"];
			$LastName = $row["Achternaam"];
			$Adres = $row["Adres"];
			$ZipCode = $row["Postcode"];
			$City = $row["Plaats"];
			$TelNr = $row["TelefoonNr"];
			$Email =$row["Email"];

			require('./Forms/MijnProfielForm.php');
			}
			/* ===============CODE================== */
		} else {
		//user heeft niet het correcte level
		echo 'U heeft niet de juiste bevoegdheid voor deze pagina.';
		RedirectNaarPagina(5); //redirect naar home
	}
} else {
	//user is niet ingelogd
	RedirectNaarPagina(null, 98); //instant redirect naar inlogpagina
}
