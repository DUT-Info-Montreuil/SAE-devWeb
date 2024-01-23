// Fonction pour valider le formulaire d'inscription
function validateInscriptionForm() {
    var loginField = document.getElementById("login");
    var emailField = document.getElementById("email");
    var passwordField = document.getElementById("password");
    var confirmPasswordField = document.getElementById("password_confirm");

    var loginValue = loginField.value.trim();
    var emailValue = emailField.value.trim();
    var passwordValue = passwordField.value;
    var confirmPasswordValue = confirmPasswordField.value;

    // Réinitialiser les messages d'erreur précédents
    clearErrorMessages();

    // Vérifier le nom d'utilisateur
    if (loginValue === "") {
        showError(loginField, "Veuillez entrer un nom d'utilisateur.");
        return false;
    }

    // Vérifier l'email
    if (emailValue === "" || !validateEmail(emailValue)) {
        showError(emailField, "Veuillez entrer une adresse e-mail valide.");
        return false;
    }

    // Vérifier la longueur du mot de passe
    if (passwordValue.length < 10) {
        showError(passwordField, "Le mot de passe doit comporter au moins 10 caractères.");
        return false;
    }

    // Vérifier la correspondance des mots de passe
    if (passwordValue !== confirmPasswordValue) {
        showError(confirmPasswordField, "Les mots de passe ne correspondent pas.");
        return false;
    }

    return true;
}

// Fonction pour afficher un message d'erreur
function showError(inputField, errorMessage) {
    var errorDiv = document.createElement("div");
    errorDiv.className = "error-message";
    errorDiv.textContent = errorMessage;
    inputField.parentNode.appendChild(errorDiv);
}

// Fonction pour effacer les messages d'erreur précédents
function clearErrorMessages() {
    var errorMessages = document.querySelectorAll(".error-message");
    errorMessages.forEach(function(element) {
        element.remove();
    });
}

// Fonction pour valider l'adresse e-mail
function validateEmail(email) {
    var re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    return re.test(email);
}
