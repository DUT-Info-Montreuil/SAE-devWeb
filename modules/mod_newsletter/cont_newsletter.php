<?php
include('modele_newsletter.php');
include('vue_newsletter.php');

class ContNewsletter {
    private $modele;
    private $vue;

    public function __construct() {
        $this->modele = new ModeleNewsletter();
        $this->vue = new VueNewsletter();
    }

    public function souscrire() {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['email'])) {
            $email = $_POST['email'];
            $message = $this->modele->souscrire($email);
            $this->vue->afficherMessage($message);
        } else {
            $this->vue->afficherForm();
        }
    }
}
?>
