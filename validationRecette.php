<?php 
$titrePage = 'Validation Recette';
require_once('bdd.php');
require_once("banniere.php");
readAllInfoRecetteById($db, 1);
