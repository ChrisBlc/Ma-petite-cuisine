<?php 
    require_once('bdd.php');
    var_dump($_POST);

    if($_POST['mail_utilisateur'] ==$_POST['mail_utilisateur2'] && $_POST['mdp_utilisateur']==$_POST['mdp_utilisateur2']){
        createUtilisateur($db, $_POST['nom_utilisateur'], $_POST['prenom_utilisateur'], $_POST['mail_utilisateur'], $_POST['mdp_utilisateur'], $_POST['pseudo_utilisateur']);
    }
   
   header("location:index.php");
