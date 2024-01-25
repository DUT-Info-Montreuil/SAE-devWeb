<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titre de la Page</title>
    <link rel="stylesheet" type="text/css" href="css/style_accueil.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Fonction pour afficher le message dans une boîte de dialogue
        function afficherMessage(message) {
            alert(message);
        }

        // Code pour soumettre le formulaire via AJAX
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('form').addEventListener('submit', function(e) {
                e.preventDefault();

                // Utilisez ici la méthode AJAX pour soumettre le formulaire et récupérer la réponse

                // Supposons que "reponse" contienne la réponse JSON de votre serveur
                var reponse = { "message": "" };

                // Affichez le message dans une boîte de dialogue
                afficherMessage(reponse.message);
            });
        });
    </script>
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
