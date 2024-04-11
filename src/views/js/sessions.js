// sessions.js

const BASE_URL = 'http://localhost:8080'; // URL de base de l'API

// Fonction pour vérifier la session utilisateur
function checkSession() {
    fetch(`${BASE_URL}/check-session`, {
        method: 'GET',
        credentials: 'include' // Inclure les informations de session dans la requête
    })
    .then(response => {
        if (response.ok) {
            console.log('Session active');
        } else {
            console.log('Session expirée');
            // Rediriger vers la page de connexion
            window.location.href = '/login.html';
        }
    })
    .catch(error => console.error('Erreur lors de la vérification de la session:', error));
}

// Fonction pour supprimer la session utilisateur
function logout() {
    fetch(`${BASE_URL}/logout`, {
        method: 'POST',
        credentials: 'include' // Inclure les informations de session dans la requête
    })
    .then(response => {
        if (response.ok) {
            console.log('Session déconnectée');
            // Rediriger vers la page d'accueil
            window.location.href = '/index.html';
        } else {
            console.error('Échec de la déconnexion');
        }
    })
    .catch(error => console.error('Erreur lors de la déconnexion:', error));
}

// Exemple d'utilisation:
// Vérifier la session lorsque la page est chargée
document.addEventListener('DOMContentLoaded', function() {
    checkSession();
});

// Gérer la déconnexion lorsque l'utilisateu
