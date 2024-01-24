<?php
require_once 'vue_generique.php';

class VueProfil extends VueGenerique { 

    public function afficherCartes() {
        echo '<div class="cartes-container">';
        echo '<link rel="stylesheet" type="text/css" href="css/style_profil.css">';
        
        $cartes = [
            ['MES PARTIES JOUÉES', 'index.php?module=profil&action=partie','images/profil/partie.png'],
            ['MES ENNEMIS TUÉS', 'index.php?module=profil&action=ennemis_tues', 'images/profil/ennemis_tues.png'],
            ['LES ENNEMIS PARTIE', 'index.php?module=profil&action=ennemis_partie', 'images/profil/ennemis.png'],
            ['MES TOURS PLACÉS', 'index.php?module=profil&action=tours', 'images/profil/tours.png'],
            ['CLASSEMENT', 'index.php?module=profil&action=classement', 'images/profil/classement.png'],
            ['Ami', 'index.php?module=profil&action=ami', 'images/profil/amis.png'],
        ];

        foreach ($cartes as $carte) {
            echo '<div class="card" data-url="' . $carte[1] . '">';
            echo '<img src="' . $carte[2] . '" alt="' . $carte[0] . '">';
            echo $carte[0];
            echo '</div>';
        }
        echo '</div>';

        $this->boutton_profil();

        echo '<script src="js/script_click_profil.js"></script>';
       
    }

    public function boutton_profil() {
        echo '<link rel="stylesheet" type="text/css" href="css/style_profil_bouton.css">';
        echo '<div class="btn-container">';
        echo '<a href="index.php?module=profil&action=profil" class="boutton">';
        echo '<strong>PROFIL</strong>';
        echo '<div id="container-stars">';
        echo '<div id="stars"></div>';
        echo '</div>';
        echo '<div id="glow">';
        echo '<div class="circle"></div>';
        echo '<div class="circle"></div>';
        echo '</div>';
        echo '</a>';
        echo '</div>';     
    }
    

    public function afficherTableauParties($donnees) {
        echo '<link rel="stylesheet" type="text/css" href="css/style_profil_tableau.css">';
        if ($donnees) {
            echo '<div class="parties-container">';
            echo '<table class="styled-table">';
            echo '<thead><tr><th>ID Partie</th><th>Date</th><th>Heure</th><th>Score</th><th>Temps</th><th>ID Joueur</th><th>ID Terrain</th></tr></thead>';
            echo '<tbody>';
            foreach ($donnees as $row) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['idPartie']) . '</td>';
                echo '<td>' . htmlspecialchars($row['date']) . '</td>';
                echo '<td>' . htmlspecialchars($row['heure']) . '</td>';
                echo '<td>' . htmlspecialchars($row['score']) . '</td>';
                echo '<td>' . htmlspecialchars($row['temps']) . '</td>';
                echo '<td>' . htmlspecialchars($row['id_joueur']) . '</td>';
                echo '<td>' . htmlspecialchars($row['id_terrain']) . '</td>';
                echo '</tr>';
            }
            echo '</tbody></table></div>';
        } 
        $this->boutton_profil();
    }

    public function afficherTableauEnnemisPartie($donnees) {
        echo '<link rel="stylesheet" type="text/css" href="css/style_profil_tableau.css">';
        if ($donnees) {
            echo '<div class="parties-container">';
            echo '<table class="styled-table">';
            echo '<thead><tr><th>ID Ennemi</th><th>ID Partie</th><th>Vie Partie</th><th>Position X</th><th>Position Y</th></tr></thead>';
            echo '<tbody>';
            foreach ($donnees as $row) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['id_ennemi']) . '</td>';
                echo '<td>' . htmlspecialchars($row['idPartie']) . '</td>';
                echo '<td>' . htmlspecialchars($row['Vie_partie']) . '</td>';
                echo '<td>' . htmlspecialchars($row['position_X']) . '</td>';
                echo '<td>' . htmlspecialchars($row['position_Y']) . '</td>';
                echo '</tr>';
            }
            echo '</tbody></table></div>';
        } else {
            echo "Aucun ennemi tué trouvé pour le joueur connecté.";
        }
        $this->boutton_profil();
    }
    
    public function afficherTableauEnnemisTues($donnees) {
        echo '<link rel="stylesheet" type="text/css" href="css/style_profil_tableau.css">';
        if ($donnees) {
            echo '<div class="parties-container">';
            echo '<table class="styled-table">';
            echo '<thead><tr><th>ID Ennemi</th><th>Nom Ennemi</th><th>Vie Ennemi</th><th>Dégat</th><th>Portée</th><th>Contourner Mur</th><th>Récompense</th><th>ID Partie</th><th>Vie Partie</th><th>Position X</th><th>Position Y</th></tr></thead>';
            echo '<tbody>';
            foreach ($donnees as $row) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['id_ennemi']) . '</td>';
                echo '<td>' . htmlspecialchars($row['nom_ennemi']) . '</td>';
                echo '<td>' . htmlspecialchars($row['vie']) . '</td>';
                echo '<td>' . htmlspecialchars($row['degat']) . '</td>';
                echo '<td>' . htmlspecialchars($row['portee']) . '</td>';
                echo '<td>' . ($row['contourner_mur'] ? 'Oui' : 'Non') . '</td>';
                echo '<td>' . htmlspecialchars($row['recompense']) . '</td>';
                echo '<td>' . htmlspecialchars($row['idPartie']) . '</td>';
                echo '<td>' . htmlspecialchars($row['Vie_partie']) . '</td>';
                echo '<td>' . htmlspecialchars($row['position_X']) . '</td>';
                echo '<td>' . htmlspecialchars($row['position_Y']) . '</td>';
                echo '</tr>';
            }
            echo '</tbody></table></div>';
        } else {
            echo "Aucun ennemi tué trouvé pour le joueur connecté.";
        }
        $this->boutton_profil();
    }

    public function afficherTableauToursPlacees($donnees) {
        echo '<link rel="stylesheet" type="text/css" href="css/style_profil_tableau.css">';
        if ($donnees) {
            echo '<div class="parties-container">';
            echo '<table class="styled-table">';
            echo '<thead><tr><th>ID Tour Placée</th><th>ID Partie</th><th>Vie Partie</th><th>Position X</th><th>Position Y</th><th>Nom Tour</th><th>Vie Tour</th><th>Dégat Tour</th><th>Portée Tour</th><th>Taux de Tir</th><th>Temps de Recharge</th><th>Prix Tour</th><th>Niveau Tour</th></tr></thead>';
            echo '<tbody>';
            foreach ($donnees as $row) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['id_tour']) . '</td>';
                echo '<td>' . htmlspecialchars($row['idPartie']) . '</td>';
                echo '<td>' . htmlspecialchars($row['Vie_partie']) . '</td>';
                echo '<td>' . htmlspecialchars($row['position_X']) . '</td>';
                echo '<td>' . htmlspecialchars($row['position_Y']) . '</td>';
                echo '<td>' . htmlspecialchars($row['nom_tour']) . '</td>';
                echo '<td>' . htmlspecialchars($row['vie']) . '</td>';
                echo '<td>' . htmlspecialchars($row['degat']) . '</td>';
                echo '<td>' . htmlspecialchars($row['portee']) . '</td>';
                echo '<td>' . htmlspecialchars($row['taux_de_tir']) . '</td>';
                echo '<td>' . htmlspecialchars($row['temps_de_recharge']) . '</td>';
                echo '<td>' . htmlspecialchars($row['prix']) . '</td>';
                echo '<td>' . htmlspecialchars($row['niveau']) . '</td>';
                echo '</tr>';
            }
            echo '</tbody></table></div>';
        } else {
            echo "Aucune tour placée trouvée pour le joueur connecté.";
        }
        $this->boutton_profil();
    }
    
    public function afficherClassementParties($classement) {
        echo '<link rel="stylesheet" type="text/css" href="css/style_profil_tableau.css">';
        if ($classement) {
            echo '<div class="parties-container">';
            echo '<table class="styled-table">';
            echo '<thead><tr><th>Classement</th><th>ID Partie</th><th>Score</th></tr></thead>';
            echo '<tbody>';
            foreach ($classement as $row) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['classement']) . '</td>';
                echo '<td>' . htmlspecialchars($row['idPartie']) . '</td>';
                echo '<td>' . htmlspecialchars($row['score']) . '</td>';
                echo '</tr>';
            }
            echo '</tbody></table></div>';
        } else {
            echo "Aucune partie trouvée pour le joueur connecté.";
        }
        $this->boutton_profil();
    }
    public function afficherListeAmis($listeAmis) {
        echo '<div class="liste-amis">';
        foreach ($listeAmis as $ami) {
            echo '<div class="ami">';
            echo '<p>Nom : ' . htmlspecialchars($ami['nom_joueur']) . '</p>';
            echo '</div>';
        }
        echo '</div>';
        $this->boutton_profil();
    }
    
    public function afficherFormulaireRecherche() {
        echo '<form action="index.php?module=profil&action=rechercher" method="post">';
        echo '<input type="text" name="recherche" placeholder="Rechercher un joueur par nom ou ID">';
        echo '<button type="submit">Rechercher</button>';
        echo '</form>';
        $this->boutton_profil();
    }
    public function afficherResultatsRecherche($resultats) {
        if (!empty($resultats)) {
            echo '<div class="resultats-recherche">';
            foreach ($resultats as $joueur) {
                echo '<div class="joueur">';
                echo '<p>ID: ' . htmlspecialchars($joueur['id_joueur']) . '</p>';
                echo '<p>Nom: ' . htmlspecialchars($joueur['nom_joueur']) . '</p>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo '<p>Aucun joueur trouvé.</p>';
        }
        $this->boutton_profil();
    }
    

    
}
?>
