<style>
    h2 {
        font-family:'Courier New', Courier, monospace; 
        color:#12247a
    }

    #categorie {
        display: flex;
    }

    #page-categorie {
        display: flex;
        flex-wrap: wrap;
    }
    #page-categorie li {
        border-radius: 5px;
        max-width: 250px;
        text-align: center;
        padding: 10px;
        margin: 10px;
        margin-right: 5px;
        margin-left: 5px;
        display: flex;
        flex-direction: column;
    }

    #page-categorie a {
        color: black;
    }

    #select-categorie {
        display: flex;
        flex-direction: column;
    }

    #select-categorie li {
        border-radius: 5px;
        max-width: 200px;
        text-align: center;
        padding: 10px;
        margin: 5px;
        background-color: #12247a;       
    }

    #select-categorie a {
        color: white;
        font-weight: 700;
    }

    #produit-liste {
        display: flex;
        flex-direction: column;
        text-align: center;
        max-width: 250px;
    }

    #produit-liste a {
        color: black;
    }

    #produit-liste div {
        position: relative;
    }

    #group-product {
        display: flex;
        flex-wrap: wrap;
    }

    #produit div {
        position: relative;
    }

    #select-tag {
        margin-top: 50px;
        display: flex;
        flex-direction: column;
    }

    #select-tag li {
        border-radius: 5px;
        max-width: 200px;
        text-align: center;
        padding: 10px;
        margin: 5px;
        background-color: #ffad33;       
    }

    #select-tag li:last-child {
        background-color: #269900;
    }

    #select-tag a {
        color: white;
        font-weight: 700;
    }

    #produit {
        display: flex;
    }

    #produit img {
        max-width: 300px;
    }

    #produit div:last-child {
        display: flex;
        flex-direction: column;  
        justify-content: space-around;
        margin-left: 20px;
        margin-top: -50px;
        max-height: 400px;
    }

    #produit input[type="number"] {
        border: 1px solid black;
        width: 30px;
        text-align: center;
        margin-right: 5px;
    }

    #produit input[type="submit"] {
        background-color: #12247a;
        color: white;
        padding: 10px;
        border-radius: 5px;
    }
</style>

<main style="margin-left: 100px;">
    <?php require_once "include/connection_dbh.php" ?>

    <?php if (!isset($_GET['categorie']) && !isset($_GET['produit']) &&  !isset($_GET['tag'])  &&  !isset($_GET['bio'])): ?>

    <?php 
    $sql ="SELECT categorie FROM nabil_categorie
    ";

    $sth = $dbh -> query($sql);

    $result = $sth -> fetchAll(PDO::FETCH_ASSOC); ?>
    <ul id="page-categorie">
        <?php foreach ($result as $key => $value): ?>
            <?php if (is_array($value)) {
                $value = $value['categorie'];
            }
            $photo = "img/products/_category/_".$value;
            ?>
           <li><img src="<?= $photo ?>" alt="<?= $value ?>"><a href="index.php?page=boutique&categorie=<?= $value ?>"><?= $value ?></a></li>
        <?php endforeach ?>
    </ul>
    <?php endif ?>


    <?php if (isset($_GET['categorie']) || isset($_GET['produit']) || isset($_GET['tag']) || isset($_GET['bio'])): ?>
        <?php if (isset(($_GET['categorie']))): ?>
            <h2>Boutique/<?= $_GET['categorie'] ?></h2>
        <?php else: ?>
            <h2>Boutique</h2>
        <?php endif ?>

        

        <!-- Categorie -->
        <div id="categorie">
            <div>
        <?php $sql ="SELECT categorie FROM nabil_categorie
        ";

        $sth = $dbh -> query($sql);

        $categorie = $sth -> fetchAll(PDO::FETCH_ASSOC) ?>
        <ul id="select-categorie">
        <?php foreach ($categorie as $key => $value): ?>
                <?php if (is_array($value)) {
                    $value = $value['categorie'];
                } ?>
                <li><a href="index.php?page=boutique&categorie=<?= $value ?>"><?= $value ?></a></li> 
            <?php endforeach ?>
        </ul>


        

        <!-- Tag -->
        <?php $sql ="SELECT tag FROM nabil_tags
        ";

        $sth = $dbh -> query($sql);

        $tag = $sth -> fetchAll(PDO::FETCH_ASSOC) ?>
        <ul id="select-tag">
            <?php foreach ($tag as $key => $value): ?>
                <?php if (is_array($value)) {
                    $value = $value['tag'];
                } ?>
                <li><a href="index.php?page=boutique&tag=<?= $value ?>"><?= $value ?></a></li>
            <?php endforeach ?>
            <li><a href="index.php?page=boutique&bio=oui">Bio</a></li>
        </ul>
        </div>
            


        <!-- Liste Produit -->
        <?php if(isset($_GET['categorie']) || (isset($_GET['tag']))  || (isset($_GET['bio']))): ?>

        <?php if (isset($_GET['categorie'])) {
            $categorie_selected = $_GET['categorie'];

            $sql = "SELECT * FROM nabil_products
            WHERE categorie = '$categorie_selected'
            ";

            $sth = $dbh -> query($sql);

            $result = $sth -> fetchAll(PDO::FETCH_ASSOC);
        } ?>

        <?php if (isset($_GET['tag'])) {
            $tag_selected = $_GET['tag'];

            $sql = "SELECT * FROM nabil_products
            WHERE tag = '$tag_selected'
            ";

            $sth = $dbh -> query($sql);

            $result = $sth -> fetchAll(PDO::FETCH_ASSOC);
        } ?>

        <?php if (isset($_GET['bio'])) {
            $tag_selected = $_GET['bio'];

            $sql = "SELECT * FROM nabil_products
            WHERE bio = 'oui'
            ";

            $sth = $dbh -> query($sql);

            $result = $sth -> fetchAll(PDO::FETCH_ASSOC);
        } ?>
        

        <div id="group-product">
            <?php foreach ($result as $key => $produit): ?>
                <?php foreach ($produit as $key => $value): ?>
                    <?php ${$key} = $value?>
                <?php endforeach ?>
                    <div id="produit-liste">
                        <a href="index.php?page=boutique&produit=<?= $titre ?>">
                            <div>
                                <img src="admin/<?= $photo ?>" alt="<?= $photo ?>" style="max-width:250px">
                                <?php if ($bio == "oui"): ?>
                                    <img src="img/logo-bio-50x50.png" alt="bio" style="position:absolute; top: 10px; right: 10px;">
                                <?php endif ?>
                                <?php if ($prix > $prix_promo): ?>
                                    <p style="position:absolute; bottom: 15px; left: 15px; color:red; font-size:20px">-<?= number_format(100-($prix_promo*100)/$prix) ?>%</p>
                                <?php endif ?>
                            </div>
                            <p><?= $titre ?></p>
                            <span><?= $prix ?> €</span>
                        </a>
                    </div>
            <?php endforeach ?>
        </div>
        <?php endif ?>  
    <?php endif ?>


    <!-- Produit --> 
    <?php if (isset($_GET['produit'])): ?> 
        
        <?php $produit_selected = $_GET['produit'];

        $sql = "SELECT * FROM nabil_products
                WHERE titre = '$produit_selected'
        ";

        $sth = $dbh -> query($sql);

        $result = $sth -> fetchAll(PDO::FETCH_ASSOC); ?>


        <?php foreach ($result[0] as $key => $value): ?>
            <?php ${$key} = $value ?>
        <?php endforeach ?>
        <div id="produit">
            <div>
                <img src="admin/<?= $photo ?>" alt="<?= $photo ?>">
                <?php if ($bio == "oui"): ?>
                    <img src="img/logo-bio-50x50.png" alt="bio" style="position:absolute; top: 10px; right: 10px;">
                <?php endif ?>
                <?php if ($prix > $prix_promo): ?>
                    <p style="position:absolute; top: 260px; left: 15px; color:red; font-size:20px">-<?= number_format(100-($prix_promo*100)/$prix) ?>%</p>
                <?php endif ?>
            </div>
            <div>
                <div>
                    <h3><?= $titre ?></h3>      
                    <?php if ($prix > $prix_promo): ?>
                        <span style="text-decoration:line-through"><?= $prix ?> €</span>
                        <span style="font-size:20px"><strong><?= $prix_promo ?> €</strong></span>
                    <?php else: ?>
                        <span><?= $prix ?> €</span>
                    <?php endif ?>
                </div> 
                <p><?= $descriptif ?></p>
                <?php if ($stock > 0): ?>
                    <form action="" method="post" id="form-produit">
                        <input type="number" name="nbr-produit" id="nbr-produit" step="1" value="1">
                        <input type="submit" value="Ajouter au panier">
                    </form>
                <?php else: ?>
                    <p style="background:#b60202; padding:10px; width:200px; border-radius:5px; color: white; text-align:center">RUPTURE DE STOCK</p>
                <?php endif ?>
            </div>
        </div>
    <?php endif ?>

    
</div>
</main>

