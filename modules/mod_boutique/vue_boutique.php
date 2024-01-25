<?php
require_once 'vue_generique.php';

class VueBoutique extends VueGenerique { 

    public function afficherBoutique() {
      
        echo '<link rel="stylesheet" href="css/styles_boutique.css">';
        echo '<div class="content-container">
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
                    <p class ="descriptionMur">Le Mur, batit par le plus grand maçon de bordeldeciel, il est très résistant, permettant ainsi de bloquer les lignes ennemis, et "accompagnés d &rsquo une bombe derrière et bonjour les dégâts"</p>
                    <audio class="audio-player" controls>
                    <source src="sons/travail_termine.wav" type="audio/wav">
                    </audio>
                </div>
            </div>
        </div>
    </div>';
    echo '<script src="chemin/vers/boutique.js"></script>';
    } 
}
?>
