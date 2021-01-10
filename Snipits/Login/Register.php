<?php
session_start();
require('../ConectDB/Config.php');
require('../ConectDB/ConectDB.php');

$pdo = connectDB();

$Username = $Password = $RetypePassword = null;

$UserErr = $PassErr = $RePassErr = null;

if (isset($_POST['Register'])) {
    $CheckOnErrors = false;

    $Username = $_POST["Username"];
    $Password = $_POST["Password"];
    $RetypePassword = $_POST["RetypePassword"];

    if (empty($Username)) {
        $UserErr = "Dit veld is vereist in te vullen";
        $CheckOnErrors = true;
    }

    if (empty($Password)) {
        $Password = "Dit veld is vereist in te vullen";
        $CheckOnErrors = true;
    } //elseif (!is_minlength($Password, 6)) {
    //  $PassErr = "Het wachtwoord moet minimaal 6 tekens bevatten";
    //  $CheckOnErrors = true;
    //}

    if (empty($RetypePassword)) {
        $RePassErr = "Dit veld is vereist in te vullen";
        $CheckOnErrors = true;
    } elseif ($Password != $RetypePassword) {
        $RePassErr = "De wachtwoorden komen niet overeen";
        $CheckOnErrors = true;
    }

    if ($CheckOnErrors) {
        require('RegisterFrom.php');
    } else {

        $parameters = array(
            ':Username' => $Username,
            ':Password' => $Password
        );

        $sth = $pdo->prepare('INSERT INTO login (Username, Password) VALUES (:Username, :Password)');

        $sth->execute($parameters);

        echo "Your account has been made";
    }
} else {
    require('RegisterFrom.php');
}
