document.querySelectorAll('.categorie-carte').forEach(function(carte) {
    carte.addEventListener('mouseenter', function() {
        this.querySelector('.carte-content').style.display = 'block';
    });
    carte.addEventListener('mouseleave', function() {
        this.querySelector('.carte-content').style.display = 'none';
    });
});
