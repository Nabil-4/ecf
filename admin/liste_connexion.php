<?php session_start(); ?>

<?php if (isset($_SESSION['super-admin'])): ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des connexions</title>
</head>
<style>
    th, td {
        border: 1px solid;
        padding: 10px;
    }
    
    table {
        border-collapse: collapse;
    }

    tr td {
        text-align: center;
    }

    a {
        text-decoration: none;
        color: black;
    }

</style>
<body>
    <?php
    require_once "../include/connection_dbh.php" ;

    $sql = "SELECT * FROM nabil_connexion
    ";

    $sth = $dbh -> query($sql); 

    $result = $sth -> fetchAll(PDO::FETCH_ASSOC) ?>

    <h2>Liste des connexions</h2>
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
                    <th><?= $identifiant ?></th>
                    <th><?= $date_connexion ?></th>
                </tr>
            </thead>
            <?php endif ?>
            <?php foreach ($value as $info => $valeur) : ?>
                <?php ${$info} = $valeur; ?>
            <?php endforeach ?>
            <tbody>
                <tr>
                    <td><?= $id ?></td>
                    <td><?= $identifiant ?></td>
                    <td><?= $date_connexion ?></td>
                </tr>
            </tbody>  
    <?php endforeach ?>
    </table>





    <br>
    <a href="admin.php">RETOUR</a>
</body>
</html>

<?php else: ?>
        <?php header('location:index.php') ?>
<?php endif ?>