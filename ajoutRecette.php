<?php 
session_start();
require('bdd.php');
var_dump($_POST);
var_dump($_FILES);
createRecette($db, $_POST , $_SESSION['id_utilisateur'], $_FILES);