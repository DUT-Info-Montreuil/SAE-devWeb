function afficherAlerte() {
    Swal.fire({
        icon: 'error', // Icône d'erreur
        title: 'Oops...',
        text: 'Les mots de passe ne correspondent pas.',
        customClass: {
            popup: 'sweetalert-popup', // Classe CSS personnalisée pour la boîte de dialogue
            title: 'sweetalert-title', // Classe CSS personnalisée pour le titre
            content: 'sweetalert-content' // Classe CSS personnalisée pour le contenu
        },
        background: '#070303', // Couleur de fond sombre
        confirmButtonColor: '#34075c', // Couleur du bouton de confirmation
        confirmButtonText: 'OK',
        iconColor: '#1c1a1a' // Couleur de l'icône d'erreur
    });
}


function verifierMotsDePasse() {
    var password = document.getElementsByName("password")[0].value;
    var passwordConfirm = document.getElementsByName("password_confirm")[0].value;

    if (password !== passwordConfirm) {
        afficherAlerte(); // Appel de la fonction d'alerte JavaScript personnalisée
        return false; // Empêche la soumission du formulaire
    }

    return true; // Permet la soumission du formulaire si les mots de passe correspondent
}
