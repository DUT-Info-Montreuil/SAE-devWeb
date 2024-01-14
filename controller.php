<?php
$action = isset($_GET['action']) ? $_GET['action'] : 'default';

switch ($action) {
    case 'tours':
        $pageTitle = 'Tours';
        $view = 'views/tours.php';
        break;
    case 'ennemis':
        $pageTitle = 'Ennemis';
        $view = 'views/ennemis.php';
        break;
    // Ajoutez d'autres actions selon vos besoins
    default:
        $pageTitle = 'Page inconnue';
        $view = 'views/default.php';
        break;
}
?>
