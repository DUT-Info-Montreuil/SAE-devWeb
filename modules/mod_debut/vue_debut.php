<?php

require_once 'vue_generique.php';

class VueDebut extends VueGenerique {

    public function afficherAccueil() {
        echo '<link rel="stylesheet" href="css/style_accueil.css">';
        echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Exo+2&display=swap">';
        echo '
            <div>
                <h1 class="heading" id="typed-title"></h1>

                <p class="description">Découvrez un monde d\'aventures extraordinaires.</p>

                <div class="grid-container">
                <img id="imageProfil" src="images/ennemis.png" alt="Description des aliens"  class="img-profil">
                <div>
                <p class="image-description">Préparez-vous à affronter des adversaires redoutables et découvrez les mystères des créatures intergalactiques qui peuplent notre univers !
                Des hordes d\'ennemis extraterrestres n\'attendent que vous pour tester votre courage et vos compétences. Explorez des mondes hostiles, déjouez des stratégies machiavéliques, et devenez le héros de votre propre aventure spatiale.
                Plongez dans l\'inconnu, affrontez des défis épiques, et forgez votre destin dans un univers où chaque rencontre est une opportunité de grandeur. Êtes-vous prêt à relever le défi ?</p>
                <br> 
                <a href="index.php?module=profil&action=profil"><button class="learn-more"><span class="circle" aria-hidden="true"><span class="icon arrow"></span></span><span class="button-text">Découvrir</span></button></a>
                </div>
                </div>

                <div class="grid-container">
                <p class="image-description">Explorez les confins de l\'univers avec notre plateforme de jeu immersive. Rencontrez des civilisations extraterrestres, participez à des quêtes épiques et découvrez des planètes inexplorées. Plongez dans l\'aventure dès maintenant et laissez-vous emporter par un monde de possibilités infinies. Rejoignez des milliers de joueurs passionnés et créez votre propre légende spatiale. Que l\'exploration commence !</p>
                <img src="images/profil/ennemis_tues.png" alt="Description des aliens"  class="img-profil">
                </div>

                <div class="grid-container">
                <img src="images/profil/ennemis.png" alt="Description des aliens"  class="img-profil">
                <p class="image-description">Explorez les confins de l\'univers avec notre plateforme de jeu immersive. Rencontrez des civilisations extraterrestres, participez à des quêtes épiques et découvrez des planètes inexplorées. Plongez dans l\'aventure dès maintenant et laissez-vous emporter par un monde de possibilités infinies. Rejoignez des milliers de joueurs passionnés et créez votre propre légende spatiale. Que l\'exploration commence !</p>
                </div>
                
                <p class="description">Rejoignez la communauté des joueurs passionnés.</p>
                <br> 
                <a href="https://github.com/DUT-Info-Montreuil/SAE---devWeb.git" class = "style_bouton">Commencer l\'aventure</a>

                <div class = "paragraphe">
                    <p>Vous êtes prêt pour l\'action ?</p>
                    <p>Relevez des défis, gagnez des récompenses et explorez des mondes fascinants !</p>
                </div>

            </div>';
            
            echo '<script src="js/annimation.js"></script>';
            echo '<script>
            var imageProfil = document.getElementById(\'imageProfil\');
            imageProfil.classList.add(\'show\');
            </script>';
            
    }
}
