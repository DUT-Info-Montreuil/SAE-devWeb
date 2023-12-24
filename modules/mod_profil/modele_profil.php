<?php
require_once 'Connexion.php';
class ModeleProfil extends Connexion {

    private $connexion;

    function __construct(){
        $this->connexion = new Connexion();
        $this->connexion::initConnexion();
        $this->connexion->getBdd()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    public function recupererPartiesJoueurConnecte() {
        $donnees = [];
        if (isset($_SESSION['idUtilisateur'])) {
            $idJoueur = $_SESSION['idUtilisateur'];
            $requete = "SELECT * FROM partie WHERE id_joueur = $idJoueur";
            $resultat =  $this->connexion->getBdd()->query($requete);
    
            if ($resultat) {
                while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                    $donnees[] = $row;
                }
                return $donnees;
            } else {
                return null; // ou gérer l'erreur différemment
            }
        } else {
            return null; // ou gérer l'erreur différemment
        }
    }

    public function recupererEnnemisPartieParJoueurConnecte() {
        $donnees = [];
        if (isset($_SESSION['idUtilisateur'])) {
            $idJoueur = $_SESSION['idUtilisateur'];
            $requete = "SELECT * FROM ennemi_partie WHERE idPartie IN (SELECT idPartie FROM partie WHERE id_joueur = :idJoueur)";
            $stmt = $this->connexion->getBdd()->prepare($requete);
            $stmt->bindParam(':idJoueur', $idJoueur, PDO::PARAM_INT);
    
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $donnees[] = $row;
                }
                return $donnees;
            } else {
                return null; // Gérez l'erreur différemment si nécessaire
            }
        } else {
            return null; // Gérez l'erreur différemment si nécessaire
        }
    }

    public function recupererEnnemisTuesParJoueurConnecte() {
        $donnees = [];
        if (isset($_SESSION['idUtilisateur'])) {
            $idJoueur = $_SESSION['idUtilisateur'];
            $requete = "SELECT e.*, ep.* 
                        FROM ennemi_partie ep
                        INNER JOIN ennemi e ON ep.id_ennemi = e.id_ennemi
                        WHERE ep.idPartie IN (SELECT idPartie FROM partie WHERE id_joueur = :idJoueur) 
                        AND ep.Vie_partie = 0";
            $stmt = $this->connexion->getBdd()->prepare($requete);
            $stmt->bindParam(':idJoueur', $idJoueur, PDO::PARAM_INT);
    
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $donnees[] = $row;
                }
                return $donnees;
            } else {
                return null; // Gérez l'erreur différemment si nécessaire
            }
        } else {
            return null; // Gérez l'erreur différemment si nécessaire
        }
    }

    public function recupererToursPlaceesParJoueurConnecte() {
        $donnees = [];
        if (isset($_SESSION['idUtilisateur'])) {
            $idJoueur = $_SESSION['idUtilisateur'];
            $requete = "SELECT tp.*, t.* 
                        FROM tour_partie tp
                        INNER JOIN tour t ON tp.id_tour = t.id_tour
                        WHERE tp.idPartie IN (SELECT idPartie FROM partie WHERE id_joueur = :idJoueur)";
            $stmt = $this->connexion->getBdd()->prepare($requete);
            $stmt->bindParam(':idJoueur', $idJoueur, PDO::PARAM_INT);
    
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $donnees[] = $row;
                }
                return $donnees;
            } else {
                return null; // Gérez l'erreur différemment si nécessaire
            }
        } else {
            return null; // Gérez l'erreur différemment si nécessaire
        }
    }

    public function recupererClassementPartiesJoueurConnecte() {
        $classement = [];
    
        if (isset($_SESSION['idUtilisateur'])) {
            $idJoueur = $_SESSION['idUtilisateur'];
    
            // Sélectionnez les parties du joueur avec leur score
            $requete = "SELECT idPartie, score FROM partie WHERE id_joueur = :idJoueur";
            $stmt = $this->connexion->getBdd()->prepare($requete);
            $stmt->bindParam(':idJoueur', $idJoueur, PDO::PARAM_INT);
    
            if ($stmt->execute()) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $classement[] = $row;
                }
    
                // Triez le classement par score (du plus élevé au plus bas)
                usort($classement, function($a, $b) {
                    return $b['score'] - $a['score'];
                });
    
                // Ajoutez une colonne pour le classement
                $classementAvecClassement = [];
                $classementCounter = 1;
                foreach ($classement as $partie) {
                    $partie['classement'] = $classementCounter++;
                    $classementAvecClassement[] = $partie;
                }
    
                return $classementAvecClassement;
            } else {
                return null; // Gérez l'erreur différemment si nécessaire
            }
        } else {
            return null; // Gérez l'erreur différemment si nécessaire
        }
    }
    
    
    

}

?>
