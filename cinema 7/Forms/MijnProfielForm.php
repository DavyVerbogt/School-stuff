<!-- 
	Opdracht 4.03 : Mijn Profiel 
	Maak hier het formulier voor de pagina Mijn Profiel. Let op: dit lijkt sterk op het formulier Registreren
-->
	
<h1>Mijn Profiel Wijzigen</h1>
<table>
    <form name="MijnProfielFormulier" action="" method="post">
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
            <!-- knop om verder te gaan -->
            <td> <input type="submit" name="Wijzigen" value="Wijzigen!" /> </td>
        <tr>
    </form>
</table> 