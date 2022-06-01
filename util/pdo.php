<?php 

$db = new PDO('mysql:host=localhost;dbname=ma_petite_cuisine;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
));

$sqlinfoCard = "SELECT recettes.id_recette,nom_recette,nom_photo FROM recettes LEFT JOIN photos ON recettes.id_recette = photos.id_recette "  ;
$recettes = $db->query($sqlinfoCard);
$recettes = $recettes->fetchAll();
?>
<link rel="stylesheet" href="../style.css">
<div class="recetteContainer">
    <?php
    foreach( $recettes as $k => $recette){ 
        $nomRecette = $recette['nom_recette'];
        $idRecette = $recette['id_recette'];
        $photoRecette = $recette['nom_photo'];
        $sqlNotesRecette = "SELECT indice_note FROM avis WHERE id_recette = $idRecette "  ;
        $notesRecette = $db->query($sqlNotesRecette);
        $notesRecette = $notesRecette->fetchAll();
        $nombreAvis = count($notesRecette);
        $moyenneRecette = moyenneNote($notesRecette);
    ?>

    <div class="recetteCard">
        <a href="pageRecette.php?id=<?=$idRecette?>"> 
            <img src="../Img/PhotoRecettes/<?php echo $photoRecette?>" alt="<?=$nomRecette?>">
            <div class="recetteTitle"><?=$nomRecette?></div>
        </a>  
        <div class="recetteAvis">
            <div class="etoiles <?php echo choixClasseEtoiles($moyenneRecette) ?>">
            </div>
            
            <a href="#"><?= $nombreAvis?> Avis</a>   
        </div>
    </div>  
    <?php }?>
</div>

 <?php 
  require_once('../piedPage.php');
?>


<?php
 function moyenneNote($tableau){
     $somme = 0;
     $cpt = 0;
     foreach($tableau as $k => $value){
        $somme += $value['indice_note'];
        $cpt ++;
     }
     if( $cpt == 0){
         $cpt = 1;
     }
     $moyenne = $somme/$cpt;
     return $moyenne;
 }

 function choixClasseEtoiles($moyenne){
     $moyenne = round($moyenne);
     switch ($moyenne){
        case 0:
            return 'zero';
            break;
        case 1:
            return 'une';
            break;
        case 2:
            return 'deux';
            break;
        case 3:
            return 'trois';
            break;
        case 4:
            return 'quatre';
            break;
     }

 }