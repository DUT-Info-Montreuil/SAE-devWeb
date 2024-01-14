<?php
include 'controller.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Interstellar Havoc - <?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <nav class="navbar">
        <div class="nav-links left">
            <img src="photos/logo.png" alt="Interstellar Havoc Logo" class="navbar-logo">    
            <a href="index.php?action=tours">Tours</a>
            <a href="index.php?action=ennemis">Ennemis</a>
            <a href="#boutique">Boutique</a>
            <a href="#regle">Règle</a>
        </div>
        <div class="nav-links right">
            <a href="#connexion">Connexion</a>
            <a href="#jouer" class="play-button">Jouer</a>
        </div>
    </nav>
    <br><br>
    <div class="content-container">
        <?php include $view; ?>
    </div>
</body>
</html>
