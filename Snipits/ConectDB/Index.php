<?php
session_start();
require('Config.php');
require('ConectDB.php');

$pdo = connectDB();

echo $pdo ? 'Connected to DB' : 'Not connected to DB';
