<?php 
session_start();
if ( !isset($_SESSION['connected'])) {
    header('location: index.php?interdit=true');
    exit();
};
$titrePage = 'Gestion';
require_once("banniere.php");
require_once('fonctions.php');
require_once('bdd.php');

$recettesUser = readRecettesByUser($db, 2);
$aValider = readRecetteAValider($db);
$allRecette = readAllTitle($db);
?>

<div class="gestionContainer">
    <h2> Mes recettes </h2>
        <?php echo afficherRecetteGestion($recettesUser) ?>
    <h2> Recettes à valider </h2>
        <?php echo afficherRecetteGestion($aValider) ?>
    <h2> Toutes les Recettes </h2>
        <?php echo afficherRecetteGestion($allRecette) ?>
</div>















<?php require_once("piedPage.php"); ?>