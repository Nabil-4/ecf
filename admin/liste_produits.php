<?php session_start();
ob_start() ?>

<?php if(isset($_SESSION['super-admin']) || isset($_SESSION['good-admin'])): ?>

<?php 
require_once "../include/connection_dbh.php";



$sql = "SELECT * FROM nabil_products
";

$sth = $dbh -> query($sql);

$result = $sth->fetchAll(PDO::FETCH_ASSOC) ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits</title>
    </title>
</head>
<style>
    th, td {
        border: 1px solid;
        padding: 10px;
    }
    
    table {
        border-collapse: collapse;
    }

    tr td:nth-last-of-type(-n+2) {
        text-align: center;
    }

    <?php if(isset($_SESSION['super-admin'])): ?>
        tr td:last-child a{
            color: red;
        }
    <?php endif ?>

    a {
        text-decoration: none;
        color: black;
    }

</style>

<body>
    <h2>Liste des produits</h2>
    <table>
    <?php foreach ($result as $key => $value) : ?>
        <?php foreach ($value as $info => $valeur) : ?>
            <?php ${$info} = $info; ?>
        <?php endforeach ?>
        <?php if(!isset($thead)): ?>
       <?php $thead = true ?>
            <thead>
                <tr>
                    <th><?= $id ?></th>
                    <th><?= $titre ?></th>
                    <th><?= $descriptif ?></th>
                    <th><?= $categorie ?></th>
                    <th><?= $stock ?></th>
                    <th><?= $bio ?></th>
                    <th><?= $prix?></th>
                    <th><?= $prix_promo ?></th>
                    <th><?= $tag ?></th>
                    <th><?= $date_insertion ?></th>
                    <th><?= $photo ?></th>
                    <th>Modification</th>
                    <?php if(isset($_SESSION['super-admin'])): ?>
                        <th>Supprimer</th>
                    <?php endif ?>
                </tr>
            </thead>
            <?php endif ?>
            <?php foreach ($value as $info => $valeur) : ?>
                <?php ${$info} = $valeur; ?>
            <?php endforeach ?>
            <tbody>
                <tr>
                    <td><?= $id ?></td>
                    <td><?= $titre ?></td>
                    <td><?= $descriptif ?></td>
                    <td><?= $categorie ?></td>
                    <td><?= $stock ?></td>
                    <td><?= $bio ?></td>
                    <td><?= $prix ?></td>
                    <td><?= $prix_promo ?></td>
                    <td><?= $tag ?></td>
                    <td><?= $date_insertion ?></td>
                    <td> <img src="<?= $photo ?>" alt="photo" style="max-width:100px"></td>
                    <td><a href="liste_produits?modif=<?=$id?>">Modifier</a></td>
                    <?php if(isset($_SESSION['super-admin'])): ?>
                        <td><a href="liste_produits?suppr=<?=$id?>">X</a></td>
                    <?php endif ?>
                </tr>
            </tbody>  
    <?php endforeach ?>
</table>

<!-- Suppression -->

<?php if (isset($_GET["suppr"]) && isset($_SESSION['super-admin'])): ?>
    <?php $suppr_id = $_GET["suppr"]?>
    <div>Etes vous sur de vouloir supprimer le produit
        <a href="liste_produits?suppr=<?=$suppr_id?>&valid-suppr=oui">OUI</a> 
        <a href="liste_produits.php">NON</a> 
    </div>

    <?php if (isset($_GET["valid-suppr"])): ?>
        <?php if ($_GET["valid-suppr"] === "oui"): ?>
            <?php
            $sql ="DELETE FROM nabil_products
            WHERE id = $suppr_id
            LIMIT 1
            ";

            $sth = $dbh -> query($sql);

            header("location:liste_produits.php");
            ?>
        <?php endif ?>
    <?php endif ?>
<?php endif ?>






<!-- Modification -->

<?php if (isset($_GET["modif"])): ?>
    <?php $modif_id = $_GET["modif"]?>
    <div>Etes vous sur de vouloir modifier le produit
        <a href="liste_produits?modif=<?=$modif_id?>&valid-modif=oui">OUI</a> 
        <a href="liste_produits.php">NON</a> 
    </div>

    <?php if (isset($_GET["valid-modif"])): ?>
        <?php if ($_GET["valid-modif"] === "oui"): ?>
            <?php $_SESSION['modif-produit'] = $modif_id;
            header('location:modif_product.php');
            ?>
        <?php endif ?>
    <?php endif ?>
<?php endif ?>
<br>
<a href="admin.php">RETOUR</a>
</body>

</html>

<?php else: ?>
        <?php header('location:index.php') ?>
<?php endif ?>