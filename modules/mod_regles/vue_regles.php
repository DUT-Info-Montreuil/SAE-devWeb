<?php
require_once 'vue_generique.php';

class VueRegles extends VueGenerique { 

    public function afficherRegles($regles) {
        echo '<link rel="stylesheet" href="css/style_regles.css">';
        echo '<div class="cartes-container">';

        $reglesParCategorie = [];
        foreach ($regles as $regle) {
            $reglesParCategorie[$regle['categorie']][] = $regle;
        }
     foreach ($reglesParCategorie as $categorie => $reglesDansCategorie) {
            echo '<div class="categorie-carte">';
            echo '<img src="images/regles/' . $categorie . '.png" alt="Catégorie ' . htmlspecialchars($categorie) . '">'; // Assurez-vous que le chemin de l'image est correct
            echo '<div class="carte-header">' . htmlspecialchars("Catégorie " . $categorie) . '</div>';
            echo '<div class="carte-content">';
            foreach ($reglesDansCategorie as $regle) {
                echo '<p>';
                echo '<strong>ID:</strong> ' . htmlspecialchars($regle['ID']) . '<br>';
                echo '<strong>Description:</strong> ' . htmlspecialchars($regle['description']);
                echo '</p>';
            }
            echo '</div>';
            echo '</div>';
            echo '<script src="js/script_regles_categorie.js"></script>';
        }
        echo'</div>';
    }
   
    
}


?>
