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
        if (isset($_GET['Action'])) {
            $Action = $_GET['Action'];
            switch ($Action) {
                case 'Edit':
                    $MenuEdit = MenuItemEdit();
                    break;
                case 'Del':
                    $parameters = array(':MenuID' => $_GET['MenuID']);

                    $sth = $pdo->prepare('DELETE FROM menu WHERE MenuID = :MenuID');

                    $sth->execute($parameters);

                    echo "Het gerecht is verwijderd";
                    echo "Over 5 seconden word u terug gestuurd naar het menu";
                    header('refresh: 5; url= menu.php');
                    break;
            }
        }
        foreach ($menuitems as $menuitem) {
            echo '<li class="menu"> ' . $menuitem['Gerecht'] . '</br>' . $menuitem['Beschrijving'] . '<a href="MenuEdit.php?Action=Edit&MenuID=' . $menuitem['MenuID'] . '">Aanpassen</a>' . ' <a href="MenuEdit.php?Action=Del&MenuID=' . $menuitem['MenuID'] . '">Delete</a>' . '</li>';
        }
        ?>
    </ol>
</div>
<?php
$menuitemtoevoegen = MenuItemToevoegen();
?>
</body>