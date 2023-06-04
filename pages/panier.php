<div class="gabarit" id="contenu">
    <main>
        <section id="panier">
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Produit</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Sous total</th>
                        <th></th>
                    </tr>
                </thead>

            </table>
        </section>
        <section id="commande" >
            <h3>Coordonnées de livraison</h3>
            <form name="form-commande" id="form-commande">
                <label for="firstName">Prénom*</label>
                <input type="text" name="firstName" id="firstName" required>

                <label for="lastName">Nom*</label>
                <input type="text" name="lastName" id="lastName" required>

                <label for="email">Email*</label>
                <input type="email" name="email" id="email" required>

                <label for="adress">Adresse*</label>
                <input type="text" name="adress" id="adress" required>

                <label for="city">Ville*</label>
                <input type="text" name="city" id="city" required>

                <label for="tel">Téléphone*</label>
                <input type="text" name="tel" id="tel" required>

                <input type="submit" value="Commander" class="bt-panier">
            </form>


        </section>
    </main>

</div>
