<?php



class VueProfil { 

    public function afficherProfil($infoJoueur, $partiesJoueur, $login) {
        echo '<div class="profil-container">';
       // Affichage des informations du joueur
echo '<h2>Profil du Joueur</h2>';
if (!empty($infoJoueur)) {
    echo '<p>Nom d\'utilisateur : ' . $login . '</p>';
    echo '<p>Email : ' . $infoJoueur['email'] . '</p>';
    echo '<p>Logo : <img src="' . $infoJoueur['logo'] . '" alt="Logo du joueur"></p>';
} else {
    echo '<p>Informations du joueur non disponibles.</p>';
}

        // Affichage des informations supplémentaires si disponibles
    
        
        // Affichage des parties du joueur
        // Affichage des parties du joueur
echo '<h3>Parties Jouées</h3>';
if (!empty($partiesJoueur)) {
    echo '<table>';
    echo '<tr><th>Date</th><th>Score</th></tr>';
    foreach ($partiesJoueur as $partie) {
        echo '<tr>';
        echo '<td>' . $partie['date'] . '</td>';
        echo '<td>' . $partie['score'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo '<p>Aucune partie jouée pour le moment.</p>';
}


        // Ajout du lien de retour
        echo '<p><a href="index.php?module=profil&action=afficherProfil">Retour au Profil</a></p>';

        echo '</div>';
    }
}




?>


