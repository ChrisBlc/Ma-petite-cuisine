<?php 
require_once("banniere.php");
?>
<div class="inscriptionContainer">
    <h2>Inscription</h2>
    <form action="" method="post">
        <input class="inputInscription" type="text" name="nom" placeholder="Nom">
        <input class="inputInscription" type="text" name="prenom" placeholder="Prénom">
        <input class="inputInscription" type="text" name="pseudo" placeholder="Pseudo">
        <input  class="inputInscription" type="text" name="email" placeholder="E-mail">
        <input class="inputInscription" type="text" name="email2" placeholder="Confirmation de l'e-mail">
        <input class="inputInscription" type= "password" name="password" placeholder="Mot de passe">
        <input  class="inputInscription" type= "password" name="password2" placeholder="Confirmation du mot de passe">
        <div>
        <input type="checkbox" name="CGU" id="CGU">
        <label for="CGU"> J'accepte les CGU du site </label><br>
        </div>
        <button class="buttonInscription" type="submit">Inscription</button>
    </form>
</div>
<?php 
require_once("piedPage.php");
?>