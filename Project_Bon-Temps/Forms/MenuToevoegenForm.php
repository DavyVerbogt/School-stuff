<h1>Menu Toevoegen</h1>
<form name="MenuToevoegen" method="post">
    <label for="Gerecht">Gerecht:</label>
    <input type="text" id="Gerecht" name="Gerecht" value="<?php echo $Gerecht; ?>" /><?php echo $GerechtErr; ?>
    <br />

    <label for="Beschrijving">Beschrijving:</label><br />
    <textarea rows="4" cols="50" id="Beschrijving" name="Beschrijving" value="<?php echo $Beschrijving; ?>"></textarea><?php echo $BeschrijvingErr; ?>
    <br />

    <label for="Price">Prijs:</label>
    <input type="text" id="Prijs" name="Prijs" value="<?php echo $Prijs ?>" /> <?php echo $PrijsErr; ?>
    <br />

    <input type="submit" name="Toevoegen" value="Toevoegen!" />
</form>
<br />