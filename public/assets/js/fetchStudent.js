function fetchStudents() {
    fetch('/fetchStudents')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            console.log(response);

            return response.json();
        })
        .then(students => {
            displayStudents(students);
        })
        .catch(error => {
            console.error('Error fetching students:', error);
        });
}

function displayStudents(students) {
    // Select the student grid container
    const studentGrid = document.getElementById('student-grid');

    // Clear existing content
    studentGrid.innerHTML = '';

    // Iterate through the students and create HTML elements to display them
    students.forEach(student => {
        const studentRow = document.createElement('div');
        studentRow.classList.add('row');
        studentRow.dataset.idUtilisateur = student.Id_utilisateur;

        studentRow.innerHTML = `
            <div class="col">${student.nom}</div>
            <div class="col">${student.prénom}</div>
            <div class="col">${student.email}</div>
            <div class="col">${student.actif ? 'Yes' : 'No'}</div>
            <div class="col">${student.Id_role}</div>
            <div class="col">
                <button type="button" class="btn btn-outline-dark">Edit</button>
            </div>
        `;
        studentGrid.appendChild(studentRow);
    });
}



function fetchUsersForPromo(promoId) {
    fetch(`/fetchUsersForPromo?promoId=${promoId}`, { 
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        console.log(response);

        return response.json();
    })
    .then(data => {
        // Process the data returned from the server
        console.log(data);
        displayUsersForPromo(data);
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
    });
}
function displayUsersForPromo(users) {
    const userGrid = document.getElementById('student-grid');
    userGrid.innerHTML = '';

    users.forEach(user => {
        const userRow = document.createElement('div');
        userRow.classList.add('row');
        userRow.dataset.idUtilisateur = user.Id_utilisateur;

        userRow.innerHTML = `
            <div class="col">${user.nom}</div>
            <div class="col">${user.prénom}</div>
            <div class="col">${user.email}</div>
            <div class="col">${user.actif ? 'Yes' : 'No'}</div>
            <div class="col">${user.Id_role}</div>
            <div class="col">
                <button type="button" class="btn btn-outline-dark">Edit</button>
            </div>
        `;
        userGrid.appendChild(userRow);
    });
}


