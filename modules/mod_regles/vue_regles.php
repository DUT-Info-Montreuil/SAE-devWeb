<?php
require_once 'vue_generique.php';

class VueRegles extends VueGenerique { 

    public function afficherRegles($regles) {
        echo '<link rel="stylesheet" href="css/style_regles.css">';
        echo '<div class="content-container">'; 

        $reglesParCategorie = [];
        foreach ($regles as $regle) {
            $reglesParCategorie[$regle['categorie']][] = $regle;
        }

        echo '<div class="card-container">';
        foreach ($reglesParCategorie as $categorie => $reglesDansCategorie) {
            echo '<div class="card-boutique">';
            
            echo '<h2>' . htmlspecialchars("Article " . $categorie) . '</h2>'; 
            
            echo '<div class="carte-details">';
            foreach ($reglesDansCategorie as $regle) {
                echo '<p>';
                echo  htmlspecialchars($regle['ID']) ;
                echo '&nbsp';
                echo  htmlspecialchars($regle['description']);
                echo '</p>';
            }
            echo '</div>';
            echo '</div>'; 
        }
        echo '</div>'; 
        echo '</div>'; 
        echo '<script src="js/script_regles_categorie.js"></script>'; // Si nécessaire
    }
}
?>
