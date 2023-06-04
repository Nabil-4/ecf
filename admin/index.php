<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

ob_start();
session_start(); 

if ((isset($_SESSION['super-admin']) || isset($_SESSION['good-admin']))) {
    session_destroy();
}

?>

<?php require_once "../include/connection_dbh.php"; ?>

<style>
    div {
        display:flex;
        flex-direction:column;
        align-items: center
    }

    form {
        display:flex; 
        flex-direction:column; 
        width:350px
    }

    form input {
        padding: 10px;
        margin-bottom: 10px;
        border: 2px solid #12247a;
        border-radius: 5px;
    }

    p {
        color: red;
        font-size: large;
    }
</style>

<div>
<h1>Connection</h1>

<form action="<?= $_SERVER['PHP_SELF']?>" method="post" id="form">
    <label for="id">Identifiant</label>
    <input type="text" name="id" id="id">

    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password">

    <label for="email">E-mail</label>
    <input type="email" name="email" id="email">

    <span>Mot de passe oublié</span>

    <input type="submit" value="Se connecter">
</form>


<?php 
$sql ="SELECT * FROM nabil_admin
";

$sth = $dbh -> query($sql);

$result = $sth -> fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $key => $admin) {
    foreach ($admin as $key => $value) {
        ${$key} = $value;
    }
    if ($name === 'N') {
        $super_id = $name;
        $super_password = $mdp;
        $super_email = $email;
    }
    if ($name === 'L') {
        $good_id = $name;
        $good_password = $mdp;
        $good_email = $email;
    }
}
?>

<?php if ($_POST):?>
    <?php foreach ($_POST as $key => $value) {
        ${$key} = $value;
    } 
?>
    <?php if (isset($id)): ?>
        <?php if ($id == $super_id && MD5($password) == $super_password && $email == $super_email): ?>
            <?php $_SESSION['super-admin'] = [$id, $email];
            require_once "insert/connexion_admin.php";
            header('location:admin.php') ?>
        <?php elseif ($id == $good_id && MD5($password) == $good_password && $email == $good_email):?>
            <?php $_SESSION['good-admin'] = [$id, $email];
            require_once "insert/connexion_admin.php";
            header('location:admin.php') ?>
        <?php else: ?>
            <p>ERREUR</p>
            </div>
        <?php endif ?>
    <?php endif ?>

    <div>
        <a href="../index">Retour boutique</a>
    </div>
<?php endif ?>