<?php 
session_start();
require('bdd.php');
deleteRecette($db, $_POST['id_recette']);
header("location:gestion.php");  