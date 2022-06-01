<?php 
$titrePage = 'Contacts';
require_once("banniere.php");
?>

<div class="inscriptionContainer">
    <h2>Contacts</h2>
    <form action="" method="post">
        <input type="text" name="email" class="inputInscription" placeholder="E-mail">
        <textarea name="message" id="message" cols="30" rows="10" class="textContact" placeholder="Au secours!!"></textarea>
        <button class="buttonInscription" type="submit">Envoyer</button>
    </form>
</div>


<?php require_once("piedPage.php");?>