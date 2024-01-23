<?php

require_once 'vue_generique.php';

class VueDebut extends VueGenerique { 

    public function afficherAccueil() {
        // Utilisation de la mise en tampon de sortie pour générer le contenu
        ob_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur notre site !</title>
    <link rel="stylesheet" href="css/style_accueil.css">
</head>
<body>
    <header>
    
    </header>
    
    <main>
        <section class="hero">
            <h1>Bienvenue sur notre site !</h1>
            <p>Sur notre site vous pouvez trouver toutes sortes de jeux</p>
            <!-- Hero image or video -->
        </section>

        <!-- Content sections -->
        <section class="content">
            <div class="content-block">
                <img src="path/to/image.jpg" alt="Description">
                <p>Lorem ipsum...</p>
            </div>
            <!-- Repeat blocks as needed -->
        </section>

        <!-- Testimonials -->
        <section class="testimonials">
            <h2>Trusted by Thousands of Happy Customer</h2>
            <!-- Testimonials slider -->
        </section>
    </main>


    <!-- Footer -->
    <footer>
     
    </footer>
</body>
</html>

<?php
        // Récupération du contenu généré et fin de la mise en tampon
        $output = ob_get_clean();
        echo $output;
    }
    
}

?>
