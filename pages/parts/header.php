<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="description de la page">
    <title>L'Esprit Crétois</title>
    <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">-->
    <link rel="stylesheet" href="css/style.css">

    <script src="https://kit.fontawesome.com/70c0d149b7.js" crossorigin="anonymous"></script>

</head>
<style>
    form {
        display: flex;
        margin-right: 100px;
    }

    form input[type="text"] {
        border: 1px solid black;
        margin-right: 5px;
    }

    form input[type="submit"] {
        background-color: black;
        color: white;
    }

    form input {
        padding: 5px;
    }
</style>

<body id="home">

    <div class="container" id="bt-categories">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
    </div>
    <div id="menu-categories"></div>
    <nav id="reseaux-sociaux">
        <a href="#"><i class="fab fa-facebook-square fa-2x"></i></a>
        <a href="#"><i class="fab fa-instagram fa-2x"></i></a>
        <a href="#"><i class="fab fa-twitter-square fa-2x"></i></a>
    </nav>
    <a id="back-to-top" class="arrow-up"><i class="fas fa-arrow-up fa-2x "></i></a>

    <header>
        <div class="gabarit">
            <section>
                <a href="index.html"><img src="img/logo-lesprit-cretois-150x150.png" alt="Boutique de produits crétois et grecs"></a>
                <h1>L'Esprit Crétois</h1>
                <?php if (isset($_GET['categorie']) || isset($_GET['produit']) ||  isset($_GET['tag'])  ||  isset($_GET['bio'])): ?>
                    <form action="" method="post" id="form-search">
                        <input type="text" name="search" id="search" placeholder="Rechercher un produit">
                        <input type="submit" value="OK">
                    </form>
                <?php endif ?>
            </section>
        </div>
        <div class="gabarit">
            <i class="fas fa-bars fa-3x" id="mobile-nav"></i>
            <nav id="primary-nav">
                <ul>
                    <li><a href="admin/index.php">Admin</a></li>
                    <li><a href="index.php?page=boutique">Boutique</a></li>
                    <li><a href="index.php?page=contact">Contact</a></li>
                    <li><a href="index.php?page=panier">Panier <span class="nbre-produits"></span></a> </li>
                </ul>
            </nav>
        </div>
    </header>