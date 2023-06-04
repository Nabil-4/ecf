<?php session_start(); ?>

<?php if (isset($_SESSION['super-admin']) || isset($_SESSION['good-admin'])): ?>

<?php require_once "../include/connection_dbh.php" ?>
<h1>Ajouter une catégorie</h1>

<form action="" method="post" id="form">
    <label for="categorie">Nouvelle categorie</label>
    <input type="text" name="categorie" id="categorie">

    <input type="submit" value="Ajouter">
</form>

<?php  if ($_POST) { 
        $msg_error_ = "Veuiller remplir le champs suivant : ";
        foreach ($_POST as $key => $value) {
            ${$key} = $value;
            if (empty($value)) {
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

            $sql = "CREATE TABLE IF NOT EXISTS nabil_categorie (
            id INT UNSIGNED AUTO_INCREMENT,
            categorie VARCHAR(50),
            
            PRIMARY KEY (id),
            UNIQUE (categorie)
            )

            CHARACTER SET utf8 COLLATE utf8_general_ci,
            ENGINE = INNOBD
            ";

            $sth = $dbh -> query($sql);

            $sql = "INSERT INTO nabil_categorie
                    VALUES (id, '$categorie')
            ";

            $sth = $dbh -> query($sql);

            header('location:liste_categorie');

            }  
        }
?>
<?php else: ?>
        <?php header('location:index.php') ?>
<?php endif ?>