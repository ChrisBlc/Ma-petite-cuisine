<?php 
session_start();
require_once('bdd.php');
$infosUsers = readMdpIDAdmin($db);
/* var_dump($infosUsers);
var_dump($_POST); */

foreach($infosUsers as $infosUser){
    if ($_POST['mail'] == $infosUser['mail_utilisateur']){
        if ($_POST['mdp'] == $infosUser['mdp_utilisateur']){
            $_SESSION['connected'] = true;
            $_SESSION['admin'] = $infosUser['admin'];
            $_SESSION['id_utilisateur'] = $infosUser['id_utilisateur'];
            header('location:index.php');
        }
    }
    else {
        header('location:index.php');
    }
}
