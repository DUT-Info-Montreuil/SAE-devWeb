<?php
session_start(); // Assurez-vous d'appeler session_start() au début du script

include('modele_profil.php');
include('vue_profil.php');

class ContProfil {
    
    private $modele;
    private $vue;
    private $action;

    public function __construct() {
        $this->modele = new ModeleProfil();
        $this->vue = new VueProfil();    
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'afficherProfil';  
    }

    public function afficherProfil() {
        // Vérifiez si l'utilisateur est connecté
        if (isset($_SESSION['id_joueur'])) {
            $idJoueurConnecte = $_SESSION['id_joueur'];
            $infoJoueur = $this->modele->getJoueurInfo($idJoueurConnecte);
            $partiesJoueur = $this->modele->getPartiesJoueur($idJoueurConnecte);
    
            $this->vue->afficherProfil($infoJoueur, $partiesJoueur, $_SESSION['login']);
        } else {
            // Redirigez vers la page de connexion si l'utilisateur n'est pas connecté
            header('Location: index.php?module=debut');
            exit();
        }
    }
    

    // Ajoutez d'autres méthodes si nécessaire

    public function exec() {
        switch ($this->action) {
            case 'afficherProfil':
                // Vérifier si l'utilisateur est connecté (vous devez adapter ceci à votre logique d'authentification)
                if (isset($_SESSION['id_joueur'])) {
                    // Récupérer les informations du joueur et ses parties
                    $idJoueurConnecte = $_SESSION['id_joueur'];
                    $infoJoueur = $this->modele->getJoueurInfo($idJoueurConnecte);
                    $partiesJoueur = $this->modele->getPartiesJoueur($idJoueurConnecte);
    
                    // Appeler la méthode afficherProfil de la vue avec les données récupérées
                    $this->vue->afficherProfil($infoJoueur, $partiesJoueur, $_SESSION['login']);
                } else {
                    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
                    header('Location: index.php?module=debut');
                    exit();
                }
                break;
            // Ajoutez d'autres cas pour gérer d'autres actions si nécessaire
        }
    }

}
?>
