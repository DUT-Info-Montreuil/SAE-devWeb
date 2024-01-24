<?php
include('modele_ami.php');
include('vue_ami.php');

class ContAmi {

    private $vue;
    private $action;
    private $modele;

     function __construct() {
        $this->vue = new VueAmi(); 
        $this->modele = new ModeleAmi();
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'ami';  
    }

    public function exec() {
        switch ($this->action) {
         
            case 'ami':
                $ami = $this->modele->recupererami();
                $this->vue->afficherami($ami);
                break;
        }
    }
    

}

?>