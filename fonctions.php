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
 function htmlCheckBox($tableau, $cleId, $cleName){
    $html ='<div>';
    foreach($tableau as $valeur){
        $id= $valeur[$cleId];
        $name=  $valeur[$cleName];
        $html .="<input type='checkbox' name='$name' id='$name' value='$id'/>
        <label for='$name'>$name</label><br>";
    }
    $html .='</div>';
    return $html;
 }
            
 function htmlMenuRoulant($tableau, $cleId, $cleName, $nomTable){
    $html="<select class='menuDeroulant' name='$nomTable' id='bon'>
      <option value=''>--choisir un coût--</option>";
    foreach($tableau as $valeur){
        $id= $valeur[$cleId];
        $name= $valeur[$cleName];
        $html .= "<option value='$id'>$name</option>";
    }
        $html .='</select>';
        return $html;
    }

