<?php

class Site {

    private $module_name;
    private $module;
    
    public function __construct() {
        // Ajustez le module par défaut selon vos besoins
        $this->module_name = isset($_GET['module']) ? $_GET['module'] : "debut"; 

        switch ($this->module_name) {
            case "connexion":
    
                require_once "modules/mod_connexion/mod_connexion.php";
                break;
            case "inscription":
                require_once "modules/mod_inscription/mod_inscription.php";
                break;
            case "debut":
                require_once "modules/mod_debut/mod_debut.php";
                break;
            case "profil":
                require_once "modules/mod_profil/mod_profil.php";
            break;   

            default:
                die("Module inexistant");
        }
    }

    public function exec_module() {
        $module_class = "Mod" . ucfirst($this->module_name);
        $this->module = new $module_class();
        $this->module->exec();
    }

    public function get_module() {
        return $this->module;
    }
}
