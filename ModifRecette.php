<?php 
session_start();
$titrePage = 'Validation Recette';
require_once('bdd.php');
require_once("banniere.php");
require_once('fonctions.php');
$donnees = readAllInfoRecetteById($db, $_GET['id']);
$infosUniques = $donnees['infosUniques'][0];
$catsSelected = getIdsPourModif($donnees, 'categories', 'id_categorie');
$saisonsSelected = getIdsPourModif($donnees, 'saisons', 'id_saison');
$regimesSelected = getIdsPourModif($donnees, 'regimes', 'id_regime');
$etapesSelected = getIdsPourModif($donnees, 'etapes', 'desc_etape');
$photoSelected = getIdsPourModif($donnees, 'photos', 'nom_photo');
$ingredientsSelected = $donnees['ingredients'];
$saisons = readplat($db, 'saisons');
$categories = readplat($db, 'categories');
$regimes = readplat($db, 'regimes');
$couts = readplat($db, 'couts');
$difficultes = readplat($db, 'difficultes');
$ingredients = readIngredient($db);
?>
<body>
    <form action="updateRecette.php" method="post" enctype="multipart/form-data">
        <input type='hidden' name='id_recette' value='<?php echo $_GET['id']?>' />
    <div class="proTitre">
        <input required type="text" name='nom_recette' placeholder="Comment s'appelle votre recette? (Max 60 caractères)" value="<?php echo $infosUniques['nom_recette']?>"/>
    </div>
    <div class="selections">
        <div class="selection">
            <h2>Type de plat :</h2>
            <?php echo htmlCheckBox($categories,'id_categorie','nom_categorie', $catsSelected );?>
        </div>
        <div class="selection">
            <h2>Saison du plat :</h2>
            <?php echo htmlCheckBox($saisons,'id_saison','nom_saison', $saisonsSelected);?>
        </div>
            <div class="selection">
                <h2>Régime :</h2>
                <?php echo htmlCheckBox($regimes,'id_regime','nom_regime', $regimesSelected);?>
            </div>
    </div>
    <div class="selections">
        <?php echo htmlMenuRoulant($couts,'id_cout','nom_cout', 'couts', $infosUniques['id_cout']);?>
        <input class="selectionquantite" type="number" name="parts" id="personnePart" placeholder="Nombre de parts" min="1" value=''>
        <?php echo htmlMenuRoulant($difficultes,'id_difficulte','nom_difficulte', 'difficultes', $infosUniques['id_cout']);?>
    </div>
    <div class="selections">
        <div class="tempsbuton">
            <label class="selectionTemps" for="tempsPreparation">--Temps de Préparation:</label>
            <input type="time" id="tempsPreparation" name="tempsPrep" min="00:05" max="04:00" value='<?php echo $infosUniques['temps_preparation']?>' required>
        </div>
        <div class="tempsbuton">
            <label class="selectionTemps" for="tempscuisson">--Temps de Cuisson:</label>
            <input type="time" id="tempscuisson" name="tempsCui" min="00:05" max="05:00" value='<?php echo $infosUniques['temps_cuisson']?>' required>
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
                    <?php foreach($ingredientsSelected as $ingredient){?>
                        <dd class='infoIngredient'>
                        <input type='hidden' name="ingredients['id'][]" value='<?php echo $ingredient['id_ingredient'] ?>' />
                        <input type='hidden' name="ingredients['quantite'][]" value='<?php echo $ingredient['nom_ingredient'] ?>' />
                        <?php echo $ingredient['Dosage'].' '. $ingredient['nom_ingredient'] ?>
                        <button  class="selectionAjouter supp">Supprimer</button>
                        </dd>
                    <?php }?>
                </dt>
            </div>
            <div class="ajoutNouvelIngredient">
                <input class="selectionAjouter" type="text" name="nouvelIngredient"  placeholder="Nouvel ingrédient"/>
                <button class="selectionAjouter" name="ajoutNouvelIngredient">Ajouter l'ingrédient</button>
            </div>
        </div>
    </div>
    <div class="selectionAjouterEtape" class='etapes' >
        <?php foreach($etapesSelected as $etape){?>
            <textarea name="etapes[]" placeholder="Etape1: Rentrez vous instructions" rows="5" cols="180"><?php echo $etape?></textarea>            
        <?php }?>    
        <div class="etapes" id='divetape'><div class="ajouter ajoutEtape"  id='ajouterEtape'>Ajouter une etape</div></div>
    </div>                       
    <div class="selectionAjouterEtape">
        <input type="file" id='ajoutPhoto' class="etapes"  name="photoRecette" value='<?php echo $donnees['photos'][0]['nom_photo']?>'>
    </div>
        
     <div class="validerRecette">
        <button class="selectionAjouter" type="submit" name="valider">Valider la recette</button>
        
     </div>
</form>
<form action="deleteRecette.php" method="post">
    <input type='hidden' name='id_recette' value='<?php echo $_GET['id']?>' />
    <div class="validerRecette">
        <button class="selectionAjouter" type="submit" name="Supprimer">Supprimer la recette</button>
    </div>
</form>
</body>





<?php require_once("piedPage.php"); ?>