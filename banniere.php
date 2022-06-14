<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <title><?php echo $titrePage ?></title>
</head>
<body>
    <header>
        <nav class="navHeader">
            
            <?php if ( isset($_SESSION['connected']) && $_SESSION['connected'] == true ) {
                echo "<a class='gerer' href='gestion.php'>Gérer</a>
                <a class='maListe' href='listeCourse.php'>Ma liste de course</a>
                <a href='logOut.php' >Se déconnecter</a>";
            }
            else {
                echo "<a  class='seConnecter'>Se connecter</a>";
            }
            ?>
        </nav>
        <h1> <a href="index.php">Ma Petite Cuisine </a></h1>
        <form action="index.php" method='GET'>
            <div class="burger"></div>
            <input class="recherche" type="text" name="recherche" placeholder="Recherche par plat">
            <button class="loupe" type="submit"></button>
        </form>
        <div class="menuBurger">
                    <ul>
                        <h2>Saison</h2>
                        <li><a href="index.php?cat=saisons&id=1">Printemps</a></li>
                        <li><a href="index.php?cat=saisons&id=2">Eté</a></li>
                        <li><a href="index.php?cat=saisons&id=3">Automne</a></li>
                        <li><a href="index.php?cat=saisons&id=4">Hiver</a></li>
                    </ul>
              
                    <ul>
                        <h2>Regime</h2>
                        <li><a href="index.php?cat=regimes&id=1">Végetarien</a></li>
                        <li><a href="index.php?cat=regimes&id=2">Végan</a></li>
                        <li><a href="index.php?cat=regimes&id=3">Sans porc</a></li>
                        <li><a href="index.php?cat=regimes&id=4">Sans gluten</a></li>
                    </ul>
          
              
                    <ul>
                        <h2>Catégorie</h2>
                        <li><a href="index.php?cat=categories&id=1">Apéritif</a></li>
                        <li><a href="index.php?cat=categories&id=2">Entrée</a></li>
                        <li><a href="index.php?cat=categories&id=3">Plat</a></li>
                        <li><a href="index.php?cat=categories&id=4">Dessert</a></li>
                    </ul>
                <div class="recetteCard ajout">
                    <a class="ajouter"  href="propositionRecette.php">Ajouter une recette</a>
                </div>
                <div class="croix">X</div>
        </div>
        <div id="connexion" class="popUp">
            <h2>Connexion</h2>
            <form action="logIn.php" method="POST">
                <input class="inputInscription" type="text" name="mail" placeholder="Mail">   
                <input class="inputInscription" type="password" name="mdp" placeholder="Mot de passe">   
                <button class="buttonInscription" type="submit">Connexion</button>
            </form>
            <div class="mdpOublie">
                <a  id="lienMdpRecup">Mot de passe oublié?</a>
                <a href="inscription.php">Pas de compte? S'inscrire</a>
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
                <a href="inscription.php">Pas de compte? S'inscrire</a>
            </div>
            <div class="croix">X</div>
        </div>
    </header>