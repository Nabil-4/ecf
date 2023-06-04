<?php session_start(); ?>

<?php if (isset($_SESSION['super-admin']) || isset($_SESSION['good-admin'])): ?>

<?php 

require_once "../include/connection_dbh.php";
require_once "../include/traitement_img.php";

$id_modif = $_SESSION['modif-produit'];

$sql = "SELECT * FROM nabil_products
        WHERE id = $id_modif
";

$sth = $dbh -> query($sql);

$result = $sth -> fetchAll(PDO::FETCH_ASSOC) ?>

<h1>Modifier le produit</h1>

<?php 

if (isset($_SESSION['form-produit'])) {
    $_POST = $_SESSION['form-produit'];
    $_SESSION['form-produit'] = [];
    unset($_SESSION['form-produit']);
}


if ($_POST) { 
    $msg_error_ = "Veuiller remplir le champs suivant : ";
    foreach ($_POST as $key => $value) {
        ${$key} = $value;
        if (empty($value)) {
            if ($key == "photo" || $key == "stock") { continue; }
            $error = true;
            $msg_error_ .= "<br>". $key;
        }
    }

    if (empty($tab_tags)) {
        $error = true;
        $msg_error_ .= "<br>". "tag";
    }

    if (empty($bio_choice)) {
        $error = true;
        $msg_error_ .= "<br>". "bio ?";
    }

    if ($_FILES) {
        foreach ($_FILES as $name => $value) {
            $msg_error = traitement_img($name); 
            $photo_name = strtolower($value['name']);     
            $photo_name = str_replace(' ', '', $photo_name); 
            $target = 'upload/'.$photo_name;
        }
    }

    if (isset($error) || isset($msg_error)) {
        echo '<br>'.$msg_error_;
        if (isset($msg_error)) {
            echo '<br>'.$msg_error;
        } 
    } else {
        if ($_FILES) {
            $_SESSION['form-produit'] = $_POST; 
            $_SESSION['form-produit']['photo'] = $target;

            foreach ($_SESSION['form-produit'] as $key => $value) {
                ${$key} = $value;
            }

            $sql = "UPDATE nabil_products
                    SET
                    titre = '$titre',
                    descriptif = '$descriptif',
                    stock = '$stock',
                    bio = '$bio_choice',
                    prix = '$prix',
                    prix_promo = '$prix_promo',
                    photo = '$photo'
                    WHERE id = $id_modif
                    LIMIT 1
            ";

            $sth = $dbh -> query($sql);

            unset($_SESSION['form-produit']);
            header('location:liste_produits.php'); 
        }  
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
    <label for="titre">Titre</label>
    <input type="text" name="titre" id="titre" value = "<?php if (isset($titre)) echo $titre ?>">

    <label for="descriptif">Description</label>
    <textarea name="descriptif" id="descriptif"><?php if (isset($descriptif)) echo $descriptif ?></textarea>

    <label for="categorie">Catégorie</label>
    <select name="categorie" id="categorie" value = "<?php if (isset($error)) echo $categorie ?>">
    <?php if(isset($categorie)): ?>
        <option value="<?= $categorie ?>"><?= $categorie ?></option>
    <?php else: ?>
        <option value="">Catégorie</option>
    <?php endif ?>
        <?php 
            $sql = "SELECT categorie FROM nabil_categorie
                    ORDER BY id
            ";

            $sth = $dbh -> query($sql);

            $result_categorie = $sth -> fetchAll(PDO::FETCH_ASSOC) ?>

            <?php foreach ($result_categorie as $key => $value): ?>
                <?php if (is_array($value)) {
                    $value = $value['categorie'];
                } ?>
                <option value=<?= $value ?>><?= $value ?></option>
            <?php endforeach ?>
    </select>

    <label for="stock">Stock</label>
    <input type="number" name="stock" id="stock" step="1" value = "<?php if (isset($stock)) echo $stock ?>">

    <p>Bio ?</p>
    <?php $tab_bio = ["oui", "non"] ?>
    <?php foreach ($tab_bio as $key => $bio): ?>
        <?php if (isset($bio_choice)) {
                $checked = "";
                if ($bio_choice == $bio) {
                    $checked = "checked";
                } 
            } else if ($result[0]['bio'] == $bio) {
                $checked = "checked";
            } else {
                    $checked = "";
                } 
                ?>
    <div class="align">
        <label for=<?= $bio ?>><?= $bio ?></label>
        <input type="radio" name="bio_choice" id="<?= $bio ?>" value="<?= $bio ?>" <?= $checked ?>>
    </div>
    <?php endforeach ?>

    <label for="prix">Prix</label>
    <input type="number" name="prix" id="prix" value = "<?php if (isset($prix)) echo $prix ?>">

    <label for="prix_promo">Prix de promo</label>
    <input type="number" name="prix_promo" id="prix_promo" value = "<?php if (isset($prix_promo)) echo $prix_promo ?>">

    <p>Tags</p>   
    <?php $sql = "SELECT tag FROM nabil_tags
                  ORDER BY id
    ";

    $sth = $dbh -> query($sql);

    $result_tag = $sth -> fetchAll(PDO::FETCH_ASSOC) ?>
                      
    <?php foreach ($result_tag as $key => $value): ?>
        <?php if (is_array($value)) {
            $value = $value['tag'];
        } ?>
        <label for=<?= $value?>><?= $value ?></label>
        <?php if (isset($tab_tags)) {
            $checked = "";
            foreach ($tab_tags as $key => $choice) {
                if ($choice == $value) {
                    $checked = "checked";
                } 
            }
        } else if ($tag == $value) {
            $checked = "checked";
        } else {
            $checked = "";
        } ?>
            
        
        <div class="align">
            <input type="checkbox" name="tab_tags[]" id="<?= $value ?>" value="<?= $value ?>" <?= $checked ?>>
        </div>
    <?php endforeach ?>

    <label for="photo">Photo</label>
    <input type="file" name="photo" id="photo">

    <input type="submit" value="Modifier">
</form>

<?php else: ?>
        <?php header('location:index.php') ?>
<?php endif ?>


