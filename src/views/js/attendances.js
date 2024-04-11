// Chemin d'accès pour les requêtes AJAX
const BASE_URL = 'http://localhost:8080'; // Mettez votre URL de base ici

// Fonction pour charger les présences depuis le serveur
function loadAttendances() {
    fetch(`${BASE_URL}/attendances`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(attendances => {
            // Afficher les présences dans l'interface utilisateur
            displayAttendances(attendances);
        })
        .catch(error => console.error('Error loading attendances:', error));
}

// Fonction pour afficher les présences dans l'interface utilisateur
function displayAttendances(attendances) {
    const attendanceList = document.getElementById('attendanceList');

    // Effacer la liste actuelle des présences
    attendanceList.innerHTML = '';

    // Parcourir les présences et les ajouter à la liste
    attendances.forEach(attendance => {
        const listItem = document.createElement('li');
        listItem.textContent = `${attendance.user_name} - ${attendance.date} - ${attendance.status}`;
        attendanceList.appendChild(listItem);
    });
}

// Appeler la fonction pour charger les présences au chargement de la page
document.addEventListener('DOMContentLoaded', function () {
    loadAttendances();
});
