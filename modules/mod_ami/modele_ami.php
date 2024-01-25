<?php
require_once 'Connexion.php';
class ModeleAmi extends Connexion {
    private $connexion;

    function __construct(){
        $this->connexion = new Connexion();
        $this->connexion::initConnexion();
        $this->connexion->getBdd()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function recupererami() {
        $ami = [];
        try {
            $requete = $this->connexion->getBdd()->prepare("SELECT * FROM amis");
            $requete->execute();
            $ami = $requete->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $null;
        }
        return $ami;
    }
    

}

?>
