<?php
require_once 'vue_generique.php';

class VueParametre extends VueGenerique {

    public function form_modification(){
      
        echo '<link rel="stylesheet" type="text/css" href="css/style_parametre.css">';
        echo '<div class="animated-background"></div>';

        //echo'<div id="erreurMessage" style="color: red;"></div>';

        //echo'<script src="js/script_click_parametre.js"></script>';

        echo '<section class="container1">';
        echo '<header>Modifier vos paramètres ici :</header>';
        echo '<form  id="votreFormulaire" class="form" action="index.php?module=parametre&action=modifier" method="POST" enctype="multipart/form-data" onsubmit="return verifierMotsDePasse();">';
        echo '<input type="hidden" name="csrf_token" value="' . $_SESSION['csrf_token'] . '">'; 
        echo '<div class="profil-image-preview">';
       // echo '<div class="profil-image-preview">';

        if (!empty($_SESSION['profil_image'])) {
            echo '<div class="profile-image-container">';
            echo '<img src="' . $_SESSION['profil_image'] . '" alt="Image de profil">';
            echo '<label for="profil_image" class="profil-image-upload-button">+</label>';
            echo '<input id="profil_image" type="file" name="profil_image" accept="image/*" style="display: none;" />';
            echo '</div>';
        } else {
            echo '<label for="profil_image" class="profil-image-upload-button">';
            echo '<img src="" alt="">';
            echo ' + </label>';
            echo '<input id="profil_image" type="file" name="profil_image" accept="image/*" style="display: none;" />';
        }
        
        echo '</div>';

        echo '<div class="input-box">';
        echo '<label for="login">Nom d\'utilisateur</label>';
        echo '<input id="login" type="text" name="login" placeholder="Nom d\'utilisateur" value="'.$_SESSION['login'].'" required>';
        echo '</div>';

        echo '<div class="input-box">';
        echo '<label for="email">Adresse e-mail</label>';
        echo '<input id="email" type="email" name="email" placeholder="Adresse e-mail" value="'.$_SESSION['email'].'" required>';
        echo '</div>';

        echo '<div class="input-box">';
        echo '<label for="ancienPassword">Ancien Mot de passe</label>';
        echo '<input id="ancienPassword" type="password" name="ancienPassword" placeholder="Mot de passe" required>';
        echo '</div>';

        echo '<div class="input-box">';
        echo '<label for="newPassword">Nouveau Mot de passe</label>';
        echo '<input id="newPassword" type="password" name="newPassword" placeholder="Mot de passe" required>';
        echo '</div>';

        echo '<div class="input-box">';
        echo '<label for="password_confirm">Confirmer le mot de passe</label>';
        echo '<input id="password_confirm" type="password" name="password_confirm" required placeholder="Confirmer le mot de passe" />';
        echo '</div>';

       

        echo '<button class="submit" type="submit">Modifier</button>';
        echo '</form>';
        echo '</section>';
    }
}
?>
