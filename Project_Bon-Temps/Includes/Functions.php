<?php
function ConnectDB()
{
  try {
    $pdo = new PDO("mysql:host=" . HOST . "; dbname=" . DBNAME, USERNAME, PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
  } catch (PDOException $e) {
    echo $e->getMessage();
  }

  return $pdo;
}

$pdo = connectDB();

$stmt = $pdo->prepare('SELECT * FROM Menu');
$stmt->execute();
$menuitems = $stmt->fetchAll();

$stmt = $pdo->prepare('SELECT * FROM Klanten');
$stmt->execute();
$klanten = $stmt->fetchAll();

function MenuItemToevoegen()
{
  $Gerecht = $Beschrijving = $Prijs = NULL;

  $GerechtErr = $BeschrijvingErr = $PrijsErr = NULL;

  if (isset($_POST['Toevoegen'])) {
    $pdo = connectDB();
    $CheckOnErrors = false;
    $Gerecht = $_POST['Gerecht'];
    $Beschrijving = $_POST['Beschrijving'];
    $Prijs = $_POST['Prijs'];


    if (empty($Gerecht)) {
      $GerechtErr = "Dit veld is vereist om in te vullen";
      $CheckOnErrors = true;
    }

    if (empty($Beschrijving)) {
      $BeschrijvingErr = "Dit veld is vereist om in te vullen";
      $CheckOnErrors = true;
    }

    if (empty($Prijs)) {
      $PrijsErr = "Dit veld is vereist om in te vullen";
      $CheckOnErrors = true;
    } elseif (!is_numeric($Prijs)) {
      $PrijsErr = "Dit is geen geldige prijs";
      $CheckOnErrors = true;
    }

    if ($CheckOnErrors) {
      require('./Forms/MenuToevoegenForm.php');
    } else {
      $parameters = array(
        'Gerecht' => $Gerecht,
        'Beschrijving' => $Beschrijving,
        'Prijs' => $Prijs
      );


      $sth = $pdo->prepare('INSERT INTO Menu (MenuID, Gerecht, Beschrijving, Prijs)
                          VALUES (NULL, :Gerecht, :Beschrijving, :Prijs)');

      $sth->execute($parameters);
      echo "Het gerecht is toegevoed";
      echo "Over 5 seconden word u terug gestuurd naar het menu";
      header('refresh: 5; url= menu.php');
    }
  } else {
    require('Forms/MenuToevoegenForm.php');
  }
}

function MenuItemEdit()
{
  $pdo = connectDB();
  $Gerecht = $Beschrijving = $Prijs = NULL;

  $GerechtErr = $BeschrijvingErr = $PrijsErr = NULL;

  if (isset($_POST['Aanpassen'])) {
    $CheckOnErrors = false;
    $Gerecht = $_POST['Gerecht'];
    $Beschrijving = $_POST['Beschrijving'];
    $Prijs = $_POST['Prijs'];


    if (empty($Gerecht)) {
      $GerechtErr = "Dit veld is vereist om in te vullen";
      $CheckOnErrors = true;
    }

    if (empty($Beschrijving)) {
      $BeschrijvingErr = "Dit veld is vereist om in te vullen";
      $CheckOnErrors = true;
    }

    if (empty($Prijs)) {
      $PrijsErr = "Dit veld is vereist om in te vullen";
      $CheckOnErrors = true;
    } 

    if ($CheckOnErrors) {
      require('Forms/MenuEditForm.php');
    } else {
      $parameters = array(
        ':MenuID' => $_GET['MenuID'],
        'Gerecht' => $Gerecht,
        'Beschrijving' => $Beschrijving,
        'Prijs' => $Prijs
      );

      $sth = $pdo->prepare('UPDATE Menu SET Gerecht = :Gerecht, Beschrijving = :Beschrijving, Prijs = :Prijs WHERE MenuID = :MenuID');

      $sth->execute($parameters);

      echo "Het gerecht is succesvol aangepast";
      echo "Over 5 seconden word u terug gestuurd naar het menu";
      header('refresh: 5; url= menu.php');
    }
  } else {

    $parameters = array(':MenuID' => $_GET['MenuID']);

    $sth = $pdo->prepare('SELECT * FROM Menu WHERE MenuID = :MenuID');

    $sth->execute($parameters);
    $row = $sth->fetch(); // rij fetchen

    $Gerecht = $row["Gerecht"];
    $Beschrijving = $row["Beschrijving"];
    $Prijs = $row['Prijs'];

    require('Forms/MenuEditForm.php');
  }
}
