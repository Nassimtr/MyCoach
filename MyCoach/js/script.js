    document.addEventListener('DOMContentLoaded', (event) => {
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            const pseudo = document.getElementById('pseudo').value.trim();
            const mdp = document.getElementById('mdp').value.trim();

            let message = '';
            if (!pseudo) {
                message += 'Pseudo manquant. ';
            }
            if (!mdp) {
                message += 'Mot de passe manquant.';
            }

            if (message) {
                e.preventDefault(); // Empêche l'envoi du formulaire
                alert(message); // Affiche le message d'erreur
            }
        });
    });
