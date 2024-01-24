<?php

require_once 'vue_generique.php';

class VueDebut extends VueGenerique {

    public function afficherAccueil() {
        echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Exo+2&display=swap">';
        echo '
            <div>
                <h1 class="heading" id="typed-title"></h1>

                <p class="description">Découvrez un monde d\'aventures extraordinaires.</p>

                <div class="grid-container">
                <img src="images/aliensAccueilremoved.png" alt="Description des aliens" style="max-width: 100%; height: auto; margin: 20px;">
                <p class="image-description">Explorez les confins de l\'univers avec notre plateforme de jeu immersive. Rencontrez des civilisations extraterrestres, participez à des quêtes épiques et découvrez des planètes inexplorées. Plongez dans l\'aventure dès maintenant et laissez-vous emporter par un monde de possibilités infinies. Rejoignez des milliers de joueurs passionnés et créez votre propre légende spatiale. Que l\'exploration commence !</p>
                </div>

                <p class="description">Rejoignez la communauté des joueurs passionnés.</p>
                <a href="https://github.com/DUT-Info-Montreuil/SAE---devWeb.git" class = "style_bouton">Commencer l\'aventure</a>

                <div class = "paragraphe">
                    <p>Vous êtes prêt pour l\'action ?</p>
                    <p>Relevez des défis, gagnez des récompenses et explorez des mondes fascinants !</p>
                </div>

            </div>';
            echo '<script src="js/annimation.js"></script>'; // titre h1
    }
}
