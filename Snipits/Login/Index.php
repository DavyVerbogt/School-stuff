<?php
session_start();
require('../ConectDB/Config.php');
require('../ConectDB/ConectDB.php');

$pdo = connectDB();

  include('Login.php');

