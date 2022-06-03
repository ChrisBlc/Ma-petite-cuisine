<?php 

$titrePage = "Page recette";

require_once("banniere.php");
?>
    <div class="corpsPageRecette">
        <div class="bandeau">
            <div class="bandeauGauche">
                <h2 class="section">Bo Bun &nbsp</h2>
                <h3 class="username">Par nom d'utilisateur</h3>
            </div>
            <div class="bandeauDroite">
                <div class="etoilesRecette">

                </div>
                <h3 class="avis">82 avis</h3>
            </div>
        </div>
        <h3 class="h3Bandeau">35 minutes  |  Facile  |  Sans porc |  Bon marché |  Toutes saisons </h3>
        <div class="divPhoto">
            <img class="photoPrincipale" src="img/PhotoRecettes/bobun.jpeg" alt="Photo de Bo bun">
        </div>
        <div class="bandeau">
            <h2>Ingrédients</h2>
        </div>
        <div class="buttons">
            <div>
                <button class="plusEtMoins"> - </button> 4 personnes <button class="plusEtMoins"> + </button>
            </div>
            <button class="ajouterListe">Ajouter à ma liste</button>
        </div>
        <div class="listIngredients">
            <div class="cardIngredients">
                <img src="img/PhotosIngredients/Boeuf.jpeg" alt="700g de boeuf tendre"/>
                <p>700g de boeuf tendre</p>
            </div>
            <div class="cardIngredients">
                <img src="img/PhotosIngredients/Curry.jpg" alt="1 CS de curry doux"/>
                <p>1 CS de curry doux</p>
            </div>
            <div class="cardIngredients">
                <img src="img/PhotosIngredients/Ail.jpg" alt="1 gousse d'ail"/>
                <p>1 gousse d'ail</p>
            </div>
            <div class="cardIngredients">
                <img src="img/PhotosIngredients/Sauce_huitre.jpeg" alt="3 CS de sauce d'huitre"/>
                <p>3 CS de sauce d'huitre</p>
            </div>
            <div class="cardIngredients">
                <img src="img/PhotosIngredients/Poivre.jpg" alt="Poivre"/>
                <p>Poivre</p>
            </div>
            <div class="cardIngredients">
                <img src="img/PhotosIngredients/Sel.jpg" alt="Sel"/>
                <p>Sel</p>
            </div>
            <div class="cardIngredients">
                <img src="img/PhotosIngredients/Coriandre.jpg" alt="Coriandre"/>
                <p>Coriandre</p>
            </div>
            <div class="cardIngredients">
                <img src="img/PhotosIngredients/Batavia.jpeg" alt="Batavia"/>
                <p>Batavia</p>
            </div>
            <div class="cardIngredients">
                <img src="img/PhotosIngredients/Menthe.jpeg" alt="Menthe"/>
                <p>Menthe</p>
            </div>
            <div class="cardIngredients">
                <img src="img/PhotosIngredients/Soja.jpeg" alt="300g de soja frais"/>
                <p>300g de soja frais</p>
            </div>
            <div class="cardIngredients">
                <img src="img/PhotosIngredients/Arachide.jpeg" alt="Arachide"/>
                <p>Arachide</p>
            </div>
        </div>
        <div class='bandeau'>
            <h2>Etape 1 :</h2>
        </div>
        <p class="pEtapes">Cisailler la viande en tranches très fines, et faire mariner au frigo avec le curry, ail,
             glutamate et les sauces, au moins 30 minutes.</p>
        <div class='bandeau'>
            <h2>Etape 2 :</h2>
        </div>
        <p class="pEtapes">Pendant ce temps préparer la sauce, si vous cuisinez souvent asiatique, doubler les proportions et conservez-là dans un bocal. Vous pouvez ajouter une pointe de piment (sauce chili) pour la parfumer. Faire bouillir tous les ingrédients et réserver.</p>
        <div class='bandeau'>
            <h2>Etape 3 :</h2>
        </div>
        <p class="pEtapes">Pour les vermicelles, faire bouillir une bonne casserole d'eau. Y plonger les vermicelles 3 à 4 mn. Egoutter et les ranger par poignée.</p>
        <div class='bandeau'>
            <h2>Etape 4 :</h2>
        </div>
        <p class="pEtapes">Faire revenir la viande dans un peu d'huile, à feu très fort et très brièvement : la viande doit être saisie simplement, pour la garder tendre.</p>
        <div class='bandeau'>
            <h2>Etape 5 :</h2>
        </div>
        <p class="pEtapes">Servir dans des grand bols de préférence : commencer par la batavia, le soja, puis 3 ou 4 poignées de vermicelles par personnes, 2 nems coupés petits morceaux par personne, la viande. Décorer avec la coriandre hachée, la menthe et quelques cacahuètes concassées (facultatif). Arroser de sauce et c'est prêt !</p>
        <button id="exporter" class="buttonInscription centrer">Exporter en PDF</button>
        <div class="blockCommentaires">
            <div class="bandeauRouge">
               <h2>Commentaires :</h2>
            </div>
            <div class="commentairesRecette">
                <div class="user">
                    <h4>Alexandre 321</h4>
                    <div class="etoiles"></div>
                </div>
                <p class="commentaire">Très bonne recette, merci !</p>
            </div>
            <div class="commentairesRecette ajoutCommentaire">
                <h4>Pseudo</h4>
                <form action="" method="POST">
                    <div>
                        <label for="note">Quelle note donnez vous?</label>
                    <input required type="number" name="note" min="0" max="5"/></div>
                    <textarea required name="avis" placeholder="votre commentaire ici"></textarea><br>
                    <input type="submit" class="buttonInscription centrer"/>
                </form>
            </div>    
        </div>
    </div>
</body>
<?php require_once("piedPage.php");?>