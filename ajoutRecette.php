<?php 
session_start();
require('bdd.php');
$idRecette = createRecette($db, $_POST , $_SESSION['id_utilisateur'], $_FILES);
 header("location:pageRecette.php?id=$idRecette"); 