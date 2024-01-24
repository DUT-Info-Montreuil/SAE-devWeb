<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
    <!-- Feuille de style pour la page d'accueil -->
    <link rel="stylesheet" type="text/css" href="css/style_accueil.css">
    <!-- Feuille de style dédiée au footer -->
</head>
<body>

    <!-- HEADER -->
    <header>
        <?php echo $menu->exec(); ?>
    </header>
    <!-- /HEADER -->

    <!-- MAIN -->
    <main>
        <?php
            require_once 'site.php';
            $site = new Site();
            $site->exec_module();
        ?>
    </main>
    <!-- /MAIN -->

    <!-- FOOTER -->
    <footer>
        
        <?php echo $footer->exec();?>
    </footer>
    <!-- /FOOTER -->

</body>
</html>
