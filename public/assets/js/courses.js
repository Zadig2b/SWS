// Chemin d'accès pour les requêtes AJAX
const BASE_URL = '/'; // Mettez votre URL de base ici

// Fonction pour charger les cours depuis le serveur
function loadCourses() {
    fetch(`/testhome/fetchcourse`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            console.log(response);
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
    const courseSection = document.getElementById('course-section');

    // Clear the current list of courses
    courseSection.innerHTML = '';

    // Loop through the courses and create HTML elements
    courses.forEach(course => {

        const subCard = document.createElement('div');
        subCard.classList.add('sub-card');
        // Create the course card container
        const courseCard = document.createElement('div');
        courseCard.classList.add('course-card');

        // Create the first line container
        const firstLine = document.createElement('div');
        firstLine.classList.add('first-line');
        
        // Extract hour part from start and end date
        const startDate = new Date(course.date_début);
        const endDate = new Date(course.date_fin);
        const startHour = startDate.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        const endHour = endDate.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

        // Create the heading element for promo name and time
        const heading = document.createElement('h2');
        heading.textContent = `${course.promo_nom} - ${startHour} à ${endHour}`;

        // Create the paragraph element for date (without hours)
        const dateParagraph = document.createElement('p');
        const options = { year: 'numeric', month: 'long', day: 'numeric' };
        dateParagraph.textContent = startDate.toLocaleDateString(undefined, options);

        // Append heading and date to the first line container
        firstLine.appendChild(heading);
        firstLine.appendChild(dateParagraph);

        // Create the paragraph element for number of participants
        const participantsParagraph = document.createElement('p');
        participantsParagraph.textContent = `Nombre de participants: ${course.nb_participants}`;

        // Create the button element for signature status
        const statusButton = document.createElement('button');
        statusButton.setAttribute('type', 'button');
        statusButton.classList.add('btn', 'btn-warning');
        statusButton.textContent = 'Statut de signature';

        // Append all elements to the course card
        courseCard.appendChild(firstLine);
        courseCard.appendChild(participantsParagraph);
        courseCard.appendChild(statusButton);

        // Append the course card to the course section
        courseSection.appendChild(courseCard);

    });
}



// Appeler la fonction pour charger les cours au chargement de la page
document.addEventListener('DOMContentLoaded', function () {
    loadCourses();
});


function reloadCSS() {
    // Get all <link> elements with rel="stylesheet"
    const links = document.querySelectorAll('link[rel="stylesheet"]');
    
    // Loop through each <link> element
    links.forEach(link => {
        // Get the href attribute value
        const href = link.getAttribute('href');
        
        // Add a timestamp query parameter to force the browser to reload the stylesheet
        const timestamp = new Date().getTime();
        const newHref = href + '?t=' + timestamp;
        
        // Set the new href value to trigger the reload
        link.setAttribute('href', newHref);
        console.log('reload css called');
    });
}




function addCourse() {
    const name = document.getElementById('name').value;
    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;

    const data = {
        name: name,
        start_date: startDate,
        end_date: endDate
    };

    fetch(`${BASE_URL}/courses`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(course => {
            // Ajouter le nouveau cours à la liste
            displayCourses([course]);
        })
        .catch(error => console.error('Error adding course:', error));
}


