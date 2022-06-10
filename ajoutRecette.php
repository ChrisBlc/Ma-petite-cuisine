<?php 
session_start();
require('bdd.php');
var_dump($_POST);
createRecette($db, $_POST , $_SESSION['id_utilisateur']);