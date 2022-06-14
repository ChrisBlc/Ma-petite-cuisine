<?php 
session_start();
require('bdd.php');
if ($_SESSION['admin'] == 1){
    $validation = 1;
}
else {
    $validation = 0;
}
updateRecette($db, $_POST, $validation);
header('location:gestion.php');