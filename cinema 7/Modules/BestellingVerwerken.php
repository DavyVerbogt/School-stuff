<?php
// beveiliging pagina voor niet geautoriseerde bezoekers
if(LoginCheck($pdo))
{
	// user is ingelogd
	if($_SESSION['level'] >= 1) //pagina alleen zichtbaar voor level 1 of hoger
	{
		/* ===============CODE================== */

		
		if(!empty($_SESSION['BestelBeveiliging']))
		{
			/*
			Opdracht PM16 STAP 3A: Besteloverzicht (deel 2)
			Omschrijving: Lees de sessie bestelling uit
			*/
			$Bestelling = $_SESSION['bestelling'];


			/*
			Opdracht PM16 STAP 3B: Besteloverzicht (deel 2)
			Omschrijving: voeg een nieuw KlantId toe aan de tabel reserveringen.Vraag vervolgens het door de database gegenereerde reserveringsnummer op
			*/
			//query opbouwen
			$parameters = array(':KlantId'=>$_SESSION['user_id']);
			$sth = $pdo->prepare('INSERT INTO reserveringen (KlantID) VALUES (:KlantId)');

			$sth->execute($parameters);
			$ReserveringsID = $pdo->lastInsertId();




			/*
			Opdracht PM16 STAP 3C: Besteloverzicht (deel 2)
			Omschrijving: loop middels een for-loop door het array bestelling en vul de tabel vertoningen_reserveringen met de correcte gegevens.
			*/
			$sth = $pdo->prepare('INSERT INTO reserveringen_vertoningen(ReserveringsID,VertoningsID,AantalKaartjes)
								VALUES(:ReserveringsID, :VertoningsID, :AantalKaartjes)');
			for($i=0;$i<count($Bestelling);$i++)
			{
				$parameters = array(
					':ReserveringsID'=>$ReserveringsID,
					':VertoningsID'=>$Bestelling[$i]['VertoningsId'],
					':AantalKaartjes'=>$Bestelling[$i]['AantalKaartjes']);
				$sth->execute($parameters);
			}




			/*
			Opdracht PM16 STAP 3D: Besteloverzicht (deel 2)
			Omschrijving: geef de gebruiker de juiste melding op het scherm wanneer bovenstaande succesvol is uitgevoerd. Maak daarnaast een link naar de homepagina
			*/
			echo 'Uw bestelling is succesvol bij ons ontvangen!<br />';
			echo 'De bestelling is bij ons bekend onder bestelnr: '.$ReserveringsID.'<br/>';
			echo 'Wij bedanken u voor uw vertrouwen in ons en wensen u al vast veel plezier met de film.<br /><br/>';
			echo '<a href="index.php">Terug naar de Homepage</a>';

			unset($_SESSION['bestelling']);
			unset($_SESSION['BestelBeveiliging']);
			}


		else
			echo '<img src="./Images/EasterEgg.jpg" alt="Dennis Nedry" />';
		
		/* ===============CODE================== */
	}
	else
	{
		//user heeft niet het correcte level
		echo 'U heeft niet de juiste bevoegdheid voor deze pagina.';
		RedirectNaarPagina(5);//redirect naar home
	}
}
else
{
	//user is niet ingelogd
	RedirectNaarPagina(NULL,98);//instant redirect naar inlogpagina
}
