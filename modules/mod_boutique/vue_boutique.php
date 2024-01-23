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
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>

            <div class="card-boutique">
                <img src="images/Boutique/hydrogene.png" alt="Objet Hydrogène" class="card-image">
                <div class="card-content">
                    <h2>Hydrogène</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>

            <div class="card-boutique">
                <img src="images/Boutique/mur.png" alt="Objet Mur" class="card-image">
                <div class="card-content">
                    <h2>Mur</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
    </div>';
       
    } 
}
?>
