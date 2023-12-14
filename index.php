<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Titre de la Page</title>

<link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
<a href="?module=debut"><img src="imgAccueil/titre.png" alt="logo" width="110" height="110"></a> 
  <!-- Zone du titre principal et des boutons de navigation -->
  <?php
session_start();

require_once 'modules/mod_inscriptions/mod_inscriptions.php';
require_once 'modules/mod_connexions/mod_connexions.php';
//require_once 'modules/mod_profil/mod_profil.php';
require_once 'composants/CompMenu/CompMenu.php';

$vueGenerique = new VueGenerique();

$module = isset($_GET['module']) ? $_GET['module'] : "debut";

switch ($module) {
    case "debut":
        $CompMenu = new CompMenu();
        break;
 

}

$moduleContent = $vueGenerique->getAffichage();

include 'template.php';

?>


</header>

<main> 
<?php
    // Créez $Modconnexions ici
    if ($module === "connexion") {
      $Modconnexions = new ModConnexions();
    }
    else if($module === "inscription"){ 
        $ModInscriptions = new ModInscriptions();          
    }
 
    ?>
  <img src="imgAccueil/aliensAccueilremoved.png" alt="Description des aliens">
  <!-- Contenu principal avec des sections pour le jeu, les actualités, etc. -->
  <section id="actualité">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
  </section>
  <section id="jeu">
  
  </section>

  <!-- D'autres sections peuvent être ajoutées ici -->
</main>


</body>
</html>

