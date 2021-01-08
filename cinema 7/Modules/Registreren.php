<?php
//init fields
$FirstName = $LastName = $Adres = $ZipCode = $City = $TelNr = $Email = $Username = 	$Password = $RetypePassword = null;

//init error fields
$FnameErr = $LnameErr = $ZipErr = $CityErr = $TelErr = $MailErr = $UserErr = $PassErr = $RePassErr = null;

if (isset($_POST['Registreren'])) {
	$CheckOnErrors = false; // hulpvariabele voor het valideren van het formulier

	/*
	Opdracht PM08 STAP 2: registreren
	Omschrijving: Lees alle gegevens uit het formulier uit middels de POST methode
	*/

	$FirstName = $_POST["FirstName"];
	$LastName = $_POST["LastName"];
	$Adres = $_POST["Adres"];
	$ZipCode = $_POST["ZipCode"];
	$City = $_POST["City"];
	$TelNr = $_POST["TelNr"];
	$Email = $_POST["Email"];
	$Username = $_POST["Username"];
	$Password = $_POST["Password"];
	$RetypePassword = $_POST["RetypePassword"];

	//BEGIN CONTROLES
	/*
	Opdracht PM08 STAP 3: registreren
	Omschrijving: Zorg er voor dat de gegevens worden gevalideerd op de eisen uit de opdracht. Gebruik de hulpvariabele $CheckOnErrors om later te kunnen controleren of er een fout is gevonden. Deze variabele zet je dus op true wanneer je een validatie fout tegenkomt. Voor het valideren kun je gebruik maken van de validatie functies in het bestand functies.php
	*/

	//controleer het voornaam veld

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

	//controleer het username veld

	if (empty($Username)) {
		$UserErr = "Dit veld is vereist in te vullen";
		$CheckOnErrors = true;
	} elseif (!is_Username_Unique($Username, $pdo)) {
		$UserErr = "Deze gebruikersnaam is al in gebruik, kies aub een andere.";
		$CheckOnErrors = true;
	}

	//controleer het paswoord veld

	if (empty($Password)) {
		$Password = "Dit veld is vereist in te vullen";
		$CheckOnErrors = true;
	} elseif (!is_minlength($Password, 6)) {
			$PassErr = "Het wachtwoord moet minimaal 6 tekens bevatten";
			$CheckOnErrors = true;
		}
	//controleer het retype paswoord veld

	if (empty($RetypePassword)) {
		$RePassErr = "Dit veld is vereist in te vullen";
		$CheckOnErrors = true;
	} elseif ($Password != $RetypePassword) {
			$RePassErr = "De wachtwoorden komen niet overeen";
			$CheckOnErrors = true;
		}

	//EINDE CONTROLES


	/*
	Opdracht PM08 STAP 4: registreren
	Omschrijving: Controleer hier of er een fout is gevonden middels de CheckOnErrors variabele. Zo ja, dan ziet de gerbuiker opnieuw het formulier; zo nee, dan gaan we de gegevens in de database toevoegen.
	*/
	if ($CheckOnErrors) {
			require('./Forms/RegistrerenForm.php');
		} else {
			//formulier is succesvol gevalideerd

			//maak unieke salt
			$Salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));

			//hash het paswoord met de Salt
			$Password = hash('sha512', $Password . $Salt);

			/*
		Opdracht PM08 STAP 5: registreren
		Omschrijving: Maak een prepared statement waarmee de gegevens van de gebruiker in de database worden toegevoegd. LET OP: Level moet 1 zijn! 
		*/
			$parameters = array(
				':FirstName' => $FirstName,
				':LastName' => $LastName,
				':Adres' => $Adres,
				':ZipCode' => $ZipCode,
				':City' => $City,
				':TelNr' => $TelNr,
				':Email' => $Email,
				':Username' => $Username,
				':Password' => $Password,
				':Salt' => $Salt,
				':Level' => 1
			);


			$sth = $pdo->prepare('INSERT INTO klanten (Voornaam, Achternaam, Adres, Postcode, Plaats, TelefoonNr, Email, Inlognaam, Wachtwoord, Salt, Level) VALUES (:FirstName, :LastName, :Adres, :ZipCode, :City, :TelNr, :Email, :Username, :Password, :Salt, :Level)');

			$sth->execute($parameters);


			/*
		Opdracht PM08 STAP 6: registreren
		Omschrijving: Tot slot geef je de gebruiker de melding dat zijn gegevens zijn toegevoegd.
		*/
			echo "Uw account is aangemaakt";
			RedirectNaarPagina(3, 98);
		}
} else {
	require('./Forms/RegistrerenForm.php');
}
