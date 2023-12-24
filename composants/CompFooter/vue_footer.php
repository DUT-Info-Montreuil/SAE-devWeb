<?php
class VueCompFooter {
	private $affichage;
	public function __construct() {
		$this->affichage ='<p>Informations de contact : <a href="mailto:ylehongcheffson@iut.univ-paris8.fr">ylehongcheffson@iut.univ-paris8.fr</a></p>';
		$this->affichage .='<p>Informations légales </p>';
	}
	public function getAffichage() {
        return $this->affichage;
    }

}
