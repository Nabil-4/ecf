<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

ob_start();
session_start();

if ($_GET) {
    $page = $_GET["page"];

    switch ($page) {
        case "boutique":
            $page = "boutique.php";
            break;
        case "contact":
            $page = "contact.php";
            break;
        case "panier":
            $page = "panier.php";
            break;
        default:
            $page = "acceuil.php";
    }
} else {
    $page = "boutique.php";
}
?>

<?php require_once "pages/parts/header.php"; ?>

<?php include_once "pages/" . $page ?>

<?php require_once "pages/parts/footer.html"; ?>