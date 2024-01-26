<?php
include('modele_connexion.php');
include('vue_connexion.php');

class ContConnexions {

    private $modele;
    private $vue;
    private $action;

    public function __construct() {
        $this->modele = new ModeleConnexions();
        $this->vue = new VueConnexions();
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'formulaire';
    }

    public function seConnecter() {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $_SESSION['email'] = $email;
            list($verifie, $idUtilisateur, $login,  $logo) = $this->modele->verifierUtilisateur($email, $password);
            if ($verifie) {
                $_SESSION['idUtilisateur'] = $idUtilisateur;
                $_SESSION['login'] = $login;
                $_SESSION['profil_image'] = $logo;
                header('Location: index.php?module=debut');
                exit();
            } else {
                $this->vue->form_connexion();
            }
        } else {
?>
            <script>alert('<?php echo addslashes("Erreur lors de la connexion!"); ?>');</script>
<?php
        }
    }

    public function seDeconnecter() {
        session_unset();
        session_destroy();
        header('Location: index.php?module=debut');
        exit();
    }

    public function exec() {
        switch ($this->action) {
            case 'formulaire':
                if (isset($_SESSION['email'])) {
                    $this->vue->form_connexion($_SESSION['email']);
                } else {
                    $this->vue->form_connexion();
                }
                break;
            case 'connexion':
                $this->seConnecter();
                break;
            case 'deconnexion':
                $this->seDeconnecter();
                break;
        }
    }
}
?>
