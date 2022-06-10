<?php 
session_start();
$titrePage = 'Proposition recette';
if ( !isset($_SESSION['connected'])) {
    header('location: index.php?interdit=true');
    exit();
}
require_once("banniere.php");
?>

  <form action="ajoutRecette.php" method="post" enctype="multipart/from-data">
    <div class="proTitre">
        <input type="text" name='nom_recette' laceholder="comment s'appelle votre recette? (Max 60 caractères)">
    </div>
    <div class="selections">
        <div class="selection">
            <h2>Type de plat :</h2>
            <div>
                <input type="checkbox" name="categorie[]" id="aperitif" value="1">
                    <label for="aperitif">Apéritif</label><br>
                <input type="checkbox" name="categorie[]" id="entree" value="2">
                    <label for="entree">Entrée</label><br>
                <input type="checkbox" name="categorie[]" id="plat" value="3">
                    <label for="plat">Plat</label><br>
                <input type="checkbox" name="categorie[]" id="dessert" value="4">
                    <label for="dessert">Dessert</label>
            </div>
        </div>
        <div class="selection">
            <h2>Saison du plat :</h2>
            <div>
                <input type="checkbox" name="saison[]" id="printemps" value="1">
                    <label for="printemps">Printemps</label><br>
                <input type="checkbox" name="saison[]" id="ete" value="2">
                    <label for="ete">Eté</label><br>
                <input type="checkbox" name="saison[]" id="automne" value="3">
                    <label for="automne">Automne</label><br>
                <input type="checkbox" name="saison[]" id="hiver" value="4">
                    <label for="hiver">Hiver</label>
            </div>
        </div>
            <div class="selection">
                <h2>Régime :</h2>
                <div>
                <input type="checkbox" name="regime[]" id="vegetarien" value="1">
                        <label for="vegetarien">Végétarien</label><br>
                    <input type="checkbox" name="regime[]" id="vegan" value="2">
                        <label for="vegan">Végan</label><br>
                    <input type="checkbox" name="regime[]" id="sansPorc" value="3">
                        <label for="sansPorc">Sans porc</label><br>
                    <input type="checkbox" name="regime[]" id="sansGluten" value="4">
                        <label for="sansGluten">Sans gluten</label>
                </div>
            </div>
    </div>
    <div class="selections">
        <select class="menuDeroulant" name="cout" id="bon">
            <option value="">--choisir un coût--</option>
            <option value="1">Bon Marché</option>
            <option value="2">Coût Moyen</option>
            <option value="3">Assez Cher</option>
        </select>
        <input class="selectionquantite" type="number" name="parts" id="personnePart" placeholder="Nombre de parts" min="1">
        
        <select class="menuDeroulant" name="difficulte" id="dificile">
            <option value="">--choisir un Facilité--</option>
            <option value="1">Facile</option>
            <option value="2">Moyen</option>
            <option value="3">Dificile</option>
        </select>
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
                <select class="menuDeroulant"  id="ingred">
                    <option value="">--choisir un ingredient--</option>
                    <option value="2">tomate</option>
                    <option value="334">huile d'olive</option>
                    <option value="34">mozarella</option>
                    <option value="4343">Basilic</option>
                </sele'ct>
                <input class="selectionquantite" type="number"  id="quantite" placeholder="Quantité d'ingredient" min="0" step="0.5">
                <button class="selectionAjouter" id='ajoutIngredient' name="ajoutIngredient">Ajouter</button>
            </div>
                <div class="ingredientAjout">
                    <div class="listeIngredient">
                        <dt>
                            <dd>3 tomates</dd>
                            <dd>20cl d'huile d'olive</dd>
                            <dd>200g de mozarella</dd>
                            <dd>Basilic</dd>
                        </dt>
                    </div>
                    <div class="ajoutNouvelIngredient">
                        <input class="selectionAjouter" type="text" name="nouvelIngredient"  placeholder="Nouvel ingrédient"/>
                        <button class="selectionAjouter" type="submit"  name="ajoutNouvelIngredient">Ajouter l'ingrédient</button>
                    </div>
                </div>
            </div>
    <div class="selectionAjouterEtape" class='etapes' >
        <textarea name="etapes[]" placeholder="Etape1: Rentrez vous instructions" rows="5" cols="180"></textarea>
        <textarea name="etapes[]" placeholder="Etape2: Rentrez vous instructions" rows="5" cols="180"></textarea>
        <div class="etapes" id='divetape'><div class="ajouter ajoutEtape"  id='ajouterEtape'>Ajouter une etape</div></div>
    </div>
    <div class="selectionAjouterEtape">
        <input id='ajoutPhoto' class="etapes" type="file" name="photoRecette"/>
    </div>
        
     <div class="validerRecette">
        <button class="selectionAjouter" type="submit" name="valider">Proposer la recette</button>
     </div>
</form>

<?php require_once("piedPage.php"); ?>
