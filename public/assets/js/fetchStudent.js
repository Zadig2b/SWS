function fetchStudents() {
    fetch('/testhome/fetchStudents')
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

