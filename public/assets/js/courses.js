// Chemin d'accès pour les requêtes AJAX
// const BASE_URL = '/';

// Fonction pour charger les cours depuis le serveur
function loadCourses() {
  fetch(`/fetchcourse`)
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      console.log(response);
      return response.json();
    })
    .then((courses) => {
      // Afficher les cours dans l'interface utilisateur
      displayCourses(courses);
    })
    .catch((error) => console.error("Error loading courses:", error));
}

// Fonction pour afficher les cours dans l'interface utilisateur
function displayCourses(courses) {
  const courseSection = document.getElementById("course-section");

  // Effacer la liste actuelle des cours
  courseSection.innerHTML = "";

  // Parcourir les cours et créez des éléments HTML
  courses.forEach((course) => {
    const subCard = document.createElement("div");
    subCard.classList.add("sub-card");
    // Créer le conteneur de cartes de cours
    const courseCard = document.createElement("div");
    courseCard.classList.add("course-card");

    // Créer le conteneur de première ligne
    const firstLine = document.createElement("div");
    firstLine.classList.add("first-line");

    // Extraire la partie horaire de la date de début et de fin
    const startDate = new Date(course.date_début);
    const endDate = new Date(course.date_fin);
    const startHour = startDate.toLocaleTimeString([], {
      hour: "2-digit",
      minute: "2-digit",
    });
    const endHour = endDate.toLocaleTimeString([], {
      hour: "2-digit",
      minute: "2-digit",
    });

    // Créez l'élément de titre pour le nom et l'heure du cours
    const heading = document.createElement("h2");
    heading.textContent = `${course.nom} - ${startHour} à ${endHour}`;

    // Create the paragraph element for date (without hours)
    const dateParagraph = document.createElement("p");
    const options = { year: "numeric", month: "long", day: "numeric" };
    dateParagraph.textContent = startDate.toLocaleDateString(
      undefined,
      options
    );

    // Ajouter le titre et la date au conteneur de première ligne
    firstLine.appendChild(heading);
    firstLine.appendChild(dateParagraph);

    // Créer l'élément de paragraphe pour le nombre de participants
    const participantsParagraph = document.createElement("p");
    participantsParagraph.textContent = `Nombre de participants: ${course.participants}`;

    // bouton pour le statut de signature
    const statusButton = document.createElement("button");
    statusButton.setAttribute("type", "button");
    statusButton.classList.add("btn");

//Définit l'ID du cours comme attribut de données sur le bouton    
statusButton.dataset.courseId = course.Id_cours;

    // Définir différents textes et styles de boutons en fonction de l'état de la signature
    if (!course.code) {
      statusButton.classList.add("btn-primary");
      statusButton.textContent = "Valider Présence";
    } else {
      const allSigned = ""; /* Ajouter une logique pour vérifier si tous les étudiants ont signé*/
      statusButton.classList.add(allSigned ? "btn-success" : "btn-warning");
      statusButton.textContent = allSigned
        ? "Signature recueillies"
        : "Signatures en cours";
    }

    // Joindre tous les éléments à la fiche de cours
    courseCard.appendChild(firstLine);
    courseCard.appendChild(participantsParagraph);
    courseCard.appendChild(statusButton);

    // Joindre la fiche de cours à la section cours
    courseSection.appendChild(courseCard);
  });
}

// Appeler la fonction pour charger les cours au chargement de la page
document.addEventListener("DOMContentLoaded", function () {
  loadCourses();
});



function addCourse() {
  const name = document.getElementById("name").value;
  const startDate = document.getElementById("startDate").value;
  const endDate = document.getElementById("endDate").value;

  const data = {
    name: name,
    start_date: startDate,
    end_date: endDate,
  };

  fetch(`${BASE_URL}/courses`, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.json();
    })
    .then((course) => {
      // Ajouter le nouveau cours à la liste
      displayCourses([course]);
    })
    .catch((error) => console.error("Error adding course:", error));
}
