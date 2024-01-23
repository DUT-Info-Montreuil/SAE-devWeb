<?php
require_once 'vue_generique.php';

class VueConnexions extends VueGenerique {

    public function form_connexion($login = null, $errorMessage = "") {
        echo '<link rel="stylesheet" type="text/css" href="css/style_connexion.css">';
        echo '<div class="animated-background"></div>';

        // Bloc de message de bienvenue
        echo '<div class="welcome-message">';
        echo '<p>"Chaque grand voyage commence par un petit pas."</p>';
        echo '</div>';
        echo '<h3>Bienvenue de retour, aventurier !</h3>';

        if (!empty($errorMessage)) {
            echo '<p class="error-message">' . $errorMessage . '</p>';
        }

        if ($login) {
            echo '<p>Vous êtes déjà connecté en tant que ' . htmlspecialchars($login) . '.</p>';
        } else {
            echo '<div class="form-container">';
            echo '<form class="container" action="index.php?module=connexion&action=connexion" method="POST" onsubmit="return validateForm();">';
            echo '<div class="input-container">';
            echo '<div class="input-content">';
            echo '<div class="input-dist">';
            echo '<div class="input-type">';
            echo '<input class="input-is" type="text" id="login" name="login" required placeholder="Nom d\'utilisateur" />';
            echo '<input class="input-is" type="password" id="password" name="password" required placeholder="Mot de Passe" />';

            echo '<button class="submit" type="submit">Connexion</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</form>';

            echo '<p>Pour créer un compte, <a href="index.php?module=inscription&action=inscription">cliquer ici</a></p>';
            echo '</div>';
             echo '<script>
                function validateForm() {
                    var loginField = document.getElementById("login");
                    var passwordField = document.getElementById("password");
                    var loginValue = loginField.value.trim();
                    var passwordValue = passwordField.value;

                    if (loginValue === "") {
                        showError("Veuillez entrer un nom d\'utilisateur.");
                        loginField.focus();
                        return false;
                    }

                    if (passwordValue.length < 10) {
                        showError("Mot de passe trop court (minimum 10 caractères).");
                        passwordField.focus();
                        return false;
                    }

                    return true;
                }

                function showError(errorMessage) {
                    var errorDiv = document.createElement("div");
                    errorDiv.className = "error-message";
                    errorDiv.textContent = errorMessage;
                    document.querySelector(".form-container").appendChild(errorDiv);
                }
            </script>';
        }
    }
}
?>
