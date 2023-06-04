<?php session_start(); ?>

<?php // require_once "../pages/parts/header.html"; ?>

<?php if (isset($_SESSION['super-admin']) || isset($_SESSION['good-admin'])): ?>
    
    <?php if (isset($_SESSION['super-admin'])) {
        $id = $_SESSION['super-admin'][0];
    } ?>
         
    <?php if (isset($_SESSION['good-admin'])) {
       $id = $_SESSION['good-admin'][0] ;
    } ?> 
    
    <style>
        ul {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }
        li {
            list-style: none;
            border: 1px solid #12247a;
            border-radius: 5px;
            padding: 5px;
            width: 250px;
            text-align: center;
            margin-top: 20px;
            color: white;
            background-color: #12247a;
        }

        a {
            text-decoration: none;
            color: white;
        }
    </style>

    <h1>Bonjour <?=$id?></h1>
    <h3>Que voulez-vous faire ?</h3>

    <div>
        <ul>
            <li><a href="add_product.php">Ajouter un produit</a></li>
            <li><a href="liste_produits.php">Modifier un produit</a></li>
            <li><a href="liste_produits.php">Supprimer un produit</a></li>
            <li><a href="add_categorie.php">Ajouter une catégorie</a></li>
            <li><a href="liste_categorie.php">Modifier une catégorie</a></li>
            <li><a href="liste_categorie.php">Supprimer une catégorie</a></li>
            <li><a href="add_tag.php">Ajouter un tag</a></li>
            <li><a href="liste_tag.php">Modifier un tag</a></li>
            <li><a href="liste_tag.php">Supprimer un tag</a></li>
            <?php if (isset($_SESSION['super-admin'])): ?>
                <li><a href="liste_connexion.php">Listes des connexions</a></li>
            <?php endif ?>
        </ul>
    </div>

    <br>
    <a href="index.php" style="color: black">DECONNECTION</a>
    <br>
    <br>
    <a href="../index" style="color: black">Retour boutique</a>

    <?php // require_once "../pages/parts/footer.html" ?> 
    <?php else: ?>
        <?php header('location:index.php') ?>
<?php endif ?>





