<?php 
session_start();
$titrePage = 'Inscription';
require_once("banniere.php");
?>
<div class="inscriptionContainer">
    <h2>Inscription</h2>
    <form action="create.php" method="post">
        <input required class="inputInscription" type="text" name="nom_utilisateur" placeholder="Nom">
        <input required class="inputInscription" type="text" name="prenom_utilisateur" placeholder="Prénom">
        <input required class="inputInscription" type="text" name="pseudo_utilisateur" placeholder="Pseudo">
        <input required class="inputInscription" type="text" name="mail_utilisateur" placeholder="E-mail">
        <input required class="inputInscription" type="text" name="mail_utilisateur2" placeholder="Confirmation de l'e-mail">
        <input required class="inputInscription" type= "password" name="mdp_utilisateur" placeholder="Mot de passe">
        <input required class="inputInscription" type= "password" name="mdp_utilisateur2" placeholder="Confirmation du mot de passe">
        <div>
        <input required type="checkbox" name="CGU" id="CGU">
        <label for="CGU"> J'accepte les CGU du site </label><br>
        </div>
        <button class="buttonInscription" type="submit">Inscription</button>
    </form>
</div>
<?php 
require_once("piedPage.php");
?>