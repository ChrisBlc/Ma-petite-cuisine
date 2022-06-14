<?php 
session_start();
if(!isset($_GET['id'])){
    header('location:index.php');
}
$titrePage = "Page recette";
require_once("banniere.php");
require_once('bdd.php');
require_once('fonctions.php');
$valeursTableRecette = readValeurRecette($db,$_GET['id']);
$categories = readCategorieRecette($db,$_GET['id']);
$regimes =  readRegimeRecette($db,$_GET['id']);
$saisons =  readSaisonRecette($db,$_GET['id']);
$avis= readAvisRecette($db,$_GET['id']);
$photos = readPhotosRecette($db,$_GET['id']);
$ingredients = readIngredientsRecette($db,$_GET['id']);
$etapes = readEtapesRecette($db,$_GET['id']);
$notesRecette = readNotes($db, $_GET['id']);
$nbAvis = count($notesRecette);
$moyenneRecette = moyenneNote($notesRecette);
?>
    <div class="corpsPageRecette">
        <div class="bandeau">
        <div class='bandeauGauche'>
            <h2 class='section'><?php echo $valeursTableRecette[0]['nom_recette']?></h2>  
        </div>
        <div class="bandeauDroite">
                <h3 class='username'>Par <?php echo $valeursTableRecette[0]['pseudo_utilisateur']?> &nbsp</h3>
                <div  id="etoilesBandeau" class="etoilesRecette etoiles <?php echo choixClasseEtoiles($moyenneRecette) ?>"></div>
                <h3 class="avis"> <?php echo $nbAvis ?> avis </h3>
        </div>  
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
                <button class="plusEtMoins" id='moins'> - </button> <span id='nbParts'></span>  <button class="plusEtMoins"  id='plus'> + </button>
            </div>
            <button class="ajouterListe">Ajouter à ma liste</button>
        </div>
        <div class="listIngredients">
            <ul>
                <?php foreach($ingredients as $ingredient) {?>
                        <div class="cardIngredients">
                            <li>
                                <img src="img/PhotosIngredients/<?php echo $ingredient['photo_ingredient']?>" alt="Photo de <?php echo $ingredient['nom_ingredient']?>"/>
                                <p > <span class='qtt'><?php echo 4 * (arrondi((floatval(str_replace(',','.', $ingredient['Dosage']))), 0.5))?> </span> <?php echo $ingredient['nom_unite'] .' '. $ingredient['nom_ingredient']?></p>
                            </li>
                        </div>
                <?php }?>
            </ul>
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
            <?php foreach($avis as $commentaire){ ?>
              <div class="commentairesRecette">
                <div class="user">
                    <h4><?php echo $commentaire['pseudo_utilisateur'] ?></h4>
                    <div class="etoiles <?php echo choixClasseEtoiles($commentaire['indice_note']) ?>"></div>
                </div>
                <p class="commentaire"><?php echo $commentaire['desc_avis'] ?></p>
            </div>
            <?php }?>
            <?php if(isset($_SESSION['connected'])){?>
                <div class="commentairesRecette ajoutCommentaire">
                    <h4><?php echo $_SESSION['pseudo'] ?></h4>
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