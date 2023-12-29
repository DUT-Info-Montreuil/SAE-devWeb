<?php
class VueCompFooter {
    private $affichage;
    
    public function __construct() {
        $this->affichage = '
        <footer>
            <div class="container">
                <div class="footer-content">
                    <div class="footer-logo">
                        <img class="footer-logo-img" src="images/titre.png" alt="Logo">
                    </div>
                    <div class="footer-links">
                        <ul>
                            <li><a href="?module=debut">Accueil</a></li>
                            <li><a href="#">Actualités</a></li>
                            <li><a href="#">Jeux</a></li>
                            <li><a href="#">Communauté</a></li>
                            <li><a href="#">Assistance</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-social">
                    <ul>
                        <li><a href="#"><img class="footer-logo-img" src="images/footer/facebook.png" alt="Facebook"></a></li>
                        <li><a href="#"><img class="footer-logo-img" src="images/footer/twitter.png" alt="Twitter"></a></li>
                        <li><a href="#"><img class="footer-logo-img" src="images/footer/instagram.png" alt="Instagram"></a></li>
                    </ul>
                </div>
            </div>
        </footer>
        ';
    }
    
    public function getAffichage() {
        return $this->affichage;
    }
}
?>