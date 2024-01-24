<?php
require_once 'vue_generique.php';

class VueTours extends VueGenerique { 

    public function afficherTours() {
        echo '<link rel="stylesheet" href="css/styles_tours_ennemi.css">';
        echo '<div class="content-container">
        <div class="card-container">
            <div class="card">
                <img src="images/Tours/Oppenheimer.png" alt="Tour Oppenheimer" class="card-image">
                <div class="card-content">
                    <h2>Oppenheimer</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="card">
                <img src="images/Tours/Edisson.png" alt="Tour Edison" class="card-image">
                <div class="card-content">
                    <h2>Edison</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>

            <div class="card">
                <img src="images/Tours/Nikola.png" alt="Tour Nikolas" class="card-image">
                <div class="card-content">
                    <h2>Nikolas</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
    </div>';
    }
}
?>
