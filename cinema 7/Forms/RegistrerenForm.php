<!--
	Opdracht PM08 STAP 1: registreren
	Omschrijving: Geef met commentaar aan wat de stukjes PHP code doen in dit bestand
-->


<h1>Registreren</h1>
<table>
    <form name="RegistratieFormulier" action="" method="post">
        <tr>
            <!-- Invul veld voor je voornaam -->
            <td> <label for="FirstName">Voornaam:</label> </td>
            <td> <input type="text" id="FirstName" name="FirstName" value="<?php echo $FirstName; ?>" /><?php echo $FnameErr; ?></td>
        </tr>
        <tr>
            <!-- Invul veld voor je Achternaam -->
            <td> <label for="LastName">Achternaam:</label> </td>
            <td> <input type="text" id="LastName" name="LastName" value="<?php echo $LastName; ?>" /><?php echo $LnameErr; ?> </td>
        </tr>
        <tr>
            <!-- Invul veld voor je adres -->
            <td> <label for="Adres">Adres:</label> </td>
            <td> <input type="text" id="Adres" name="Adres" value="<?php echo $Adres; ?>" /> </td>
        </tr>
        <tr>
            <!-- Invul veld voor je postcode -->
            <td> <label for="ZipCode">Postcode:</label> </td>
            <td> <input type="text" id="ZipCode" name="ZipCode" value="<?php echo $ZipCode; ?>" /><?php echo $ZipErr; ?>
            </td>
        </tr>
        <tr>
            <!-- Invul veld voor je plaats -->
            <td> <label for="City">Plaats:</label> </td>
            <td> <input type="text" id="City" name="City" value="<?php echo $City; ?>" /><?php echo $CityErr; ?> </td>
        </tr>
        <tr>
            <!-- Invul veld voor je telefoon nummer -->
            <td> <label for="TelNr">Telefoon nr.:</label> </td>
            <td> <input type="text" id="TelNr" name="TelNr" value="<?php echo $TelNr; ?>" /><?php echo $TelErr; ?> </td>
        </tr>
        <tr>
            <!-- Invul veld voor je email -->
            <td> <label for="Email">E-mail:</label> </td>
            <td> <input type="text" id="Email" name="Email" value="<?php echo $Email; ?>" /><?php echo $MailErr; ?>
            </td>
        </tr>
        <tr>
            <!-- Invul veld voor je Username -->
            <td> <label for="Username">Gebruikersnaam:</label> </td>
            <td> <input type="text" id="Username" name="Username" value="<?php echo $Username; ?>" /><?php echo $UserErr; ?> </td>
        </tr>
        <tr>
            <!-- Invul veld voor je wachtwoord-->
            <td> <label for="Password">Wachtwoord:</label> </td>
            <td> <input type="password" id="Password" name="Password" /><?php echo $PassErr; ?></td>
        </tr>
        <tr>
            <!-- Invul veld voor je wachtwoord nog eens te herhaalen-->
            <td> <label for="RetypePassword">Herhaal Wachtwoord:</label> </td>
            <td> <input type="password" id="RetypePassword" name="RetypePassword" /><?php echo $RePassErr; ?> </td>
        </tr>
        <tr>
            <!-- knop om verder te gaan -->
            <td> <input type="submit" name="Registreren" value="Registreer!" /> </td>
        <tr>
    </form>
</table> 