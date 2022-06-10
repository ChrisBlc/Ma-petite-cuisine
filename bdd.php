<?php 

require_once('fonctions.php');

$db = new PDO('mysql:host=localhost;dbname=ma_petite_cuisine;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
));
/*=================================LECTURE=======================================================================*/
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


function readRecettesByUser($cnx, $idUser){
    $r = "SELECT id_recette, nom_recette FROM recettes WHERE id_utilisateur = :idUser";
    $recettes = $cnx->prepare($r);
    $recettes->execute([':idUser' => $idUser]);
    return $recettes->fetchAll();
}

function readRecetteAValider($cnx){
    $r = "SELECT id_recette, nom_recette FROM recettes WHERE validation_admin = 0";
    $valider = $cnx->query($r);
    return $valider->fetchAll();
}

function readMdpIDAdmin($cnx){
    $r = "SELECT id_utilisateur,mail_utilisateur,mdp_utilisateur,admin FROM `utilisateurs`";
    $infoUser = $cnx->query($r);
    return $infoUser->fetchAll();
}
function readInfosMultiplesById($cnx,array $nomsInfos, $tableInfo, $idRecette){
    $nomsInfos = implode(',',$nomsInfos);
    $r = "SELECT $nomsInfos FROM $tableInfo WHERE id_recette = :idRecette";
    $infosMulti = $cnx->prepare($r);
    $infosMulti->execute([':idRecette' => $idRecette]);
    return $infosMulti->fetchAll();
}
function readAllInfoRecetteById($cnx, $idRecette){
    $r = "SELECT * FROM recettes WHERE id_recette = :idRecette";
    $recettes = $cnx->prepare($r);
    $recettes->execute([':idRecette' => $idRecette]);
    $allinfos['infosUniques'] = $recettes->fetchAll();
    $allinfos['categories'] = readInfosMultiplesById($cnx,['id_categorie'],'recettes_categories', $idRecette);
    $allinfos['saisons'] = readInfosMultiplesById($cnx,['id_saison'],'recettes_saisons', $idRecette);
    $allinfos['regimes'] = readInfosMultiplesById($cnx,['id_regime'],'recettes_regimes', $idRecette);
    $allinfos['etapes'] = readInfosMultiplesById($cnx,['desc_etape'],'etapes', $idRecette);
    $allinfos['photos'] = readInfosMultiplesById($cnx,['nom_photo'],'photos', $idRecette);
    return $allinfos;
}













/*=================================AJOUT=======================================================================*/
function createRecette($cnx, $donnees , $idUser){
    if (in_array('2', $donnees['regime'])){
        $donnees['regime'][] = 3;
        $donnees['regime'][] = 1;
    }
    if (in_array('1', $donnees['regime'])){
        $donnees['regimes'][] = 3;
    }
    

    $r = "INSERT INTO recettes(nom_recette, temps_preparation, temps_cuisson, validation_admin, date_publication, id_cout, id_difficulte, id_utilisateur)  VALUES (:nom_recette,:tempsPrep,:tempsCui, 0,".date("Y-m-d").",:cout, :difficulte, :idUser)";
    $req= $cnx->prepare($r);
    $valeurTableRecette = [
        ':nom_recette' => $donnees['nom_recette'],
        ':tempsPrep' => $donnees['tempsPrep'],
        ':tempsCui' => $donnees['tempsCui'],
        ':cout' => $donnees['cout'],
        ':difficulte' => $donnees['difficulte'],
        ':idUser' => $idUser
    ];
    $req->execute($valeurTableRecette);
    /* Ajout dans les tables de liaisons*/
    $idRecette = $cnx->lastInsertId();
    for($i=0; $i < count($donnees['ingredients']); $i++ ){
        $r = "INSERT INTO recettes_ingredients VALUES (:idRecette,:id_ingredient, :Dosage )";
        $req = $cnx->prepare($r);
        $ingredients = [
            ':idRecette' => $idRecette,
            ':id_ingredient' => $donnees['ingredients']['id'][$i],
            ':Dosage' => ($donnees['ingredients']['quantite'][$i])/$donnees['parts']
        ];
        $req->execute($ingredients);
    }
    for($i=0; $i < count($donnees['categorie']); $i++ ){
        $r = "INSERT INTO recettes_categories VALUES (:idRecette,:id_categorie)";
        $req = $cnx->prepare($r);
        $categories = [
            ':idRecette' => $idRecette,
            ':id_categorie' => $donnees['categorie'][$i]
        ];
        $req->execute($categories);
    }
    for($i=0; $i < count($donnees['saison']); $i++ ){
        $r = "INSERT INTO recettes_saisons VALUES (:idRecette,:id_saison)";
        $req = $cnx->prepare($r);
        $categories = [
            ':idRecette' => $idRecette,
            ':id_saison' => $donnees['saison'][$i]
        ];
        $req->execute($categories);
    }
    for($i=0; $i < count($donnees['regime']); $i++ ){
        $r = "INSERT INTO recettes_regimes VALUES (:idRecette,:id_regime)";
        $req = $cnx->prepare($r);
        $categories = [
            ':idRecette' => $idRecette,
            ':id_regime' => $donnees['regime'][$i]
        ];
        $req->execute($categories);
    }
    /*ajout des étapes*/
    foreach ($donnees['etapes'] as $etape){
        $r = "INSERT INTO etapes(desc_etape , id_recette) VALUES (:desc_etape, :idRecette)";
        $req = $cnx->prepare($r);
        $etapes = [
            ':desc_etape' => $etape,
            ':idRecette' => $idRecette
        ];
        $req->execute($etapes);
    }
    /* ajout photo */
    foreach ($donnees['photoRecette'] as $photo){
        $r = "INSERT INTO photos(nom_photo , id_recette) VALUES (:nom_photo, :idRecette)";
        $req = $cnx->prepare($r);
        $photos = [
            ':nom_photo' => $photo,
            ':idRecette' => $idRecette
        ];
        $req->execute($photos);
    }
}


