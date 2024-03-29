<?php 
session_start();
$titrePage = 'Proposition recette';
if ( !isset($_SESSION['connected'])) {
    header('location: index.php?interdit=true');
    exit();
}
require_once("banniere.php");
require_once('bdd.php');
require_once('fonctions.php');
$saisons = readplat($db, 'saisons');
$categories = readplat($db, 'categories');
$regimes = readplat($db, 'regimes');
$couts = readplat($db, 'couts');
$difficultes = readplat($db, 'difficultes');
$ingredients = readIngredient($db);
 ?>

  <form action="ajoutRecette.php" method="post" enctype="multipart/form-data">
    <div class="proTitre">
        <input required type="text" name='nom_recette' placeholder="Comment s'appelle votre recette? (Max 60 caractères)"/>
    </div>
    <div class="selections">
        <div class="selection">
            <h2>Type de plat :</h2>

           
            <?php echo htmlCheckBox($categories,'id_categorie','nom_categorie');?>
           
        </div>
        <div class="selection">
            <h2>Saison du plat :</h2>
            <?php echo htmlCheckBox($saisons,'id_saison','nom_saison');?>
        </div>
            <div class="selection">
                <h2>Régime :</h2>
                <?php echo htmlCheckBox($regimes,'id_regime','nom_regime');?>
            </div>
    </div>
    <div class="selections">
        <?php echo htmlMenuRoulant($couts,'id_cout','nom_cout', 'couts');?>
        <input class="selectionquantite" type="number" name="parts" id="personnePart" placeholder="Nombre de parts" min="1">
        <?php echo htmlMenuRoulant($difficultes,'id_difficulte','nom_difficulte', 'difficultes');?>
    </div>
    <div class="selections">
        <div class="tempsbuton">
            <label class="selectionTemps" for="tempsPreparation">--Temps de Préparation:</label>
            <input type="time" id="tempsPreparation" name="tempsPrep" min="00:05" max="04:00" required>
        </div>
        <div class="tempsbuton">
            <label class="selectionTemps" for="tempscuisson">--Temps de Cuisson:</label>
            <input type="time" id="tempscuisson" name="tempsCui" min="00:05" max="05:00" required>
        </div>
    </div>
    
        <div class="selectionIngredient">
            <div class="ajoutingredient">

            <?php echo htmlMenuRoulant($ingredients,'id_ingredient','nom_ingredient', 'ingredients');?>
            <input class="selectionquantite" type="number" name="quantite" id="quantite" placeholder="Quantité d'ingredient" min="0" step="0.5">
            
    
            
                <button class="selectionAjouter"  id="ajoutIngredient">Ajouter</button>

            </div>
             <div class="ingredientAjout">
                    <div class="listeIngredient">
                        <dt>
                           
                        </dt>
                    </div>
                    <div class="ajoutNouvelIngredient">
                        <input class="selectionAjouter" type="text" name="nouvelIngredient"  placeholder="Nouvel ingrédient"/>
                        <button class="selectionAjouter" name="ajoutNouvelIngredient">Ajouter l'ingrédient</button>
                    </div>
             </div>
        </div>

    <div class="selectionAjouterEtape" class='etapes' >
        <textarea name="etapes[]" placeholder="Etape1: Rentrez vous instructions" rows="5" cols="180"></textarea>
        <textarea name="etapes[]" placeholder="Etape2: Rentrez vous instructions" rows="5" cols="180"></textarea>
        <div class="etapes" id='divetape'><div class="ajouter ajoutEtape"  id='ajouterEtape'>Ajouter une etape</div></div>

    </div>
    <div class="selectionAjouterEtape">
        <input type="file" id='ajoutPhoto' class="etapes"  name="photoRecette">
    </div>
        
     <div class="validerRecette">
        <button class="selectionAjouter" type="submit" name="valider">Proposer la recette</button>
     </div>
</form>

<?php require_once("piedPage.php"); ?>
