<?php 
require('fonctions.php');
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

function readValeurRecette($cnx,$id_recette){
    $sql1 = "SELECT nom_recette,pseudo_utilisateur, temps_preparation, temps_cuisson, validation_admin, indice_cout, indice_difficulte FROM `recettes` LEFT JOIN utilisateurs ON recettes.id_utilisateur = utilisateurs.id_utilisateur LEFT JOIN couts ON recettes.id_cout = couts.id_cout LEFT JOIN difficultes ON recettes.id_difficulte = difficultes.id_difficulte WHERE id_recette = :id_recette";
    $valeurs = $cnx->prepare($sql1);
    $id = [':id_recette'=>$id_recette];
    $valeurs->execute($id);
    return $valeurs->fetchAll();
}
// var_dump(readValeurRecette($db,1));
// $bandeauGauche = readValeurRecette($db,1);
// echo htmlBandeau($bandeauGauche);

function readCategorieRecette($cnx,$id_recette){
    $sql2 = "SELECT indice_cat FROM `categories` LEFT JOIN recettes_categories ON recettes_categories.id_categorie = categories.id_categorie WHERE id_recette = :id_recette";
    $valeurs = $cnx->prepare($sql2);
    $id = [':id_recette'=>$id_recette];
    $valeurs->execute($id);
    return $valeurs->fetchAll();
}
var_dump(readCategorieRecette($db,1));

function readRegimeRecette($cnx,$id_recette){
    $sql3 = "SELECT nom_regime FROM `regimes` LEFT JOIN recettes_regimes ON recettes_regimes.id_regime = regimes.id_regime WHERE id_recette = :id_recette";
    $valeurs = $cnx->prepare($sql3);
    $id = [':id_recette'=>$id_recette];
    $valeurs->execute($id);
    return $valeurs->fetchAll();
}
var_dump (readRegimeRecette($db,1));

function readSaisonRecette($cnx,$id_recette){
    $sql4 = "SELECT nom_saison FROM `saisons` LEFT JOIN recettes_saisons ON recettes_saisons.id_saison = saisons.id_saison WHERE id_recette=:id_recette";
    $valeurs = $cnx->prepare($sql4);
    $id = [':id_recette'=>$id_recette];
    $valeurs->execute($id);
    return $valeurs->fetchAll();
}
var_dump (readSaisonRecette($db,1));

function readAvisRecette($cnx,$id_recette){
    $sql5 = "SELECT desc_avis, indice_note, pseudo_utilisateur FROM `avis` LEFT JOIN utilisateurs ON utilisateurs.id_utilisateur = avis.id_utilisateur WHERE id_recette=1";
    $valeurs = $cnx->prepare($sql5);
    $id = [':id_recette'=>$id_recette];
    $valeurs->execute($id);
    return $valeurs->fetchAll();
}
// var_dump (readAvisRecette($db,1));

function readPhotosRecette($cnx,$id_recette){
    $sql6 = "SELECT nom_photo FROM `photos` WHERE id_recette=1";
    $valeurs = $cnx->prepare($sql6);
    $id = [':id_recette'=>$id_recette];
    $valeurs->execute($id);
    return $valeurs->fetchAll();
}
// var_dump(readPhotosRecette($db,1));

function readIngredientsRecette($cnx,$id_recette){
    $sql7 = "SELECT nom_ingredient, photo_ingredients FROM `ingredients` LEFT JOIN recettes_ingredients ON recettes_ingredients.id_ingredients = ingredients.id_ingredients WHERE id_recette=1";
    $valeurs = $cnx->prepare($sql7);
    $id = [':id_recette'=>$id_recette];
    $valeurs->execute($id);
    return $valeurs->fetchAll();
}
// var_dump(readIngredientsRecette($db,1));

function readEtapesRecette($cnx,$id_recette){
    $sql8 = "SELECT desc_etape FROM `etapes` LEFT JOIN recettes_etapes ON etapes.id_etape = recettes_etapes.id_etape WHERE id_recette = 1";
    $valeurs = $cnx->prepare($sql8);
    $id = [':id_recette'=>$id_recette];
    $valeurs->execute($id);
    return $valeurs->fetchAll();
}
// var_dump(readEtapesRecette($db,1));