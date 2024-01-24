document.addEventListener('DOMContentLoaded', (event) => {
    // Code pour slider de témoignages
    let currentSlide = 0;
    const slides = document.querySelectorAll('.testimonial-slide');
    
    function showSlide(index) {
        slides.forEach((slide) => {
            slide.style.display = 'none';
        });
        slides[index].style.display = 'block';
    }

    showSlide(currentSlide);

    // Code pour validation de formulaire de newsletter
    const newsletterForm = document.getElementById('newsletter-form');
    newsletterForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const emailInput = document.getElementById('email-input');
        if (emailInput.value === '') {
            alert('Veuillez entrer une adresse e-mail.');
            return false;
        }
        // Ici, vous pouvez ajouter l'appel à votre backend pour enregistrer l'email
        alert('Merci pour votre abonnement !');
        emailInput.value = ''; // Réinitialiser le champ après l'envoi
        return true;
    });
});
