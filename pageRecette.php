<?php 
session_start();
$titrePage = "Page recette";

require_once("banniere.php");
require_once('bdd.php');
require_once('fonctions.php');
$valeursTableRecette = readValeurRecette($db,$_GET['id']);
$categories = readCategorieRecette($db,$_GET['id']);
$regimes =  readRegimeRecette($db,$_GET['id']);
$saisons =  readSaisonRecette($db,$_GET['id']);
$photos = readPhotosRecette($db,$_GET['id']);
$ingredients = readIngredientsRecette($db,$_GET['id']);
$etapes = readEtapesRecette($db,$_GET['id']);
//var_dump($photos[0]['nom_photo']);
//var_dump($ingredients);
var_dump($etapes);
?>
    <div class="corpsPageRecette">
        <div class="bandeau">
            <?php echo htmlBandeau($valeursTableRecette)?>
            <div class="bandeauDroite">
                <div class="etoilesRecette">

                </div>
                <h3 class="avis">82 avis</h3>
            </div>
        </div>
        <?php echo htmlDescriptionRecette($categories, $regimes, $saisons, $valeursTableRecette)?>
        <div class="divPhoto">
            <img class="photoPrincipale" src="img/PhotoRecettes/<?php echo $photos[0]['nom_photo']?>" alt="Photo de<?php echo $photos[0]['nom_photo']?>">
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
            <?php foreach($ingredients as $ingredient) {?>
                <div class="cardIngredients">
                    <img src="img/PhotosIngredients/<?php echo $ingredient['photo_ingredient']?>" alt="Photo de <?php echo $ingredient['nom_ingredient']?>"/>
                    <p><?php echo $ingredient['Dosage'] .' '. $ingredient['nom_unite'] .' '. $ingredient['nom_ingredient']?></p>
                </div>
            <?php }?>
        </div>

        <?php foreach($etapes as $cpt=> $etape) {?>
            <div class='bandeau'>
                <h2>Etape <?php echo $cpt+1 ?> :</h2>
            </div>
            <p class="pEtapes">
            <?php echo $etape['desc_etape'] ?>
            </p><?php }?>
 
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
            <?php if(isset($_SESSION['connected'])){?>
                <div class="commentairesRecette ajoutCommentaire">
                    <h4>Pseudo</h4>
                    <form action="ajoutAvis.php" method="POST">
                        <input type='hidden' name='id_recette' value='<?php echo $_GET['id']?>'/>
                        <div>
                            <label for="note">Quelle note donnez vous?</label>
                            <input required type="number" name="note" min="0" max="5"/>
                        </div>
                        <textarea required name="avis" placeholder="votre commentaire ici"></textarea><br>
                        <input type="submit" class="buttonInscription centrer"/>
                    </form>
                </div>    
            <?php }?>
        </div>
    </div>
</body>
<?php require_once("piedPage.php");?>