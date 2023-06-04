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

                    <label for="pseudo"> Votre pseudo*</label>
                    <input type="text" name="pseudo" id="pseudo" placeholder="Votre pseudo?"  autofocus>

                    <label for="email"> Votre email*</label>
                    <input type="text" name="email" id="email"  >

                    <label for="age"> Votre âge?*</label>
                    <input type="number" name="age" id="age">

                    <label for="date">Date d'entrée?*</label>
                    <input type="date" name="date" id="date">

                    <label for="photo">Votre photo de profil*</label>
                    <input type="file" name="photo" id="photo">

                    <label for="tel">Votre numéro de téléphone</label>
                    <input type="tel" name="tel" id="tel">

                    <label for="departement">Votre département</label>
                    <input type="text" name="departement" id="departement" maxlength="5">
                </fieldset>

                <fieldset>
                    <legend>Mes passions</legend>
                    <p>Etes vous plûtot:</p>
                    <label for="scientifique">Scientifique</label>
                    <input type="checkbox" name="scientifique" id="scientifique" value="scientifique">
                    <label for="artistique">Artistique</label>
                    <input type="checkbox" name="artistique" id="artistique" value="artistique">

                    <label for="pays">Votre pays préféré:</label>
                    <select id="pays" name="pays">
                        <option value="">Votre choix?</option>
                        <option value="France">France</option>
                        <option value="Italie">Italie</option>
                        <option value="Grèce">Grèce</option>
                    </select>

                    <p>Votre niveau?</p>
                    <label for="bon">Bon</label>
                    <input type="radio" name="niveau" id="bon" value="bon">

                    <label for="moyen">Moyen</label>
                    <input type="radio" name="niveau" id="moyen" value="moyen">

                    <label for="debutant">Débutant</label>
                    <input type="radio" name="niveau" id="debutant" value="debutant">

                    <label for="site_web">votre site Web</label>
                    <input type="url" name="site_web" id="site_web">

                    <label for="commentaires">Vos commentaires</label>
                    <textarea name="commentaires"  id="commentaires"></textarea>
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
