<?php
require_once 'vue_generique.php';

class VueEnnemi extends VueGenerique {

    public function afficherEnnemi() {
        echo '<link rel="stylesheet" href="css/styles_tours_ennemi.css">';
        echo '<div class="content-container">
        <div class="content-container">
        <div class="card-container">
            <div class="card">
                <img src="images/Ennemie/Balliste.png" alt="Ennemie Balliste" class="card-image">
                <div class="card-content">
                    <h2>Balliste</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="card">
                <img src="images/Ennemie/Behemoth.png" alt="Ennemie Behemoth" class="card-image">
                <div class="card-content">
                    <h2>Behemoth</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="card">
                <img src="images/Ennemie/Scavenger.png" alt="Ennemie Scavenger" class="card-image">
                <div class="card-content">
                    <h2>Scavenger</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
    </div>';
    }
}
?>
