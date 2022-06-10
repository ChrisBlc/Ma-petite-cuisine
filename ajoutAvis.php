<?php 
session_start();
require_once('bdd.php');
createAvis($db, $_SESSION['id_utilisateur'],$_POST);
header('location: pageRecette.php?id='.$_POST['id_recette']);