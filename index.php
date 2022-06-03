<?php 
$titrePage = 'Ma petite Cuisine';
require_once("bdd.php");
require_once("fonctions.php");
require_once("banniere.php");
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
else if(isset($_GET['search'])){
    /* METTRE FONCTION RECHERCHE */
}
else{
    $id = choixSaison();
    $cat = 'saisons';
    $recettes = readInfosRecettesByCat($db, $cat ,$id);
    $htmlTitre = "<h2>Tendance cette Saison</h2>";
?>
    <div class="platDuJour">
        <a href="#">
        <img src="img/PhotoRecettes/Pates_au_pesto_de_coriandre.jpg" alt="Photo de pate au pesto de coriandre">
        <div class="label">Recettes du jour: Pates au pesto de coriandre </div>
        <a>
    </div>
    
<?php  }?>
    <section>
        <?php echo $htmlTitre;?>
        <div class="recetteContainer">
            <?php
           
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
             <?php }?>
             <div class="recetteCard ajout">
                <a class="ajouter"  href="#">Ajouter une recette</a>
            </div>
        </div>
    </section>
<?php require_once("piedPage.php"); ?>