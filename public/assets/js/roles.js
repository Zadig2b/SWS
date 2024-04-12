// Fonction pour charger le tableau de bord en fonction du rôle de l'utilisateur
function loadDashboard(role) {
    // Vérifier le rôle de l'utilisateur
    if (role === 'formateur') {
        // Charger le tableau de bord du formateur
        fetch('backend.php?action=loadFormateurDashboard')
            .then(response => response.json())
            .then(data => {
                // Mettre à jour l'interface utilisateur avec les données du tableau de bord du formateur
            })
            .catch(error => console.error('Error loading formateur dashboard:', error));
    } else if (role === 'apprenant') {
        // Charger le tableau de bord de l'apprenant
        fetch('backend.php?action=loadApprenantDashboard')
            .then(response => response.json())
            .then(data => {
                // Mettre à jour l'interface utilisateur avec les données du tableau de bord de l'apprenant
            })
            .catch(error => console.error('Error loading apprenant dashboard:', error));
    } else {
        console.error('Invalid role:', role);
    }
}

// Fonction pour vérifier les autorisations d'accès avant de charger le tableau de bord
function checkAccess() {
    // Vérifier l'authentification de l'utilisateur
    fetch('backend.php?action=checkAuthentication')
        .then(response => response.json())
        .then(data => {
            if (data.authenticated) {
                // Utilisateur authentifié, charger le tableau de bord en fonction de son rôle
                loadDashboard(data.role);
            } else {
                // Rediriger vers la page de connexion
                window.location.href = 'login.php';
            }
        })
        .catch(error => console.error('Error checking access:', error));
}

// Charger le tableau de bord lors du chargement de la page
document.addEventListener('DOMContentLoaded', checkAccess);
