<div class="gabarit" id="contenu">
    <main>
        <h2>Contact </h2>
        <section>
            <form action="form.php" method="post" id="form-formation" enctype="multipart/form-data" class="form">
                <input type="hidden" value="" name="ip">
                <!--<input type="password" name="password">-->
                <div>
                    <fieldset>
                        <legend>Coordonnées</legend>

                        <label for="pseudo"> Prénom*</label>
                        <input type="text" name="prenom" id="prenom" placeholder="Marc" autofocus>

                        <label for="email"> Votre email*</label>
                        <input type="text" name="email" id="email">

                        <label for="age"> Votre âge?*</label>
                        <input type="number" name="age" id="age">

                        <label for="tel">Votre numéro de téléphone</label>
                        <input type="tel" name="tel" id="tel">

                        <label for="departement">Ville</label>
                        <input type="text" name="vile" id="ville" maxlength="5">
                    </fieldset>

                    <fieldset>
                        <label for="commentaires">Vos commentaires</label>
                        <textarea name="commentaires" id="commentaires"></textarea>
                    </fieldset>

                </div>
                <input type="submit" value="Envoyer" class="bt-panier">
            </form>
        </section>



    </main>
    <aside>
        <section>
            <h3>Publicité</h3>
            <img src="img/pub.jpg" alt="">
        </section>
        <nav>
            <ul>
                <li><a href="index.html">Accueil</a> </li>
                <li><a href="blog.html">Blog</a> </li>
                <li><a href="contact.html">Contact</a> </li>
            </ul>
        </nav>
    </aside>
</div>