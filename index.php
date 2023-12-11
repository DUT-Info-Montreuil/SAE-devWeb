<?php
session_start();

require_once 'modules/mod_inscriptions/mod_inscriptions.php';
require_once 'modules/mod_connexions/mod_connexions.php';
require_once 'composants/CompMenu/CompMenu.php';

$vueGenerique = new VueGenerique();

$module = isset($_GET['module']) ? $_GET['module'] : "debut";

switch ($module) {
    case "debut":
        $CompMenu = new CompMenu();
        break;

    case "inscription":
        $ModInscriptions = new ModInscriptions();
        break;

    case "connexion":
        $Modconnexions = new ModConnexions();
        break; 
}

$moduleContent = $vueGenerique->getAffichage();

include 'template.php';
