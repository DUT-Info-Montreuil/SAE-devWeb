<!DOCTYPE html>
<html>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accès au site</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- HEADER -->
    <header>
        <h1>Bienvenue sur le site !</h1>
        <?php
        if(isset($_SESSION['login'])) {
            echo 'Vous êtes connecté en tant que : ' . $_SESSION['login'] . '<br><br>';
            echo '<a href="index.php?module=connexion&action=deconnexion">Se déconnecter</a><br>';
        } else {
            echo '<a href="index.php?module=connexion">Se connecter</a><br>';
        }
        ?>
    </header>
    <!-- /HEADER -->

    <!-- MAIN -->
    <main>
    <?php
        // Affichage du menu (si CompMenu est utilisé)
        if(isset($CompMenu)) {
            $CompMenu->affiche();
        }
        
        // Affichage du contenu du module
        echo $moduleContent;
        ?>
    </main>
    <!-- /MAIN -->

    <!-- FOOTER -->
    <footer>
        <p>Informations de contact : <a href="mailto:ylehongcheffson@iut.univ-paris8.fr">ylehongcheffson@iut.univ-paris8.fr</a></p>
        <p>Informations légales </p>
    </footer>
    <!-- /FOOTER -->

</body>
</html>
