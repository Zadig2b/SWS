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
    console.log(password);
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
            window.location.href = '/';
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

function renderConfirmRegistrationView() {
    // Fetch the rendered view from the server
    fetch('/cregistration/sendPsw')
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to fetch view');
            }
            return response.text(); // Assuming the response contains HTML content
        })
        .then(html => {
            // Update the document body with the received HTML content
            document.body.innerHTML = html;
        })
        .catch(error => {
            console.error('Error rendering confirm registration view:', error);
        });
}

function login(){
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    console.log(email);
    console.log(password);
    var data = {
        email: email,
        password: password
    };

    var options = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    };

    var url = '/login';

    fetch(url, options)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log(data);

            window.location.href = '/';
        })
        .catch(error => {
            console.error('Error logging in:', error);
        });
}







