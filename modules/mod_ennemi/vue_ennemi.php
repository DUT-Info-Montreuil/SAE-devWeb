<?php
require_once 'vue_generique.php';

class VueEnnemi extends VueGenerique {

    public function afficherEnnemi() {
        echo '<link rel="stylesheet" href="css/styles_tours_ennemi_boutique.css">';
        echo '<div class="content-container">';
        echo '<div class="card-container">';
        
        // Ennemi Balliste
        echo '<div class="card-boutique">';
        echo '<img src="images/Ennemie/Balliste.png" alt="Ennemi Balliste" class="card-image">';
        echo '<div class="card-content">';
        echo '<h2>Ennemi Balliste</h2>';
        echo '<p>Le Balliste est un ennemi rapide avec une portée d\'attaque de 30. Il a 20 points de vie, une puissance d\'attaque de 5 et se déplace à 0,3 pixel/seconde. Vous gagnerez 50 points en le vainquant.</p>';
        echo '</div>';
        echo '</div>';
        
        // Ennemi Behemoth
        echo '<div class="card-boutique">';
        echo '<img src="images/Ennemie/Behemoth.png" alt="Ennemi Behemoth" class="card-image">';
        echo '<div class="card-content">';
        echo '<h2>Ennemi Behemoth</h2>';
        echo '<p>Le Behemoth est un ennemi robuste avec une portée d\'attaque de 50. Il a 100 points de vie, une puissance d\'attaque de 20 et se déplace à 0,3 pixel/seconde. Vous obtiendrez 200 points en le vainquant. Utilisez la bobine Oppenheimer pour une efficacité maximale contre lui.</p>';
        echo '</div>';
        echo '</div>';
        
        // Ennemi Scavenger
        echo '<div class="card-boutique">';
        echo '<img src="images/Ennemie/Scavenger.png" alt="Ennemi Scavenger" class="card-image">';
        echo '<div class="card-content">';
        echo '<h2>Ennemi Scavenger</h2>';
        echo '<p>Le Scavenger a une portée d\'attaque de 40, 50 points de vie, une puissance d\'attaque de 10 et se déplace à 0,3 pixel/seconde. Il résiste à la bobine Nikola et parfois à la tour Edison. Vaincre un Scavenger vous rapporte 100 points. Utilisez d\'autres tours pour infliger plus de dégâts.</p>';
        echo '</div>';
        echo '</div>';
        
        // Fermeture de la card-container
        echo '</div>';
        
        // Fermeture de la content-container
        echo '</div>';
    }
}
?>
