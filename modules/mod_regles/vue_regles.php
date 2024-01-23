<?php
require_once 'vue_generique.php';

class VueRegles extends VueGenerique { 

    public function afficherRegles($regles) {
        echo '<table>';
        echo '<tr><th>ID</th><th>Description</th></tr>';
        foreach ($regles as $regle) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($regle['ID']) . '</td>';
            echo '<td>' . htmlspecialchars($regle['description']) . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    
}
?>
