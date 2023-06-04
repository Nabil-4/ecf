<?php session_start(); ?>

<?php if (isset($_SESSION['super-admin']) || isset($_SESSION['good-admin'])): ?>

<?php require_once "../include/connection_dbh.php";
require_once "../include/traitement_img.php"; ?>

<h1>Ajouter un produit</h1>

<?php 

if (isset($_SESSION['form'])) {
    $_POST = $_SESSION['form'];
    $_SESSION['form'] = [];
    unset($_SESSION['form']);
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
            $_SESSION['form'] = $_POST; 
            $_SESSION['form']['photo'] = $target;

            $sql = "CREATE TABLE IF NOT EXISTS nabil_products (
                id INT UNSIGNED AUTO_INCREMENT,
                titre VARCHAR(50),
                descriptif TEXT,
                categorie VARCHAR(50),
                stock INT UNSIGNED,
                bio VARCHAR(20),
                prix FLOAT(5,2),
                prix_promo FLOAT(5,2),
                tag VARCHAR(50),
                date_insertion DATETIME,
                photo VARCHAR(100),

                PRIMARY KEY (id),
                UNIQUE (titre)
                ) 
                CHARACTER SET utf8 COLLATE utf8_general_ci,
                ENGINE = INNOBD
            ";

            $sth = $dbh -> query($sql);

            foreach ($_SESSION['form'] as $key => $value) {
                if (is_array($value)) {
                    $value = $value[0];
                }
                ${$key} = $value;
            }

            $sql = "INSERT INTO nabil_products
                    VALUES (id, '$titre', '$descriptif', '$categorie', '$stock', '$bio_choice', '$prix', '$prix_promo', '$tab_tags', NOW(), '$photo')
            ";

            $sth = $dbh -> query($sql);
            
            unset($_SESSION['form']);
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

            $result = $sth -> fetchAll(PDO::FETCH_ASSOC) ?>

            <?php foreach ($result as $key => $value): ?>
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

    $result = $sth -> fetchAll(PDO::FETCH_ASSOC) ?>
                      
    <?php foreach ($result as $key => $value): ?>
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
        } else {
            $checked = "";
        } ?>
        <div class="align">
            <input type="checkbox" name="tab_tags[]" id="<?= $value ?>" value="<?= $value ?>" <?= $checked ?>>
        </div>
    <?php endforeach ?>

    <label for="photo">Photo</label>
    <input type="file" name="photo" id="photo">

    <input type="submit" value="Envoyer">
</form>
    <?php else: ?>
        <?php header('location:index.php') ?>
<?php endif ?>