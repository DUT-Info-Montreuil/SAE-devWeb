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
    
/* PROFIL PARTIEE */
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
            $this->afficherGraphiquePartiesSimplifie($donnees);
            echo '</div>'; 

           
        } 
    }
    
    public function afficherGraphiquePartiesSimplifie($donnees) {
        echo '<canvas id="partiesChart" width="200" height="200"></canvas>';
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
    
        //$this->boutton_profil();
    }
      
/* PROFIL ENNEMIS */
    public function afficherTableauEnnemisPartie($donnees) {
        echo '<link rel="stylesheet" type="text/css" href="css/style_profil_tableau.css">';
        
        if ($donnees) {
            echo '<div class="parties-container">';
            // Afficher le tableau
            echo '<div class="table-container">';
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
            echo '</tbody></table>';
            echo '</div>'; // Fin de la table-container
    
            // Afficher le graphique
            $this->afficherGraphiqueEnnemisPartie($donnees);
    
            echo '</div>'; // Fin de la parties-container
        } else {
            echo "Aucun ennemi tué trouvé pour le joueur connecté.";
        }
    
        //$this->boutton_profil();
    }
    
    public function afficherGraphiqueEnnemisPartie($donnees) {
        // Filtrer les ennemis morts et vivants
        $ennemisMorts = array_filter($donnees, function ($ennemi) {
            return $ennemi['Vie_partie'] <= 0;
        });
    
        $ennemisVivants = array_filter($donnees, function ($ennemi) {
            return $ennemi['Vie_partie'] > 0;
        });
    
        // Nombre d'ennemis morts et vivants
        $nombreEnnemisMorts = count($ennemisMorts);
        $nombreEnnemisVivants = count($ennemisVivants);
    
        echo '<canvas id="ennemisChart" width="200" height="200"></canvas>';
        echo '<script>';
        echo 'var ctx = document.getElementById("ennemisChart").getContext("2d");';
        echo 'var ennemisData = {';
        echo '    morts: ' . $nombreEnnemisMorts . ',';
        echo '    vivants: ' . $nombreEnnemisVivants;
        echo '};';
        echo 'var chart = new Chart(ctx, {';
        echo '    type: "bar",';
        echo '    data: {';
        echo '        labels: ["Ennemis Morts", "Ennemis Vivants"],';
        echo '        datasets: [{';
        echo '            label: "Nombre d\'ennemis",';
        echo '            data: [ennemisData.morts, ennemisData.vivants],';
        echo '            backgroundColor: ["rgba(255, 99, 132, 0.2)", "rgba(75, 192, 192, 0.2)"],';
        echo '            borderColor: ["rgba(255, 99, 132, 1)", "rgba(75, 192, 192, 1)"],';
        echo '            borderWidth: 1';
        echo '        }]';
        echo '    }';
        echo '});';
        echo '</script>';
    }
    
    public function afficherExplicationEnnemisPartie() {
        echo '<link rel="stylesheet" type="text/css" href="css/style_profil.css">';
        echo '<div class="explication-tableau">
            <h2>Graphique d\'Ennemis</h2>
            <p>Bienvenue sur votre tableau des ennemis tués, un récapitulatif visuel de votre performance dans le jeu. Ce tableau présente des détails sur chaque ennemi que vous avez éliminé au cours des parties, accompagné d\'un graphique pour une vue d\'ensemble.</p>
            <p><strong>Comment lire le tableau :</strong></p>
            <ul>
                <li><strong>ID Ennemi :</strong> Identifiant unique de chaque ennemi.</li>
                <li><strong>ID Partie :</strong> Identifiant unique de la partie où l\'ennemi a été tué.</li>
                <li><strong>Vie Partie :</strong> La vie totale de la partie.</li>
                <li><strong>Position X et Y :</strong> La position où l\'ennemi a été tué.</li>
            </ul>
            <p>Explorez ce tableau interactif pour analyser vos performances contre chaque ennemi spécifique et comprenez les tendances générales.</p>
            <p>Le graphique à côté offre une visualisation plus complète des ennemis tués, vous permettant de comparer différentes parties et de suivre votre évolution. 🚀🎮</p>
        </div>';
    
        echo '<div style="margin-bottom: 80px;"></div>';
    
        // $this->boutton_profil();
    }    

    /* PROFIL ENNEMIS TUEES */
    public function afficherTableauEnnemisTues($donnees) {
        echo '<link rel="stylesheet" type="text/css" href="css/style_profil_tableau.css">';
        if ($donnees) {
            echo '<div class="parties-container">';
            echo '<div class="table-container">';
            echo '<table class="styled-table">';
            echo '<thead><tr><th>ID Ennemi</th><th>Nom Ennemi</th><th>Vie Ennemi</th><th>Dégat</th><th>Portée</th><th>Contourner Mur</th><th>Récompense</th><th>ID Partie</th></tr></thead>';
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
                echo '</tr>';
            }
            echo '</tbody></table></div>';
            echo '<div class="graph-container">';
            $this->afficherGraphiqueTypesEnnemisTues($donnees);
            echo '</div>';
            echo '</div>'; 
        }
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
        echo '<canvas id="typesEnnemisChart" width="300" height="200"></canvas>';
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
    
    public function afficherExplicationEnnemisTues() {
        echo '<link rel="stylesheet" type="text/css" href="css/style_profil.css">';
        echo '<div class="explication-tableau">
            <h2>Graphique d\'Ennemis Tués</h2>
            <p>Bienvenue sur votre tableau des ennemis tués, un récapitulatif visuel de votre performance dans le jeu. Ce tableau présente des détails sur chaque ennemi que vous avez éliminé au cours des parties.</p>
            <p><strong>Comment lire le tableau :</strong></p>
            <ul>
                <li><strong>ID Ennemi :</strong> Identifiant unique de chaque ennemi.</li>
                <li><strong>Nom Ennemi :</strong> Le nom de l\'ennemi éliminé.</li>
                <li><strong>Vie Ennemi :</strong> La vie de l\'ennemi.</li>
                <li><strong>Dégât :</strong> Les dégâts infligés par l\'ennemi.</li>
                <li><strong>Portée :</strong> La portée de l\'ennemi.</li>
                <li><strong>Récompense :</strong> La récompense obtenue en éliminant cet ennemi.</li>
                <li><strong>ID Partie :</strong> Identifiant unique de la partie où l\'ennemi a été tué.</li>
            </ul>
            <p>Explorez ce tableau interactif pour analyser vos tactiques, découvrir vos ennemis les plus redoutables, et améliorer votre stratégie au fil du temps.</p>
            <p>Continuez à affiner vos compétences et devenez le maître du champ de bataille ! 🚀🎮</p>
        </div>';
    
        echo '<div style="margin-bottom: 80px;"></div>';
    
      //  $this->boutton_profil();
    }
    
/* PROFIL TOURS */
    public function afficherTableauToursPlacees($donnees) {
        echo '<link rel="stylesheet" type="text/css" href="css/style_profil_tableau.css">';
    
        if ($donnees) {
            echo '<div class="parties-container">';
            // Afficher le tableau
            echo '<div class="table-container">';
            echo '<table class="styled-table">';
            echo '<thead><tr><th>ID Tour Placée</th><th>ID Partie</th><th>Vie Partie</th><th>Position X</th><th>Position Y</th><th>Nom Tour</th><th>Vie Tour</th></tr></thead>';
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
                echo '</tr>';
            }
            echo '</tbody></table>';
            echo '</div>'; // Fin de la table-container
    
            // Afficher le graphique
            $this->afficherGraphiqueToursPlacees($donnees);
    
            echo '</div>'; // Fin de la parties-container
        } else {
            echo "Aucune tour placée trouvée pour le joueur connecté.";
        }
   
    }

    public function afficherGraphiqueToursPlacees($donnees) {
        echo '<canvas id="toursChart" width="200" height="200"></canvas>';
        echo '<script>';
        echo 'var ctx = document.getElementById("toursChart").getContext("2d");';
        echo 'var toursData = ' . json_encode($donnees) . ';';
        echo 'var labels = toursData.map(function(tour) { return tour.nom_tour; });';
        echo 'var vies = toursData.map(function(tour) { return tour.vie; });';
        echo 'var chart = new Chart(ctx, {';
        echo '    type: "bar",';
        echo '    data: {';
        echo '        labels: labels,';
        echo '        datasets: [{';
        echo '            label: "Vie des Tours",';
        echo '            data: vies,';
        echo '            backgroundColor: "rgba(75, 192, 192, 0.2)",';
        echo '            borderColor: "rgba(75, 192, 192, 1)",';
        echo '            borderWidth: 1';
        echo '        }]';
        echo '    }';
        echo '});';
        echo '</script>';
    }
    
    public function afficherExplicationToursPlacees() {
        echo '<link rel="stylesheet" type="text/css" href="css/style_profil.css">';
        echo '<div class="explication-tableau">
            <h2>Graphique des Tours Placées</h2>
            <p>Bienvenue sur votre tableau des tours placées, un récapitulatif visuel de votre performance dans la construction de tours. Ce tableau présente des détails sur chaque tour que vous avez placée au cours des parties.</p>
            <p><strong>Comment lire le tableau :</strong></p>
            <ul>
                <li><strong>ID Partie :</strong> Identifiant unique de la partie où la tour a été placée.</li>
                <li><strong>Vie Partie :</strong> La vie totale de la partie.</li>
                <li><strong>Nom Tour :</strong> Le nom de la tour placée.</li>
                <li><strong>Vie Tour :</strong> La vie de la tour.</li>
            </ul>
            <p>Explorez ce tableau interactif pour analyser vos choix de construction, améliorer vos stratégies, et devenir un maître de la défense ! 🚀🎮</p>
        </div>';
    
        echo '<div style="margin-bottom: 80px;"></div>';
    
        //$this->boutton_profil();
    }
    
    /* PROFIL CLASSEMENT */
    public function afficherClassementParties($classement) {
        echo '<link rel="stylesheet" type="text/css" href="css/style_profil_tableau.css">';
    
        if ($classement) {
            echo '<div class="parties-container">';
            
            // Affichage du tableau de classement
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
            echo '</tbody></table>';
            
            // Affichage du graphique
            $this->afficherGraphiqueClassementParties($classement);
            
            echo '</div>';
        } else {
            echo "Aucune partie trouvée pour le joueur connecté.";
        }

    }
    public function afficherGraphiqueClassementParties($classement) {
        echo '<canvas id="classementChart" width="200" height="200"></canvas>';
        echo '<script>';
        echo 'var ctx = document.getElementById("classementChart").getContext("2d");';
        echo 'var classementData = ' . json_encode($classement) . ';';
        echo 'var labels = classementData.map(function(partie) { return partie.idPartie; });';
        echo 'var scores = classementData.map(function(partie) { return partie.score; });';
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

    public function afficherExplicationClassement() {
        echo '<link rel="stylesheet" type="text/css" href="css/style_profil.css">';
        echo' <div class="explication-tableau">
            <h2>Graphique de Classement</h2>
            <p>Bienvenue sur votre tableau de classement, une représentation visuelle de votre performance par rapport à d\'autres parties. Ce graphique présente un résumé des classements obtenus au fil des parties.</p>
            <p><strong>Comment lire le tableau :</strong></p>
            <ul>
                <li><strong>ID Partie :</strong> Identifiant unique de chaque partie enregistrée.</li>
                <li><strong>Classement :</strong> Votre position dans le classement pour cette partie.</li>
                <li><strong>Score :</strong> Le score total obtenu dans cette partie.</li>
            </ul>
            <p>Explorez ce tableau interactif pour analyser les tendances, repérer les performances exceptionnelles, et suivre l\'évolution de votre classement au fil du temps.</p>
            <p>Prenez le contrôle de votre position et aspirez à atteindre le sommet du classement. Bonne compétition ! 🚀🏆</p>
        </div>';
        
        echo '<div style="margin-bottom: 80px;"></div>';
        
       // $this->boutton_profil();
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
       // $this->boutton_profil();
    }
    
}
?>
