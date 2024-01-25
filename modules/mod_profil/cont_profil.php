<?php
include('modele_profil.php');
include('vue_profil.php');

class ContProfil {
    
    private $modele;
    private $vue;
    private $action;

    public function __construct() {
        $this->modele = new ModeleProfil();
        $this->vue = new VueProfil();    
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'profil';  
    }

    public function exec() {
        switch ($this->action) {
            case 'profil':
                $this->vue->afficherCartes();
            break;
            case 'partie':
                $donnees = $this->modele->recupererPartiesJoueurConnecte();
                $this->vue->afficherTableauParties($donnees);
                $this->vue->afficherExplicationTableau();
            break;
            case 'ennemis_tues':
                $donnees = $this->modele->recupererEnnemisTuesParJoueurConnecte();
                $this->vue->afficherTableauEnnemisTues($donnees);
                $this->vue->afficherExplicationEnnemisTues();
            break;
            case 'ennemis_partie':
                $donnees = $this->modele->recupererEnnemisPartieParJoueurConnecte();
                $this->vue->afficherTableauEnnemisPartie($donnees);
                $this->vue->afficherExplicationEnnemisPartie();
            break;
            case 'tours':
                $donnees = $this->modele->recupererToursPlaceesParJoueurConnecte();
                $this->vue->afficherTableauToursPlacees($donnees);
                $this->vue->afficherExplicationToursPlacees();
            break;
            case 'classement':
                $donnees = $this->modele->recupererClassementPartiesJoueurConnecte();
                $this->vue->afficherClassementParties($donnees);
                $this->vue->afficherExplicationClassement();
            break;
            case 'ami':
                $donneesAmis = $this->modele->recupererAmisJoueurConnecte();
                $this->vue->afficherResultatsRecherche($donneesAmis);
            break;
            case 'rechercher':
                if (isset($_POST['recherche'])) {
                    $recherche = $_POST['recherche'];
                    $resultats = $this->modele->rechercherJoueur($recherche);
                    $this->vue->afficherResultatsRecherche($resultats);
                }
            break;
            case 'voir_stats_joueur':
                if (isset($_GET['idJoueur'])) {
                    $idJoueur = $_GET['idJoueur'];
                    $donneesEnnemisTues = $this->modele->AmiRecupererEnnemisTues($idJoueur);
                    $this->vue->afficherTableauEnnemisTues($donneesEnnemisTues);
                }
                break;

            
        }
    }

}

?>
