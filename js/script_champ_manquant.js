// script.js

// Fonction pour valider le formulaire
function validateForm() {
    var loginField = document.getElementById("login");
    var passwordField = document.getElementById("password");
    var loginValue = loginField.value.trim();
    var passwordValue = passwordField.value;
    
    // Réinitialiser les messages d'erreur précédents
    clearErrorMessages();

    // Ajoutez ici votre logique de validation, par exemple, vérifiez si le champ de connexion est rempli
    if (loginValue === "") {
        showError("Veuillez entrer un nom d'utilisateur.");
        loginField.focus();
        return false; // Empêche la soumission du formulaire si la validation échoue
    }
    
    if (passwordValue.length < 10) {
        showError("Mot de passe trop court (minimum 10 caractères).");
        passwordField.focus();
        return false; // Empêche la soumission du formulaire si la validation échoue
    }
    
    // Vous pouvez ajouter d'autres validations ici
    
    return true; // Permet la soumission du formulaire si la validation réussit
}

// Fonction pour afficher un message d'erreur
function showError(errorMessage) {
    var errorDiv = document.createElement("div");
    errorDiv.className = "error-message";
    errorDiv.textContent = errorMessage;
    document.querySelector(".form-container").appendChild(errorDiv);
}

// Fonction pour effacer les messages d'erreur précédents
function clearErrorMessages() {
    var errorMessages = document.querySelectorAll(".error-message");
    errorMessages.forEach(function(element) {
        element.remove();
    });
}
