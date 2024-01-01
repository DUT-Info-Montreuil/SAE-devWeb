<?php
require_once 'vue_generique.php';

class VueRegles extends VueGenerique { 

    public function afficherLesRegles() {
        echo'<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap">';

        echo '<link rel="stylesheet" href="css/style_regles.css">';

        echo '<script src="js/script_changement_fond.js"></script>';
        
        echo '<div id="regles-jeu"">';
        echo '<h1  class="gamer-title" id="typed-title">'; 
        echo '</h1>';
        echo '<h2 class="gamer-subtitle">APPRENEZ LES BASES</h2>';
        echo '<p class="original-paragraph">Il y a beaucoup de choses à savoir sur Interstellar Havoc, alors commençons par les bases. Explorez le guide ci-dessous pour en apprendre plus sur le mode de jeu.</p>';
        echo '</div>';
       
        echo '<script src="js/typed.js"></script>'; // titre h1

        echo '<button class="bouton_bas" id="play-now-button"><span ><a href="index.php?module=regles&action=step2">VOIR PLUS</a></span></button>';
       
 

    }

    public function afficherStep2() {
        echo '<div class="item-hints">
        <div class="hint" data-position="4">
          <span class="hint-radius"></span>
          <span class="hint-dot">Votre defis ?</span>
          <div class="hint-content do--split-children">
            <p>Trouver le parfait équilibre entre la gestion de ressources limitées et la construction stratégique de tours de défense pour repousser des vagues d\'ennemis de plus en plus puissantes dans un jeu de Tower Defense spatial captivant.</p>
          </div>
        </div>
      </div>';

    }
}


?>
