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

 function choixSaison(){
     if (date('m')>2 && date('m')<6){
         return 1;
     }
     else if (date('m')>5 && date('m')<9){
        return 2;
    }
    else if (date('m')>8 && date('m')<12){
        return 3;
    }
    else if (date('m')==12 || date('m')<3){
        return 4;
    }
 }

 function htmlBandeau($tableau){
     $nom = $tableau[0]['nom_recette'];
     $pseudo = $tableau[0]['pseudo_utilisateur'];
     $html = "<div class='bandeauGauche'>
     <h2 class='section'>$nom &nbsp</h2>
     <h3 class='username'>Par $pseudo</h3>
     </div>";
     return $html;
 }

 function htmlDescriptionRecette($categories, $regimes, $saisons, $valeurRecette){
    $difficulte = $valeurRecette[0]['indice_difficulte'];
    $couts = $valeurRecette[0]['indice_cout'];
    $html = "<h3 class='h3Bandeau'> $difficulte | $couts | ";
    foreach($categories as $categorie){
        $categorie = $categorie['indice_cat'];
        $html .= "| $categorie ";
    }
    foreach($regimes as $regime){
        $regime = $regime['nom_regime'];
        $html .= "| $regime ";
    }
    foreach($saisons as $saison){
        $saison = $saison['nom_saison'];
        $html .= "| $saison ";
    }
    $html .= '</h3>';
    return $html;
 }