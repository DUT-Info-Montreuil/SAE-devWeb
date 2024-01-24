<?php
    session_start();
    require_once 'composants/CompMenu/compMenu.php'; // Assurez-vous que le chemin est correct
    $menu = new CompMenu();

    require_once 'composants/CompFooter/composant_footer.php'; // Assurez-vous que le chemin est correct
    $footer = new CompFooter();

    require_once 'template.php';

?>
