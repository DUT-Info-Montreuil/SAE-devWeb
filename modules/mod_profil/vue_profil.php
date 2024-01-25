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
            ['Ami', 'index.php?module=profil&action=ami', 'images/profil/ami.png'],
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
            // Afficher le tableau
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
            echo '</tbody></table>';
            
            // Afficher le graphique simplifié
            $this->afficherGraphiquePartiesSimplifie($donnees);
    
            echo '</div>'; // Fermeture de la div parties-container
    
            // Afficher le bouton après le graphique
           
        } 
    }
    
    
    public function afficherGraphiquePartiesSimplifie($donnees) {
        echo '<canvas id="partiesChart" width="370" height="200"></canvas>';
        echo '<script>';
        echo 'var ctx = document.getElementById("partiesChart").getContext("2d");';
        echo 'var partiesData = ' . json_encode($donnees) . ';'; // Convertir les données PHP en JSON
        echo 'var labels = partiesData.map(function(partie) { return partie.idPartie; });';
        echo 'var scores = partiesData.map(function(partie) { return partie.score; });';
        echo 'var chart = new Chart(ctx, {';
        echo '    type: "bar",';
        echo '    data: {';
        echo '        labels: labels,';
        echo '        datasets: [{';
        echo '            label: "Scores des parties",';
        echo '            data: scores,';
        echo '            backgroundColor: "rgba(75, 192, 192, 0.2)",';
        echo '            borderColor: "rgba(75, 192, 192, 1)",';
        echo '            borderWidth: 1';
        echo '        }]';
        echo '    }';
        echo '});';
        echo '</script>';
    }
    
    public function afficherExplicationTableau() {
        echo '<link rel="stylesheet" type="text/css" href="css/style_profil.css">';
        echo' <div class="explication-tableau">
        <h2>Graphique des Scores</h2>
        <p>Bienvenue sur votre tableau des scores, un aperçu visuel de votre performance dans différentes parties du jeu. Ce graphique présente un résumé des scores obtenus au fil des parties.</p>
        <p><strong>Comment lire le tableau :</strong></p>
        <ul>
            <li><strong>ID Partie :</strong> Identifiant unique de chaque partie enregistrée.</li>
            <li><strong>Date et Heure :</strong> Le moment précis où la partie a été jouée.</li>
            <li><strong>Score :</strong> Le score total obtenu dans cette partie.</li>
            <li><strong>Temps :</strong> La durée totale de la partie.</li>
            <li><strong>ID Joueur :</strong> Votre identifiant unique associé à cette partie.</li>
            <li><strong>ID Terrain :</strong> L\'identifiant du terrain sur lequel la partie a eu lieu.</li>
        </ul>
        <p>Explorez ce tableau interactif pour analyser les tendances, repérer les performances exceptionnelles, et suivre l\'évolution des scores au fil du temps.</p>
        <p>Prenez le contrôle de votre progression et aspirez à de nouveaux sommets. Bonne exploration ! 🚀🎮</p>
    </div>';
    
        echo '<div style="margin-bottom: 80px;"></div>';
    
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
            echo '<div class="table-container">';
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
            echo '<div class="graph-container">';
            $this->afficherGraphiqueTypesEnnemisTues($donnees);
            echo '</div>';
            echo '</div>'; 
        }
         
        $this->boutton_profil();
    }

    public function afficherGraphiqueTypesEnnemisTues($donnees) {
        $typesEnnemis = [];
        foreach ($donnees as $ennemi) {
            $type = $ennemi['nom_ennemi'];
            if (!isset($typesEnnemis[$type])) {
                $typesEnnemis[$type] = 1;
            } else {
                $typesEnnemis[$type]++;
            }
        }
        echo '<canvas id="typesEnnemisChart" width="370" height="200"></canvas>';
        echo '<script>';
        echo 'var ctx = document.getElementById("typesEnnemisChart").getContext("2d");';
        echo 'var typesEnnemisData = ' . json_encode(array_values($typesEnnemis)) . ';';
        echo 'var labels = ' . json_encode(array_keys($typesEnnemis)) . ';';
        echo 'var chart = new Chart(ctx, {';
        echo '    type: "bar",';
        echo '    data: {';
        echo '        labels: labels,';
        echo '        datasets: [{';
        echo '            label: "Nombre d\'ennemis tués par type",';
        echo '            data: typesEnnemisData,';
        echo '            backgroundColor: "rgba(75, 192, 192, 0.2)",';
        echo '            borderColor: "rgba(75, 192, 192, 1)",';
        echo '            borderWidth: 1';
        echo '        }]';
        echo '    }';
        echo '});';
        echo '</script>';
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
            echo '<p>Nom : ' . htmlspecialchars($ami['Nom_joueur']) . '</p>';
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
            echo'<link rel="stylesheet" type="text/css" href="css/style_ami_affichage.css">';
            echo '<div class="resultats-recherche">';
            foreach ($resultats as $joueur) {
                echo '<div class="joueur">';
                echo '<span class="info-joueur"><strong>ID:</strong> ' . htmlspecialchars($joueur['id_joueur']) . '</span>';
                echo '<span class="info-joueur"><strong>Nom:</strong> ' . htmlspecialchars($joueur['Nom_joueur']) . '</span>';
                echo '<a href="index.php?module=profil&action=voir_stats_joueur&idJoueur=' . htmlspecialchars($joueur['id_joueur']) . '" class="lien-stats">Voir les statistiques</a>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo '<p>Aucun joueur trouvé.</p>';
        }
        $this->boutton_profil();
    }
    
   /* 
    public function afficherStatsJoueur($donneesEnnemisTues) {
        echo '<div class="stats-joueur">';
        echo '<h2>Ennemis Tués</h2>';
            $this->afficherTableau($donneesEnnemisTues, [ 'Nom Ennemi', 'Vie Ennemi', 'Dégat']);
         echo '</div>';
    }

    public function afficherTableaau($donnees) {
        if (empty($donnees)) {
            echo "Aucune donnée à afficher.";
            return;
        }
        $entetes = array_keys($donnees[0]);

        echo '<table class="Table Stat>';
        echo '<thead><tr>';
        foreach ($entetes as $entete) {
            echo '<th>' . htmlspecialchars($entete) . '</th>';
        }
        echo '</tr></thead>';
        echo '<tbody>';
        foreach ($donnees as $ligne) {
            echo '<tr>';
            foreach ($ligne as $cellule) {
                echo '<td>' . htmlspecialchars($cellule) . '</td>';
            }
            echo '</tr>';
        }
        echo '</tbody></table>';
    }
    public function afficherTableau($donnees) {
        echo'<link rel="stylesheet" type="text/css" href="css/style_amis_stats.css">';
        echo '<div class="stat-carte">'; 
        echo '<h3 class="titre-carte"> Ennemis Tués</h3>'; 
    
        echo '<div class="contenu-carte">'; 
        if (empty($donnees)) {
            echo "Aucune donnée à afficher.";
        } else {
            $entetes = array_keys($donnees[0]);
            echo '<table class="compact-table">';
            echo '<thead><tr>';
            foreach ($entetes as $entete) {
                echo '<th>' . htmlspecialchars($entete) . '</th>';
            }
            echo '</tr></thead>';
            echo '<tbody>';
            foreach ($donnees as $ligne) {
                echo '<tr>';
                foreach ($ligne as $cellule) {
                    echo '<td>' . htmlspecialchars($cellule) . '</td>';
                }
                echo '</tr>';
            }
            echo '</tbody></table>';
            echo '</table>';
        }
        echo '</div>'; 
        echo '</div>'; 
    }*/
    
}
?>
