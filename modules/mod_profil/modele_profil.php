<?php
require_once 'Connexion.php';
class ModeleProfil extends Connexion {

    // ... (autres méthodes déjà existantes)

    function getJoueurInfo($idJoueur) {
        $query = $this->getBdd()->prepare('SELECT * FROM Joueur WHERE id_joueur = :idJoueur');
        $query->execute(array(':idJoueur' => $idJoueur));
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    function getPartiesJoueur($idJoueur) {
        $query = $this->getBdd()->prepare('SELECT * FROM Partie WHERE id_joueur = :idJoueur');
        $query->execute(array(':idJoueur' => $idJoueur));
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Vous pouvez ajouter d'autres méthodes selon vos besoins
}


?>
