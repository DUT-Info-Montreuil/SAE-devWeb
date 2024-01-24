document.addEventListener('DOMContentLoaded', function() {
    // Sélection du formulaire par sa classe ou son id
    var form = document.querySelector('.newsletter-form');

    form.addEventListener('submit', function(e) {
        e.preventDefault(); // Empêche la soumission classique du formulaire
        
        // Créez un FormData basé sur le formulaire existant
        var formData = new FormData(form);

        // Exécutez la requête AJAX vers votre script PHP de traitement de la newsletter
        fetch('path/to/your/newsletter_signup.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text()) // ou response.json() si vous renvoyez du JSON
        .then(data => {
            // Ici, 'data' contient la réponse de votre script PHP
            // Vous pouvez maintenant mettre à jour l'interface utilisateur en conséquence
            // Par exemple, afficher un message de confirmation ou d'erreur
            alert(data); // ou mettez à jour le contenu HTML selon vos besoins
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    });
});
