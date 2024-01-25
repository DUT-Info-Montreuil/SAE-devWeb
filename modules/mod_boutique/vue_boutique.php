<?php
require_once 'vue_generique.php';

class VueBoutique extends VueGenerique {

    public function afficherBoutique() {
      
        echo '<link rel="stylesheet" href="css/styles_tours_ennemi_boutique.css">';
        echo '<div class="content-container">
        <p class="intro">Bienvenue dans notre boutique en ligne de Tower Defense !</p>
        <p>Nous proposons une variété d\'objets pour renforcer votre défense.</p>
        <p>Explorez notre collection et découvrez des <span class="highlight">articles exclusifs</span> pour améliorer votre stratégie.</p>

        <div class="card-container">

            <div class="card-boutique">
                <img src="images/Boutique/bombe.png" alt="Objet Bombe" class="card-image">
                <div class="card-content">
                    <h2>Bombe</h2>
                   <p class ="descriptionBombe">Une bombe à faible puissance, mais sa capacité à éxploser si un ennemi est suffisament proche, la rend destructrice</p>
                    <audio class="audio-player" controls>
                    <source src="sons/ExplosionBombe.wav" type="audio/wav">
                    </audio>
                </div>
            </div>

            <div class="card-boutique">
                <img src="images/Boutique/hydrogene.png" alt="Objet Hydrogène" class="card-image">
                <div class="card-content">
                    <h2>Hydrogène</h2>
                    <p class ="descriptionHydro">Sa version initiale était tellement puissante que les structures alliés tombé sous son souffle, cette version moins puissante, permet de ravager les lignes ennemis, sans se soucier des pertes alliées.</p>
                    <audio class="audio-player" controls>
                    <source src="sons/bruit.wav" type="audio/wav">
                    </audio>
                </div>
            </div>

            <div class="card-boutique">
                <img src="images/Boutique/mur.png" alt="Objet Mur" class="card-image">
                <div class="card-content">
                    <h2>Mur</h2>
                    <p class ="descriptionMur">Le Mur, batit par le plus grand maçon de bordeldeciel, il est très résistant, permettant ainsi de bloquer les lignes ennemis, et "accompagné le avec une bombe et bonjour les dégâts"</p>
                    <audio class="audio-player" controls>
                    <source src="sons/travail_termine.wav" type="audio/wav">
                    </audio>
                </div>
            </div>

        </div>
        <br> 
        <p>Explorez ces objets uniques, choisissez judicieusement en fonction de votre stratégie, et préparez-vous à dominer le champ de bataille. La victoire vous attend !</p>
        <p class="invite">Téléchargez dès maintenant notre jeu et plongez dans l\'aventure ! 🚀🎮</p>
        <br> 
        <a href="https://github.com/DUT-Info-Montreuil/SAE---devWeb.git" class = "style_bouton">Commencer l\'aventure</a>
    </div>';
    echo '<script src="chemin/vers/boutique.js"></script>';
    } 
}
?>
