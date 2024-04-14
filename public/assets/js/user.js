function submitRegistration() {
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirmPassword').value;

    // Check if passwords match
    if (password !== confirmPassword) {
        alert('Les mots de passe ne correspondent pas.');
        return;
    }
    sendPsw(password)
}

function sendPsw(password) {
    // Data to be sent in the request
    var data = {
        password: password
    };

    // Fetch options
    var options = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    };

    // Replace 'your-server-endpoint' with the actual endpoint where you want to send the data
    var url = '/cregistration/sendPsw';

    // Send the request
    fetch(url, options)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            // Handle success response here
            console.log('Password sent successfully.');
            // Redirect or perform any other action after successful submission
        })
        .catch(error => {
            console.error('Error sending password:', error);
        });
}

function createStudent() {
    // Get input values
    var nom = document.getElementById('nomInput').value;
    var prenom = document.getElementById('prenomInput').value;
    var email = document.getElementById('emailInput').value;

    // Data to be sent in the request
    var data = {
        nom: nom,
        prenom: prenom,
        email: email
    };

    // Fetch options
    var options = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    };

    // Endpoint for creating student
    var url = '/testhome/student/createStudent';

    // Send the request
    fetch(url, options)
        .then(response => {
            
            if (!response.ok) {
                console.log(response);

                throw new Error('Network response was not ok');
                
            }
            // Handle success response here
            console.log('Student created successfully.');
        })
        .catch(error => {
            console.error('Error creating student:', error);
        });
}

