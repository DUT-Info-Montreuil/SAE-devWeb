<?php

class VueGenerique {

    public function __construct() {
        ob_start();  // Commence la mise en tampon.
    }

    public function getAffichage() {
        return ob_get_clean();  // Récupère le contenu du tampon et termine la mise en tampon.
    }
}

?>
