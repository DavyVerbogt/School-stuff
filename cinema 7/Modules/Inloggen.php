<?php
function login($Username, $password, $pdo)
{
	/*
	Opdracht PM07 STAP 4: Inlogsysteem
	Omschrijving: Maak een prepared statement waarbij je de gegevens van de klant ophaalt
	*/
	$parameters = array(':Inlognaam'=>$Username);
	$sth = $pdo->prepare('SELECT * FROM klanten WHERE Inlognaam = :Inlognaam');

	$sth->execute($parameters);


	/*
	Opdracht PM07 STAP 5: Inlogsysteem
	Omschrijving: Voorzie de komende regels van commentaar, zoals in de opdracht gevraagd wordt.
	*/

	if ($sth->rowCount() == 1) 
	{
		// Variabelen inlezen uit query
		$row = $sth->fetch();
		
		// Het wachtwoord hashen met een salt er bij
		$password = hash('sha512', $password . $row['Salt']);

		// kijkt of het wachtwoord het zelfe is in het database
		if ($row['Wachtwoord'] == $password) 
		{

			$user_browser = $_SERVER['HTTP_USER_AGENT'];

			/*
			Opdracht PM07 STAP 6: Inlogsysteem
			Omschrijving: Vul tot slot de sessie met de juiste gegevens
			*/
			$_SESSION['user_id'] = $row['KlantID'];
			$_SESSION['username'] = $Username;
			$_SESSION['level'] = $row['Level'];
			$_SESSION['login_string'] = hash('sha512',
					  $password . $user_browser);
			
			// Login successful.
			return true;
		 } 
		 else 
		 {
			// password incorrect
			return false;
		 }
	}
	else
	{
		// username bestaat niet
		return false;
	}
}

//begin pagina
$error = NULL;
//het knopje inloggen van het formulier is ingedrukt.
if(isset($_POST['inloggen']))
{
	/*
	Opdracht PM07 STAP 2: Inlogsysteem
	Omschrijving: Lees de formulier gegevens uit middels de post methode. 
	*/
	$Username = $_POST['username'];
	$password = $_POST['password'];


	/*
	Opdracht PM07 STAP 3: Inlogsysteem
	Omschrijving: Roep de functie login aan en geef de 3 correcte paramteres mee aan de functie. Middels een if statement kun je vervolgens controleren of de gebruiker is ingelogd en de juiste boodschap weergeven
	*/
	if(login($Username, $password, $pdo))
	{
		Echo "U bent sucsesvol ingelogd";
		RedirectNaarPagina(5);
	}
	else
	{
		$error = "De inlognaam of het passwoord is onjuist";
		require('./Forms/InloggenForm.php');
	}


}
else
{	
	//er is nog niet op het knopje gedrukt, het formulier wordt weergegeven
	require('./Forms/InloggenForm.php');
}
?>





