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
