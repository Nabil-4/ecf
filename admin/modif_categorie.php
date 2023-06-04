<?php session_start(); ?>

<?php if (isset($_SESSION['super-admin']) || isset($_SESSION['good-admin'])): ?>

<?php 
require_once "../include/connection_dbh.php";

$id_modif = $_SESSION['modif-categorie'];

$sql = "SELECT * FROM nabil_categorie
        WHERE id = $id_modif
";

$sth = $dbh -> query($sql);

$result = $sth -> fetchAll(PDO::FETCH_ASSOC) ?>

<h1>Modifier la categorie</h1>

<?php 

if (isset($_SESSION['form-categorie'])) {
    $_POST = $_SESSION['form-categorie'];
    $_SESSION['form-categorie'] = [];
    unset($_SESSION['form-categorie']);
}


if ($_POST) { 
    $msg_error_ = "Veuiller remplir le champs suivant : ";
    foreach ($_POST as $key => $value) {
        ${$key} = $value;
        if (empty($value)) {
            if ($key == "photo") { continue; }
            $error = true;
            $msg_error_ .= "<br>". $key;
        }
    }

    if (isset($error) || isset($msg_error)) {
        echo '<br>'.$msg_error_;
        if (isset($msg_error)) {
            echo '<br>'.$msg_error;
        } 
    } else {
        $_SESSION['form-categorie'] = $_POST;

        foreach ($_SESSION['form-categorie'] as $key => $value) {
            ${$key} = $value;
        }

        $sql = "UPDATE nabil_categorie
                SET
                categorie = '$categorie'
                WHERE id = $id_modif
                LIMIT 1
        ";

        $sth = $dbh -> query($sql);

        unset($_SESSION['form-categorie']);
        header('location:liste_categorie.php'); 
    }  
}
?>

<style>
    form {
        display: flex;
        flex-direction: column;
        width: 500px;
    }

    form label {
        margin-top: 10px;
    }

    form input {
        margin-bottom: 10px;
    }
</style>

<?php foreach ($result[0] as $key => $value) {
    ${$key} = $value;
} ?>

<form action="" method="post" id="form" enctype= "multipart/form-data">
    <label for="categorie">Categorie</label>
    <input type="text" name="categorie" id="categorie" value = "<?php if (isset($categorie)) echo $categorie ?>">

    <input type="submit" value="Modifier">
</form>

<?php else: ?>
        <?php header('location:index.php') ?>
<?php endif ?>