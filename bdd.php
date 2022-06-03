<?php 
require_once('fonctions.php');
$db = new PDO('mysql:host=localhost;dbname=ma_petite_cuisine;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
));

function readInfosRecettesByCat($db, $cat, $idCat){
    switch ($cat){
        case 'saisons':
            $sqlinfoCard = "SELECT recettes.id_recette,nom_recette,nom_photo FROM recettes 
            LEFT JOIN photos ON recettes.id_recette = photos.id_recette 
            LEFT JOIN recettes_saisons ON recettes.id_recette = recettes_saisons.id_recette 
            LEFT JOIN saisons ON recettes_saisons.id_saison = saisons.id_saison 
            WHERE saisons.id_saison = $idCat;";
            break;
        case 'regimes':
            $sqlinfoCard = "SELECT recettes.id_recette,nom_recette,nom_photo FROM recettes
            LEFT JOIN photos ON recettes.id_recette = photos.id_recette
            LEFT JOIN recettes_regimes ON recettes.id_recette = recettes_regimes.id_recette 
            LEFT JOIN regimes ON recettes_regimes.id_regime = regimes.id_regime 
            WHERE regimes.id_regime = $idCat;";
            break;
        case 'categories':
            $sqlinfoCard = "SELECT recettes.id_recette,nom_recette,nom_photo FROM recettes
            LEFT JOIN photos ON recettes.id_recette = photos.id_recette 
            LEFT JOIN recettes_categories ON recettes.id_recette = recettes_categories.id_recette LEFT JOIN categories ON recettes_categories.id_categorie = categories.id_categorie 
            WHERE categories.id_categorie = $idCat;";
            break;
    }
    $recettes = $db->query($sqlinfoCard);
    return $recettes->fetchAll();
}
function readNotes($cnx, $idRecette){
    $sqlNotesRecette = "SELECT indice_note FROM avis WHERE id_recette = $idRecette "  ;
    $notesRecette = $cnx->query($sqlNotesRecette);
    return $notesRecette->fetchAll();
}

function readCategorie($cnx,$cat,$nom, $id){
    if (($cat=='saisons' && $nom == 'id_saison')||($cat=='regimes' && $nom == 'id_regime')  || ($cat=='categories' && $nom == 'id_categorie') ){
        $sql = "SELECT * FROM $cat WHERE $nom = :id";
        $categorie = $cnx->prepare($sql);
        $valeurs = [':id'=>$id];
        $categorie->execute($valeurs);
        return $categorie->fetch();
    }
    else 
        return header('location:index.php');
}
//  propositionRecette
function readplat($cnx, $nomTable){
    $sql = " SELECT * FROM $nomTable ";
    $platCategorie = $cnx->query($sql);
    return$platCategorie->fetchAll();
}
$couts = readplat($db, 'couts');
function readIngredient($cnx){
    $sql = " SELECT id_ingredients,nom_ingredient, id_unite FROM ingredients ";
    $ingredients = $cnx->query($sql);
    return$ingredients->fetchAll();
}

// function createRecette($cnx, $nomRecette, $tempsPreparation, $tempsCuisson, $validationAdmin, $datePublication, $idCout, $idDifficulte, $idUtilisateur){
//     $r = "INSERT INTO recette(nomRecette, tempsPreparation, tempsCuisson, validationAdmin, datePublication, idCout, idDifficulte, idUtilisateur) VALUES (:nomRecette, :tempsPreparation, :tempsCuisson, :validationAdmin, :datePublication, :idCout, :idDifficulte, :idUtilisateur)";
//     $req = $cnx->prepare($r);
//     $valeurs = [':nomRecette'=>$nomRecette, ':tempsPreparation'=>$tempsPreparation, ':tempsCuisson'=>$tempsCuisson, ':validationAdmin'=>$validationAdmin, ':datePublication'=>$datePublication, ':idCout'=>$idCout, ':idDifficulte'=>$idDifficulte, ':idUtilisateur'=>$idUtilisateur];
//     return $req->execute($valeurs);
// }
