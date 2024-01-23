<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
    <link rel="stylesheet" type="text/css" href="css/style_index.css">
    <!--<link rel="stylesheet" href="css/styles.css">-->
<head>
    
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
