<?php
require_once 'vue_generique.php';

class VueTours extends VueGenerique { 

    public function afficherTours() {
        echo '<link rel="stylesheet" href="css/styles_tours_ennemi_boutique.css">';
        echo '<div class="content-container">
        <div class="card-container">';
        
        // Tour Bobine Nikola
        echo '<div class="card-boutique">';
        echo '<img src="images/Tours/Nikola.png" alt="Tour Nikola" class="card-image">';
        echo '<div class="card-content">';
        echo '<h2>Tour Bobine Nikola</h2>';
        echo '<p>La Bobine Nikola est une tour qui se révèle très faible face à deux ou trois Behemoth et Scavenger. Ces ennemis possèdent une résistance particulière contre les attaques de la Bobine Nikola, ce qui nécessite de mettre en place d\'autres stratégies ou de combiner cette tour avec d\'autres types de tours pour les vaincre efficacement.</p>';
        echo '</div>';
        echo '</div>';
        
        // Tour Bobine Edison
        echo '<div class="card-boutique">';
        echo '<img src="images/Tours/Edisson.png" alt="Tour Edison" class="card-image">';
        echo '<div class="card-content">';
        echo '<h2>Tour Bobine Edison</h2>';
        echo '<p>La Bobine Edison, quant à elle, est légèrement plus résistante. Elle peut faire face à des ennemis tels que les Behemoth et les Scavenger avec une meilleure efficacité. Cependant, il faudra toujours faire preuve de prudence et éventuellement utiliser des tactiques supplémentaires pour surmonter leur résistance.</p>';
        echo '</div>';
        echo '</div>';
        
        // Tour Bobine Oppenheimer
        echo '<div class="card-boutique">';
        echo '<img src="images/Tours/Oppenheimer.png" alt="Tour Oppenheimer" class="card-image">';
        echo '<div class="card-content">';
        echo '<h2>Tour Bobine Oppenheimer</h2>';
        echo '<p>En ce qui concerne la Bobine Oppenheimer, elle est la plus puissante des tours disponibles. Cependant, il est important de noter que cette tour peut rapidement perdre ses points de vie lorsqu\'elle est confrontée à une grande vague d\'ennemis. Pour la rendre plus efficace contre ces vagues d\'ennemis, il sera nécessaire de lui faire des upgrades.</p>';
        echo '</div>';
        echo '</div>';
        
        // Fermeture de la card-container
        echo '</div>';
        
        // Fermeture de la content-container
        echo '</div>';
    }
}
?>
