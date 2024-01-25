<?php
    session_start();
    require_once 'composants/CompMenu/compMenu.php'; 
    require_once 'composants/CompMenu/compMenu.php'; 
    $menu = new CompMenu();

    require_once 'composants/CompFooter/composant_footer.php'; 
    $footer = new CompFooter();

    require_once 'template.php';
    
?>

 