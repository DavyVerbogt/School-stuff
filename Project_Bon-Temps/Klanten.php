<?php
session_start();
require('./Configuratie.php');
require('Includes/Functions.php');
include 'Includes/TopPage.php';
?>
<ul class="sidenav">
    <li class="link"><a class="active" href="Index.php">Home</a></li>
    <li class="link"><a class="notactive" href="Menu.php">Menu</a></li>
    <li class="link"><a class="notactive" href="Reserveren.php">Reserveren</a></li>
</ul>

<div>
    <?php
    foreach ($klanten as $klanten) {
        echo  $klanten['Naam'] ."\n". $klanten['Adres'] ."\n". $klanten['Postcode'] ."\n". $klanten['Plaats'] ."\n". $klanten['Email'] ."\n". $klanten['Telnr'] . '</br>';
    }
    ?>
</div>
</body>