<!--
	Opdracht PM07 STAP 1: Inlogsysteem
	Omschrijving: Maak het formulier met 2 velden en de link naar de pagina registreren in html code
-->
<h1>inloggen</h1>
<?php echo '<br/>'. $error.'<br/>';?>
<table>
<form name = "InlogFormulier" method = "post">
	<tr>
		<td><label for = "username">Inlognaam:</label></td>
		<td><input type = "text" id = "username" name = "username"/></td>
	</tr>
	<tr>
	<td><label for = "password">Wachtwoord:</label></td>
	<td><input type = "password" id = "password" name = "password"/></td>
	</tr>
	<tr>
		<td><input type = "submit" name = "inloggen" value = "Log In!"/></td>
	</tr>
</form>
<br/>
</table>
Heeft u nog geen account? <a href="index.php?paginaNummer=6">Registreer dan hier</a>.