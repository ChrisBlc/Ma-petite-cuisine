<?php 
session_start();
$titrePage = 'Ma petite Cuisine';
require_once("bdd.php");
require_once("fonctions.php");
require_once("banniere.php");
if (isset($_GET['wrongmdp'])){
    echo "<script>alert('Mot de Passe ou Mail incorrect')</script>";
}
if (isset($_GET['interdit'])){
    echo "<script>alert('Cette page est reservé aux personnes identifiés')</script>";
}
if (isset($_GET['cat'])){
    $cat = $_GET['cat'];
    $id = $_GET['id'];
    switch($cat){
        case 'saisons':
            $nom = 'nom_saison';
            $nomId = 'id_saison';
            break;
        case 'regimes':
            $nom = 'nom_regime';
            $nomId = 'id_regime';
            break;
        case 'categories':
            $nom = 'nom_categorie';
            $nomId = 'id_categorie';
            break;
    }
    $categorie = readCategorie($db, $cat, $nomId, $id);
    $recettes = readInfosRecettesByCat($db, $cat ,$id);
    $htmlTitre = "<h2>".ucfirst(substr($cat,0,-1)).": ".$categorie[$nom]. "</h2>";
}
else if(isset($_GET['recherche'])){
    $recettes = readRecettesBySearch($db, $_GET['recherche']);
    $htmlTitre = "<h2> Votre recherche: ".$_GET['recherche']. "</h2>";
}
else{
    $id = choixSaison();
    $cat = 'saisons';
    $recettes = readInfosRecettesByCat($db, $cat ,$id);
    $htmlTitre = "<h2>Tendance cette Saison</h2>";
    $recetteJour = readInfoRecettesJour($db);
?>
    <div class="platDuJour">
        <a href="pageRecette.php?id=<?php echo $recetteJour['id_recette'] ?>">
        <img src="img/PhotoRecettes/<?php echo $recetteJour['nom_photo'] ?>" alt="Photo de <?php echo $recetteJour['nom_photo'] ?>">
        <div class="label">Recette au hasard: <?php echo $recetteJour['nom_recette'] ?> </div>
        <a>
    </div>
    
<?php  }?>
    <section>
    <?php echo $htmlTitre;?>
        <div class="recetteContainer">
      
            <?php
            if ($recettes == null){
                echo "<h2> Pas de recette correspondant a votre recherche </h2>";
            } 
            else {
                foreach( $recettes as $k => $recette){ 
                    $nomRecette = $recette['nom_recette'];
                    $idRecette = $recette['id_recette'];
                    $photoRecette = $recette['nom_photo'];
                    $notesRecette = readNotes($db, $idRecette);
                    $nombreAvis = count($notesRecette);
                    $moyenneRecette = moyenneNote($notesRecette);
                ?>
                <div class="recetteCard">
                    <a href="pageRecette.php?id=<?=$idRecette?>"> 
                        <img src="Img/PhotoRecettes/<?php echo $photoRecette?>" alt="<?=$nomRecette?>">
                        <div class="recetteTitle"><?=$nomRecette?></div>
                    </a>  
                    <div class="recetteAvis">
                        <div class="etoiles <?php echo choixClasseEtoiles($moyenneRecette) ?>">
                        </div>
                        
                        <a href="pageRecette.php?id=<?=$idRecette?>#Avis"><?= $nombreAvis?> Avis</a>   
                    </div>
                </div>  
                <?php }
            }?>

             <div class="recetteCard ajout">
                <a class="ajouter"  href="propositionRecette.php">Ajouter une recette</a>
            </div>
        </div>
    </section>
<?php require_once("piedPage.php"); ?>