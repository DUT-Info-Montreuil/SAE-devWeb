<?php
require_once 'vue_generique.php';

class VueRegles extends VueGenerique { 

    public function afficherRegles($regles) {
        echo '<link rel="stylesheet" href="css/styles_tours_ennemi_boutique.css">';
        echo '<div class="content-container">'; 
        echo'
        <p class="intro">Bienvenue dans le monde passionnant de notre jeu de Tower Defense !</p>
        <p>Nous avons créé des règles uniques pour rendre votre expérience de jeu encore plus captivante.</p>
        <p>Explorez ces règles fondamentales et préparez-vous à affronter les défis du champ de bataille :</p>';

        $reglesParCategorie = [];
        foreach ($regles as $regle) {
            $reglesParCategorie[$regle['categorie']][] = $regle;
        }

        echo '<div class="card-container">';
        foreach ($reglesParCategorie as $categorie => $reglesDansCategorie) {
            echo '<div class="card-boutique">';
            
            echo '<h2>' . htmlspecialchars("Consigne " . $categorie) . '</h2>'; 
            
            echo '<div class="carte-details">';
            foreach ($reglesDansCategorie as $regle) {
                echo '<p>';
                echo  htmlspecialchars($regle['ID']) ;
                echo '&nbsp';
                echo  htmlspecialchars($regle['description']);
                echo '</p>';
            }
            echo '</div>';
            echo '</div>'; 
        }
        echo '</div>';

        echo ' <br>
        <p class="intro">Voici votre consigne :</p>
<div class="rules-container">
    <p >🛡️ Protégez la base en empêchant les ennemis d\'atteindre son emplacement. Assurez-vous que la base ne subisse aucun dommage.</p>
    <p>   Le terrain de jeu représente l\'univers. Utilisez cet environnement à votre avantage pour positionner vos tours de défense de manière stratégique.</p>
    <p>🏹 Affrontez trois types d\'ennemis redoutables : les Ballistes, les Scavengers et les Behemoths. Chacun d\'eux possède ses propres capacités et points faibles, alors étudiez-les attentivement pour adapter votre stratégie de défense.</p>
    <p>   Disposez de trois types de tours de défense, correspondant aux caractéristiques des ennemis. Consultez votre inventaire pour en savoir plus sur les spécificités de chaque tour.</p>
    <p>🤔 Choisissez judicieusement les tours à utiliser en fonction des vagues d\'ennemis à venir.</p>
    <p>   Soyez conscient que le temps joue un rôle crucial dans votre défense. Les vagues d\'ennemis arrivent à intervalles réguliers, alors assurez-vous de prévoir et de préparer vos tours à temps.</p>
    <p>❌ Ne laissez pas les ennemis approcher la base sans défense !</p>
    <p>   En plus des tours de défense, vous disposez également d\'autres objets spéciaux qui peuvent vous aider dans la bataille. Utilisez-les avec parcimonie et stratégie pour maximiser leur effet sur les ennemis.</p>
    <p>🚀 Au fur et à mesure que vous progressez, vous aurez peut-être la possibilité d\'améliorer vos tours de défense.</p>
    <p>   Gérez efficacement vos ressources pour renforcer votre défense et faire face à des vagues d\'ennemis de plus en plus coriaces.</p>
    <p>🔄 Anticipez les mouvements des ennemis et ajustez votre stratégie en conséquence. Expérimentez différentes configurations de tours et d\'objets spéciaux pour trouver celle qui vous convient le mieux.</p>
    <p>   Restez vigilant et réactif ! Vous devrez peut-être ajuster votre défense en temps réel pour faire face à des situations inattendues ou à des ennemis particulièrement résistants.</p>
</div>
<br>
<p>Préparez-vous à une bataille spatiale épique dans notre Tower Defense à thème de l\'univers. Faites preuve de stratégie, de précision et de rapidité pour protéger la base et sauver l\'univers !</p>
<p class="intro">Bonne chance !</p>';
echo '</div>';


      


        echo '<script src="js/script_regles_categorie.js"></script>'; // Si nécessaire
    }
}
?>
