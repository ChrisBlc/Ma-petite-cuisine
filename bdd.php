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
            WHERE saisons.id_saison = $idCat
            AND validation_admin = 1;";
            break;
        case 'regimes':
            $sqlinfoCard = "SELECT recettes.id_recette,nom_recette,nom_photo FROM recettes
            LEFT JOIN photos ON recettes.id_recette = photos.id_recette
            LEFT JOIN recettes_regimes ON recettes.id_recette = recettes_regimes.id_recette 
            LEFT JOIN regimes ON recettes_regimes.id_regime = regimes.id_regime 
            WHERE regimes.id_regime = $idCat
            AND validation_admin = 1;";
            break;
        case 'categories':
            $sqlinfoCard = "SELECT recettes.id_recette,nom_recette,nom_photo FROM recettes
            LEFT JOIN photos ON recettes.id_recette = photos.id_recette 
            LEFT JOIN recettes_categories ON recettes.id_recette = recettes_categories.id_recette LEFT JOIN categories ON recettes_categories.id_categorie = categories.id_categorie 
            WHERE categories.id_categorie = $idCat
            AND validation_admin = 1;";
            break;
    }
    $recettes = $db->query($sqlinfoCard);
    return $recettes->fetchAll();
}

function readInfoRecettesJour($cnx){
    $r = "SELECT recettes.id_recette, nom_recette, nom_photo FROM recettes 
    LEFT JOIN photos on recettes.id_recette = photos.id_recette
    WHERE validation_admin = 1;
    ORDER BY RAND() LIMIT 1";
    $titres = $cnx->query($r);
    return $titres->fetch();
}

function readRecettesBySearch($cnx, $recherche){
    $r = "SELECT recettes.id_recette,nom_recette,nom_photo FROM recettes 
    LEFT JOIN photos ON recettes.id_recette = photos.id_recette 
    WHERE nom_recette LIKE '%".$recherche."%'"."
    AND validation_admin = 1";
    $req = $cnx->prepare($r);
    $req->execute() ;
    return $req->fetchAll();
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
    $sql1 = "SELECT nom_recette,pseudo_utilisateur, temps_preparation, temps_cuisson, validation_admin, nom_cout, nom_difficulte FROM `recettes`
    LEFT JOIN utilisateurs ON recettes.id_utilisateur = utilisateurs.id_utilisateur
    LEFT JOIN couts ON recettes.id_cout = couts.id_cout
    LEFT JOIN difficultes ON recettes.id_difficulte = difficultes.id_difficulte
    WHERE id_recette = :id_recette";
    $valeurs = $cnx->prepare($sql1);
    $id = [':id_recette'=>$id_recette];
    $valeurs->execute($id);
    return $valeurs->fetchAll();
}

function readCategorieRecette($cnx,$id_recette){

    $sql2 = "SELECT nom_categorie FROM `categories`
    LEFT JOIN recettes_categories ON recettes_categories.id_categorie = categories.id_categorie
    WHERE id_recette = :id_recette";
    $valeurs = $cnx->prepare($sql2);
    $id = [':id_recette'=>$id_recette];
    $valeurs->execute($id);
    return $valeurs->fetchAll();
}


function readRegimeRecette($cnx,$id_recette){
    $sql3 = "SELECT nom_regime FROM `regimes`
    LEFT JOIN recettes_regimes ON recettes_regimes.id_regime = regimes.id_regime
    WHERE id_recette = :id_recette";
    $valeurs = $cnx->prepare($sql3);
    $id = [':id_recette'=>$id_recette];
    $valeurs->execute($id);
    return $valeurs->fetchAll();
}


function readSaisonRecette($cnx,$id_recette){
    $sql4 = "SELECT nom_saison FROM `saisons`
    LEFT JOIN recettes_saisons ON recettes_saisons.id_saison = saisons.id_saison
    WHERE id_recette=:id_recette";
    $valeurs = $cnx->prepare($sql4);
    $id = [':id_recette'=>$id_recette];
    $valeurs->execute($id);
    return $valeurs->fetchAll();
}


function readAvisRecette($cnx,$id_recette){
    $sql5 = "SELECT desc_avis, indice_note, pseudo_utilisateur
    FROM `avis` LEFT JOIN utilisateurs ON utilisateurs.id_utilisateur = avis.id_utilisateur
    WHERE id_recette= :id_recette ";
    $valeurs = $cnx->prepare($sql5);
    $id = [':id_recette'=>$id_recette];
    $valeurs->execute($id);
    return $valeurs->fetchAll();
}


function readPhotosRecette($cnx,$id_recette){
    $sql6 = "SELECT nom_photo FROM `photos`
    WHERE id_recette=:id_recette";
    $valeurs = $cnx->prepare($sql6);
    $id = [':id_recette'=>$id_recette];
    $valeurs->execute($id);
    return $valeurs->fetchAll();
}


function readIngredientsRecette($cnx,$id_recette){
    $sql7 = "SELECT nom_ingredient, photo_ingredient, Dosage, nom_unite FROM `ingredients`
    LEFT JOIN recettes_ingredients ON recettes_ingredients.id_ingredient = ingredients.id_ingredient
    LEFT JOIN unites ON ingredients.id_unite =  unites.id_unite
    WHERE id_recette=:id_recette";
    $valeurs = $cnx->prepare($sql7);
    $id = [':id_recette'=>$id_recette];
    $valeurs->execute($id);
    return $valeurs->fetchAll();
}


function readEtapesRecette($cnx,$id_recette){
    $sql8 = "SELECT desc_etape FROM `etapes` 
    WHERE id_recette = :id_recette";
    $valeurs = $cnx->prepare($sql8);
    $id = [':id_recette'=>$id_recette];
    $valeurs->execute($id);
    return $valeurs->fetchAll();
}

function readAllTitle($cnx){
    $r = "SELECT id_recette,nom_recette FROM recettes";
    $titres = $cnx->query($r);
    return $titres->fetchAll();
}

//  propositionRecette
function readplat($cnx, $nomTable){
    $sql = " SELECT * FROM $nomTable ";
    $platCategorie = $cnx->query($sql);
    return$platCategorie->fetchAll();
}

function readIngredient($cnx){
    $sql = " SELECT id_ingredient,nom_ingredient, ingredients.id_unite, nom_unite  FROM ingredients LEFT JOIN unites ON ingredients.id_unite = unites.id_unite";
    $ingredients = $cnx->query($sql);
    return$ingredients->fetchAll();
}

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

    $r2 = "SELECT recettes_ingredients.id_ingredient,Dosage,nom_ingredient FROM `recettes_ingredients` LEFT JOIN ingredients ON recettes_ingredients.id_ingredient = ingredients.id_ingredient WHERE id_recette = :id_recette";
    $ingredients = $cnx->prepare($r2);
    $ingredients->execute([':id_recette' => $idRecette]);
    $allinfos['ingredients'] = $ingredients->fetchAll();

    return $allinfos;
}













/*=================================AJOUT=======================================================================*/

function createRecette($cnx, $donnees , $idUser, $files){
    if (in_array('2', $donnees['nom_regime'])){
        $donnees['nom_regime'][] = 3;
        $donnees['nom_regime'][] = 1;
    }
    else if (in_array('1', $donnees['nom_regime'])){
        $donnees['nom_regime'][] = 3;
    }
    
    $date = date('Y-m-d');
    $r = "INSERT INTO recettes(nom_recette, temps_preparation, temps_cuisson, validation_admin, date_publication, id_cout, id_difficulte, id_utilisateur)  VALUES (:nom_recette,:tempsPrep,:tempsCui, 0,".$date.",:cout, :difficulte, :idUser)";
    $req= $cnx->prepare($r);
    $valeurTableRecette = [
        ':nom_recette' => $donnees['nom_recette'],
        ':tempsPrep' => $donnees['tempsPrep'],
        ':tempsCui' => $donnees['tempsCui'],
        ':cout' => $donnees['couts'],
        ':difficulte' => $donnees['difficultes'],
        ':idUser' => $idUser
    ];
    $req->execute($valeurTableRecette);

    /* Ajout dans les tables de liaisons*/
    $idRecette = $cnx->lastInsertId();
    for($i=0; $i < count($donnees['ingredients']['id']); $i++ ){
        $r = "INSERT INTO recettes_ingredients VALUES (:idRecette,:id_ingredient, :Dosage )";
        $req = $cnx->prepare($r);
        $ingredients = [
            ':idRecette' => $idRecette,
            ':id_ingredient' => $donnees['ingredients']['id'][$i],
            ':Dosage' => ($donnees['ingredients']['quantite'][$i])/$donnees['parts']
        ];
        $req->execute($ingredients);
    }
    for($i=0; $i < count($donnees['nom_categorie']); $i++ ){
        $r = "INSERT INTO recettes_categories VALUES (:idRecette,:id_categorie)";
        $req = $cnx->prepare($r);
        $categories = [
            ':idRecette' => $idRecette,
            ':id_categorie' => $donnees['nom_categorie'][$i]
        ];
        $req->execute($categories);
    }
    for($i=0; $i < count($donnees['nom_saison']); $i++ ){
        $r = "INSERT INTO recettes_saisons VALUES (:idRecette,:id_saison)";
        $req = $cnx->prepare($r);
        $categories = [
            ':idRecette' => $idRecette,
            ':id_saison' => $donnees['nom_saison'][$i]
        ];
        $req->execute($categories);
    }
    for($i=0; $i < count($donnees['nom_regime']); $i++ ){
        $r = "INSERT INTO recettes_regimes VALUES (:idRecette,:id_regime)";
        $req = $cnx->prepare($r);
        $categories = [
            ':idRecette' => $idRecette,
            ':id_regime' => $donnees['nom_regime'][$i]
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
    if (isset(($files['photoRecette']))){
        if ($files['photoRecette']['error'] == 0){
            move_uploaded_file($files['photoRecette']['tmp_name'], 'img/PhotoRecettes/'.$files['photoRecette']['name']);
        }
        $r2 = "INSERT INTO photos(nom_photo , id_recette) VALUES (:nom_photo, :idRecette)";
        $req2 = $cnx->prepare($r2);
        $photo = [
            ':nom_photo' => $files['photoRecette']['name'],
            ':idRecette' => $idRecette
        ];
        $req2->execute($photo);
    }
    return $idRecette;
}


// create utilisateur
function createUtilisateur($cnx, $nom, $prenom, $mail, $mdp, $pseudo){
    $r = "INSERT INTO utilisateurs(nom_utilisateur, prenom_utilisateur, mail_utilisateur, mdp_utilisateur, pseudo_utilisateur) VALUES (:nom, :prenom, :mail, :mdp, :pseudo)";
    $req = $cnx->prepare($r);
    $valeurs = [':nom'=>$nom, ':prenom'=>$prenom, ':mail'=>$mail, ':mdp'=>$mdp, ':pseudo'=>$pseudo];
    $req->execute($valeurs);
}


function createAvis($cnx, $id_utilisateur,$donnees){
    $r = "INSERT INTO avis(desc_avis, indice_note, id_recette, id_utilisateur) VAlUES (:avis, :note, :id_recette, :id_utilisateur)";
    $req = $cnx->prepare($r);
    $avis =[
        ':avis' => $donnees['avis'],
        ':note' => $donnees['note'],
        ':id_recette' => $donnees['id_recette'],
        ':id_utilisateur' =>  $id_utilisateur,
    ];
    $req->execute($avis);
}

function createInfosMultiple($cnx, $infos, $tableName, $champsName, $idRecette){
    foreach ($infos as $info){
        $r = "INSERT INTO $tableName($champsName, id_recette) VALUES (:idName ,:id_recette)";
        $req = $cnx->prepare($r);
        $valeurs = [
            ':idName' => $info,
            ':id_recette' => $idRecette
        ];
        $req->execute($valeurs);
    }
}
/* ========================================================== UPDATE ==================================================================*/

function updateRecette($cnx, $donnees, $valid ){
    // update dans table recettes
    $r =" UPDATE recettes SET nom_recette = :nom_recette, 
        temps_preparation = :temps_preparation ,
        temps_cuisson = :temps_cuisson,
        validation_admin = :validation_admin, 
        id_cout = :id_cout, 
        id_difficulte = :id_difficulte
        WHERE id_recette = :id_recette";
    $req = $cnx->prepare($r);
    $tableRecette = [
        ':nom_recette' => $donnees['nom_recette'],
        ':temps_preparation' => $donnees['tempsPrep'],
        ':temps_cuisson' => $donnees['tempsCui'],
        ':validation_admin' => $valid,
        ':id_cout' => $donnees['couts'],
        ':id_difficulte' => $donnees['difficultes'],
        ':id_recette' => $donnees['id_recette']
    ];
    $req->execute($tableRecette);

    // update dans catégories, regimes, saisons, etapes

    deleteInfosMultiple($cnx, 'recettes_categories', $donnees['id_recette']);
    createInfosMultiple($cnx, $donnees['nom_categorie'], 'recettes_categories' , 'id_categorie',  $donnees['id_recette']);

    deleteInfosMultiple($cnx, 'recettes_regimes', $donnees['id_recette']);
    createInfosMultiple($cnx, $donnees['nom_regime'], 'recettes_regimes' , 'id_regime',  $donnees['id_recette']);

    deleteInfosMultiple($cnx, 'recettes_saisons',$donnees['id_recette']);
    createInfosMultiple($cnx, $donnees['nom_saison'], 'recettes_saisons' , 'id_saison',  $donnees['id_recette']);

    deleteInfosMultiple($cnx, 'etapes', $donnees['id_recette']);
    createInfosMultiple($cnx, $donnees['etapes'], 'etapes' , 'desc_etape',  $donnees['id_recette']);

    // update ingredients
    deleteInfosMultiple($cnx, 'recettes_ingredients', $donnees['id_recette']);
    for($i=0; $i < count($donnees['ingredients']['id']); $i++ ){
        $r = "INSERT INTO recettes_ingredients VALUES ('',:idRecette,:id_ingredient, :Dosage )";
        $req = $cnx->prepare($r);
        $ingredients = [
            ':idRecette' => $donnees['id_recette'],
            ':id_ingredient' => $donnees['ingredients']['id'][$i],
            ':Dosage' => ($donnees['ingredients']['quantite'][$i])
        ];
        $req->execute($ingredients);
    }
}




/*===============================================================DELETE==================================================================*/
function deleteInfosMultiple($cnx, $tableName, $idDelete){
    $r = "DELETE FROM $tableName WHERE 'id_recette' = :idDelete ";
    $req = $cnx->prepare($r);
    $req->execute([':idDelete' => $idDelete]);
}

function deleteRecette($cnx, $idDelete){
    $r = "DELETE FROM `recettes` WHERE `recettes`.`id_recette` = :idDelete";
    $req = $cnx->prepare($r);
    $req->execute([':idDelete' => $idDelete]);
}

