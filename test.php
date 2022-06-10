<?php 
require('bdd.php');
var_dump(readInfosMultiplesById($db,['id_categorie','id_recette'],'recettes_categories', 1));
var_dump(readAllInfoRecetteById($db, 2));