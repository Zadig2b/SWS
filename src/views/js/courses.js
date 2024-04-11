// Chemin d'accès pour les requêtes AJAX
const BASE_URL = 'http://localhost:8080'; // Mettez votre URL de base ici

// Fonction pour charger les cours depuis le serveur
function loadCourses() {
    fetch(`${BASE_URL}/courses`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(courses => {
            // Afficher les cours dans l'interface utilisateur
            displayCourses(courses);
        })
        .catch(error => console.error('Error loading courses:', error));
}

// Fonction pour afficher les cours dans l'interface utilisateur
function displayCourses(courses) {
    const courseList = document.getElementById('courseList');

    // Effacer la liste actuelle des cours
    courseList.innerHTML = '';

    // Parcourir les cours et les ajouter à la liste
    courses.forEach(course => {
        const listItem = document.createElement('li');
        listItem.textContent = `${course.name} - ${course.start_date} to ${course.end_date}`;
        courseList.appendChild(listItem);
    });
}

// Appeler la fonction pour charger les cours au chargement de la page
document.addEventListener('DOMContentLoaded', function () {
    loadCourses();
});
