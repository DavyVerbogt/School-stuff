<?php
session_start();
require('./Configuratie.php');
require('Includes/Functions.php');
include 'Includes/TopPage.php';
?>
<ul class="sidenav">
    <li class="link"><a class="notactive" href="Index.php">Home</a></li>
    <li class="link"><a class="active" href="Menu.php">Menu</a></li>
    <li class="link"><a class="notactive" href="Reserveren.php">Reserveren</a></li>
</ul>


<div class="menu">
    <ol class="menu">
        <?php
        foreach ($menuitems as $menuitem) {
            echo '<li class="menu"> ' . $menuitem['Gerecht'] . '</br>' . $menuitem['Beschrijving'] . '</li>';
        }
        ?>
    </ol>
</div>
</body>