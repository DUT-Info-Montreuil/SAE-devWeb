<!DOCTYPE html>
<html>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accès au site</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <!-- HEADER -->
    <header>
        
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
