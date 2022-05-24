<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <title>Ma Petite Cuisine</title>
</head>
<body>
    <header>
        <nav class="navHeader">
            <a class="gerer" href="#">Gérer</a>
            <a class="maListe" href="#">Ma liste de course</a>
            <a  class="seConnecter"href="#">Se connecter</a>
        </nav>
        <h1> <a href="index.php">Ma Petite Cuisine </a></h1>
        <form action="#">
            <div class="burger"></div>
            <input class="recherche" type="text" name="Recherche" placeholder="Recherche (plats,ingrédients)">
            <button class="loupe" type="submit"></button>
        </form>
        <div class="menuBurger">
                    <ul>
                        <h2>Saison</h2>
                        <li><a href="">Printemps</a></li>
                        <li><a href="">Eté</a></li>
                        <li><a href="">Automne</a></li>
                        <li><a href="">Hiver</a></li>
                    </ul>
              
                    <ul>
                        <h2>Regime</h2>
                        <li><a href="">Végetarien</a></li>
                        <li><a href="">Végan</a></li>
                        <li><a href="">Sans porc</a></li>
                        <li><a href="">Sans gluten</a></li>
                    </ul>
          
              
                    <ul>
                        <h2>Catégorie</h2>
                        <li><a href="">Apéritif</a></li>
                        <li><a href="">Entrée</a></li>
                        <li><a href="">Plat</a></li>
                        <li><a href="">Dessert</a></li>
                    </ul>
                <div class="recetteCard ajout">
                    <a class="ajouter"  href="#">Ajouter une recette</a>
                </div>
                <div class="croix">X</div>
        </div>
        <div id="connexion" class="popUp">
            <h2>Connexion</h2>
            <form action="" method="post">
                <input class="inputInscription" type="text" name="mail" placeholder="Mail">   
                <input class="inputInscription" type="password" name="mdp" placeholder="Mot de passe">   
                <button class="buttonInscription" type="submit">Connexion</button>
            </form>
            <div class="mdpOublie">
                <a href="" id="linkMdpRecup">Mot de passe oublié?</a>
                <a href="">Pas de compte? S'inscrire</a>
            </div>
            <div class="croix">X</div>
        </div>
        <div id="mdpRecup" class="popUp">
            <h2>Mot de passe oublié</h2>
            <form action="" method="post">
                <input class="inputInscription" type="text" name="mail" placeholder="E-mail">   
                <button class="buttonInscription" type="submit">Envoyer</button>
            </form>
            <div class="mdpOublie">
                <a href="">Pas de compte? S'inscrire</a>
            </div>
            <div class="croix">X</div>
        </div>
    </header>