<?php
require_once 'vue_generique.php';

class VueAmis extends VueGenerique { 

    public function afficherListeAmis($listeAmis) {
        echo '<div class="liste-amis">';

        foreach ($listeAmis as $ami) {
            echo '<div class="ami">';
        
            echo '<p>Nom : ' . htmlspecialchars($ami['nom']) . '</p>';
           
            echo '</div>';
        }

        echo '</div>';
    }

}
?>
