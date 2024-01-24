<?php

class VueNewsletter {

    // Méthode pour afficher le formulaire d'abonnement à la newsletter
    public function afficherForm() {
        echo '<div class="newsletter-container">
                <form action="index.php?module=newsletter&action=souscrire" method="post" class="newsletter-form">
                    <input type="email" name="email" placeholder="Entrez votre email" required>
                    <button type="submit" class="newsletter-submit">S\'abonner</button>
                </form>
              </div>';
    }

    // Méthode pour afficher les messages de retour (succès ou erreur)
    public function afficherMessage($message) {
        echo '<div class="newsletter-message">' . htmlspecialchars($message) . '</div>';
    }
}
