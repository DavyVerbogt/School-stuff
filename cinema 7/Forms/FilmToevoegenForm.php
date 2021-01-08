<!-- 
	Opdracht PM11 STAP 1 : Film Toevoegen 
	Maak hier het formulier waarmee je een film kan toevoegen aan de database. Let op: dit formulier komt dus overeen met de velden uit de database tabel Films
-->
<h1>Film Toevoegen</h1>
<form name="FilmToevoegenFormulier" method="post">
	<label for="Title">Titel:</label>
	<input type="text" id="Title" name="Title" value="<?php echo $Title; ?>" /><?php echo $TitleErr; ?>
	<br />

	<label for="Description">Beschrijving:</label><br/>
	<textarea rows="4" cols="50" id="Description" name="Description" value="<?php echo $Description; ?>" ></textarea><?php echo $DescErr; ?>
	<br />

	<label for="Duration">Duur:</label>
	<input type="text" id="Duration" name="Duration" maxlength="3" value="<?php echo $Duration; ?>" /><?php echo $DurErr ?>
	<br />

	<label for="Genre">Genre:</label>
	<select id="Genre" name="Genre">
		<option value="Actie" <?php if($Genre == "Actie")	{echo "Selected";} ?>>Actie</option>
		<option value="Avontuur" <?php if($Genre == "Avontuur")	{echo "Selected";} ?>>Avontuur</option>
		<option value="Horror" <?php if($Genre == "Horror")	{echo "Selected";} ?>>Horror</option>
		<option value="Drama" <?php if($Genre == "Drama")	{echo "Selected";} ?>>Drama</option>
		<option value="Western" <?php if($Genre == "Western")	{echo "Selected";} ?>>Western</option>
		<option value="Oorlog" <?php if($Genre == "Oorlog")	{echo "Selected";} ?>>Oorlog</option>
		<option value="Thriller" <?php if($Genre == "Thriller")	{echo "Selected";} ?>>Thriller</option>
		<option value="Komedie" <?php if($Genre == "Komedie")	{echo "Selected";} ?>>Komedie</option>
	</select>
	<br />

	<label for="Age">Minimale Leeftijd:</label>
	<select id="Age" name="Age">
		<option value="ALL" <?php if($Genre == "ALL")	{echo "Selected";} ?>>ALL</option>
		<option value="6" <?php if($Genre == "6")	{echo "Selected";} ?>>6</option>
		<option value="12" <?php if($Genre == "12")	{echo "Selected";} ?>>12</option>
		<option value="16" <?php if($Genre == "16")	{echo "Selected";} ?>>16</option>
		<option value="18" <?php if($Genre == "18")	{echo "Selected";} ?>>18</option>
	</select>
	<br />

	<label for="Picture">Afbeelding van de Poster:</label>
	<input type="text" id="Picture" name="Picture" value="<?php echo $Picture; ?>" />
	<br />

	<label for="Price">Prijs:</label>
	<input type="text" id="Price" name="Price" value="<?php echo $Price ?>" /> <?php echo $PriceErr; ?>
	<br />
	<br />

	<label for="Type">Type:</label>
	<select id="Type" name="Type">
		<option value="3D" <?php if($Genre == "3D")	{echo "Selected";} ?>>3D</option>
		<option value="IMAX" <?php if($Genre == "IMAX")	{echo "Selected";} ?>>IMAX</option>
		<option value="IMAX 3D" <?php if($Genre == "IMAX 3D")	{echo "Selected";} ?>>IMAX 3D</option>
	</select>
	<br />

	<label for="Status">Status:</label>
	<select id="Status" name="Status">
		<option value="Verwacht" <?php if($Genre == "Verwacht")	{echo "Selected";} ?>>Verwacht</option>
		<option value="InBios" <?php if($Genre == "InBios")	{echo "Selected";} ?>>InBios</option>
	</select>
	<br />
	<input type="submit" name="Toevoegen" value="Toevoegen!"/>
</form>
<br />