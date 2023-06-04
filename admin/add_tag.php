<?php session_start(); ?>

<?php if (isset($_SESSION['super-admin']) || isset($_SESSION['good-admin'])): ?>

<?php require_once "../include/connection_dbh.php" ?>
<h1>Ajouter un tag</h1>

<form action="" method="post" id="form">
    <label for="tag">Nouveau tag</label>
    <input type="text" name="tag" id="tag">

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

            $sql = "CREATE TABLE IF NOT EXISTS nabil_tags (
            id INT UNSIGNED AUTO_INCREMENT,
            tag VARCHAR(50),
            
            PRIMARY KEY (id),
            UNIQUE (tag)
            )

            CHARACTER SET utf8 COLLATE utf8_general_ci,
            ENGINE = INNOBD
            ";

            $sth = $dbh -> query($sql);

            $sql = "INSERT INTO nabil_tags
                    VALUES (id, '$tag')
            ";

            $sth = $dbh -> query($sql);

            header('location:liste_tag');

            }  
        }
?>
<?php else: ?>
        <?php header('location:index.php') ?>
<?php endif ?>