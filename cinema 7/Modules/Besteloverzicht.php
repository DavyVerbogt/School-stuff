<?php
// beveiliging pagina voor niet geautoriseerde bezoekers
if(LoginCheck($pdo))
{
	// user is ingelogd
	if($_SESSION['level'] >= 1) //pagina alleen zichtbaar voor level 1 of hoger
	{
		/* ===============CODE================== */
		
		// == VERWIJDER DIT NIET!!! Dit is beveiliging voor de site.
		if(isset($_GET['Bestel']) && $_GET['Bestel'])
		{
			// == VERWIJDER DIT NIET!!! Dit is beveiliging voor de site.
			$_SESSION['BestelBeveiliging'] = true;
			header("location:index.php?PaginaNr=11");
		}
		// == VERWIJDER DIT NIET!!! Dit is beveiliging voor de site.
		
		if(isset($_SESSION['bestelling']))
		{
			/*
			Opdracht PM15 STAP 1: Besteloverzicht (deel 1)
			Omschrijving: lees de SESSION bestelling uit
			*/
			$Bestelling = $_SESSION['bestelling'];
						
			/*
			Opdracht PM16 STAP 2: Besteloverzicht (deel 2)
			Omschrijving: Zorg er middels een for-loop voor dat het aantal kaartjes wordt ge-update in het array bestelling. Plaats deze daarna terug in de sessie
			*/
			if(isset($_POST['Wijzigen']))
			{
				$AantalKaartjes = $_POST['AantalKaartjes'];
				
				for($i=0; $i<count($Bestelling); $i++)
				{
					$Bestelling[$i]['AantalKaartjes'] = $AantalKaartjes[$i];
				}
				
				$_SESSION['bestelling'] = $Bestelling;
			}
			
			/*
			Opdracht PM16 STAP 1: Besteloverzicht (deel 2)
			Omschrijving: Zorg ervoor dat de film met de door de gebruiker aangeklikte vertoningsId uit het array bestelling wordt verwijderd. Plaats deze daarna terug in de sessie
			*/
			if(isset($_GET['Del']))
			{
				$DelVertoningsId = $_GET['Del'];
				
				for($i=0; $i<count($Bestelling); $i++)
				{
					if($Bestelling[$i]['VertoningsId'] == $DelVertoningsId)
					{
						unset($Bestelling[$i]);
						$Bestelling = array_values($Bestelling);
					}
				}
			
				if(!empty($Bestelling))
					$_SESSION['bestelling'] = $Bestelling;
			
				else
				{
					$_SESSION['bestelling'] = NULL;
					RedirectNaarPagina(NULL,10);
				}
			}
			

			/*
			Opdracht PM15 STAP 2: Besteloverzicht (deel 1)
			Omschrijving: Geef door middel van een For-Loop alle gegevens van de door de gebruiker gereserveerde films weer in een nette tabel. Gebruik hiervoor de gegevens uit de sessie bestelling en vul deze aan door gebruik te maken van een query op de tabel vertoningen. Maak daarnaast voor iedere film een select Field waarin de gebruiker het aantal kaartjes kan wijzigen (zie deel 2). Ook dient iedere regel van een verwijder knop te worden voorzien zodat de gebruiker eventueel een film kan verwijderen uit de reserveer lijst.tot slot geef je een totaal overzicht van de prijs weer.
			*/
			
			$TotaalPrijs = 0;
			
			echo '<h1>Bestellingsoverzicht</h1><br/>';
			echo '<form name="BestelOverzichtForm" method="POST" action="">';
			echo '<table border="1">';
			echo '<tr>';
			echo		'<th>Titel:</th>';
			echo		'<th>Datum:</th>';
			echo		'<th>Tijd:</th>';
			echo		'<th>ZaalNR:</th>';
			echo		'<th>Prijs:</th>';
			echo		'<th>Aantal kaartjes:</th>';
			echo		'<th>Subtotaal:</th>';
			echo		'<th>&nbsp;</th>';
			echo '</tr>';
			
			for($i=0;$i<count($Bestelling);$i++)
			{
				$parameters = array(':VertoningsId'=>$Bestelling[$i]['VertoningsId']);
				$sth = $pdo->prepare('SELECT * FROM Vertoningen WHERE VertoningsId = :VertoningsId LIMIT 1');
				
				$sth->execute($parameters);
				$row = $sth->fetch();
				
				$TotaalPrijs += $Bestelling[$i]['AantalKaartjes']*$Bestelling[$i]['Prijs'];
				
				echo '<tr>';
				echo		'<td>'.$Bestelling[$i]['Titel'].'</td>';
				echo		'<td>'.date('d-m-Y',strtotime($row['Datum'])).'</td>';
				echo		'<td>'.substr($row['Tijd'],0,5).'</td>';
				echo		'<td>'.$row['ZaalNR'].'</td>';
				echo		'<td>&#8364;'.number_format($Bestelling[$i]['Prijs'],2).'</td>';
				?>
						<td>
								<select id="AantalKaartjes" name="AantalKaartjes[]">
									<option value="1" <?php if($Bestelling[$i]['AantalKaartjes']=="1") {echo "selected";}?>>1</option>
									<option value="2" <?php if($Bestelling[$i]['AantalKaartjes']=="2") {echo "selected";}?>>2</option>
									<option value="3" <?php if($Bestelling[$i]['AantalKaartjes']=="3") {echo "selected";}?>>3</option>
									<option value="4" <?php if($Bestelling[$i]['AantalKaartjes']=="4") {echo "selected";}?>>4</option>
									<option value="5" <?php if($Bestelling[$i]['AantalKaartjes']=="5") {echo "selected";}?>>5</option>
									<option value="6" <?php if($Bestelling[$i]['AantalKaartjes']=="6") {echo "selected";}?>>6</option>
									<option value="7" <?php if($Bestelling[$i]['AantalKaartjes']=="7") {echo "selected";}?>>7</option>
									<option value="8" <?php if($Bestelling[$i]['AantalKaartjes']=="8") {echo "selected";}?>>8</option>
									<option value="9" <?php if($Bestelling[$i]['AantalKaartjes']=="9") {echo "selected";}?>>9</option>
									<option value="10" <?php if($Bestelling[$i]['AantalKaartjes']=="10") {echo "selected";}?>>10</option>
								</select>
						</td>
				<?php
				echo '<td>&#8364;'.number_format($Bestelling[$i]['AantalKaartjes']*$Bestelling[$i]['Prijs'],2).'</td>';
				echo '<td><ul id="reserveren"><li><a href="index.php?PaginaNr=10&Del='.$Bestelling[$i]['VertoningsId'].'">Verwijderen</a></li></ul></td>';
			}
			echo '<tr>';
			echo '	<td colspan="5">&nbsp;</td>';
			echo '	<td><input type="submit" name="Wijzigen" value="Wijzigen"/><strong>Totaal:</strong></td>';
			echo '	<td>&#8364;'.number_format($TotaalPrijs,2).'</td>';
			echo '	<td></td>';
			echo '</tr>';
			echo '</table>';
			echo '</form><br/>';
			/*
			Opdracht PM15 STAP 3: Besteloverzicht (deel 1)
			Omschrijving: Geef de gegevens van de gebruiker weer door een query uit te voeren op de tabel klanten. Het KlantId wat je hiervoor nodig hebt kun je terugvinden in de sessie waarmee de gebruiker is ingelogd.
			*/
			$parameters = array(':KlantId'=>$_SESSION['user_id']);
			$sth = $pdo->prepare('SELECT * FROM Klanten WHERE KlantId = :KlantId LIMIT 1');
			
			$sth->execute($parameters);
			$row = $sth->fetch();
			
			echo '<h3>Uw gegevens</h3>';
			echo '<table>';
			echo '<tr>';
			echo		'<th>Voornaam:</th>';
			echo		'<td>'.$row['Voornaam'].'</td>';
			echo '</tr>';
			echo '<tr>';
			echo		'<th>Achternaam:</th>';
			echo		'<td>'.$row['Achternaam'].'</td>';
			echo '<tr>';
			echo		'<th>Adres:</th>';
			echo		'<td>'.$row['Adres'].'</td>';
			echo '</tr>';
			echo '<tr>';
			echo		'<th>Postcode:</th>';
			echo		'<td>'.$row['Postcode'].'</td>';
			echo '</tr>';
			echo '<tr>';
			echo		'<th>Plaats:</th>';
			echo		'<td>'.$row['Plaats'].'</td>';
			echo '</tr>';
			echo '<tr>';
			echo		'<th>Telefoon nr.:</th>';
			echo		'<td>'.$row['TelefoonNr'].'</td>';
			echo '</tr>';
			echo '<tr>';
			echo		'<th>Email:</th>';
			echo		'<td>'.$row['Email'].'</td>';
			echo '</tr>';
			echo '</table><br/>';
			
			echo 'Uw bestelling wordt definitief wanneer u op de bestelknop drukt. U accepteert daarmee automatisch onze voorwaarden.';
			echo '<ul id="reserveren"><li><a href="index.php?PaginaNr=10&Bestel=true">Bestellen</a></li></ul>';
			
			/*
			Opdracht PM15 STAP 4: Besteloverzicht (deel 1)
			Omschrijving: maak de bestelknop zoals in de opdracht beschreven
			*/
			
		}
		else
		{
			echo 'U heeft nog niets gereserveerd. Om te reserveren verwijzen wij u nu door naar de reserveringspagina.';
			RedirectNaarPagina(5,1);
		}
		/* ===============CODE================== */
	}
	else
	{
		//user heeft niet het correcte level
		echo 'U heeft niet de juiste bevoegdheid voor deze pagina.';
		RedirectNaarPagina();//redirect naar home
	}
}
else
{
	//user is niet ingelogd
	RedirectNaarPagina(NULL,98);//instant redirect naar inlogpagina
}
?>
