<?php 

///Local///

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$user = 'root';
$pass = '';
$host = 'localhost';
$dbname = 'formation_via';

try {
    $dbh = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $pass);

    $dbh -> exec("SET NAMES 'utf8'");

    $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $error = "ERREUR PDO dans " . $e -> getFile(). ' | '. $e -> getLine() . ' : ' .$e -> getMessage();
    die($error);
} 


///En ligne///

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// $user = 'dbu3285281';
// $pass = "ViaFormationStagiaires2023!Olivet45";
// $host = 'db5012963980.hosting-data.io';
// $dbname = 'dbs10886826';

// try {
//     $dbh = new PDO('mysql:host='.$host.';port=3306;dbname='.$dbname, $user, $pass);

//     $dbh -> exec("SET NAMES 'utf8'");

//     $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
//     $error = "ERREUR PDO dans " . $e -> getFile(). ' | '. $e -> getLine() . ' : ' .$e -> getMessage();
//     die($error);
// }