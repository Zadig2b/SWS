function submitRegistration() {
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirmPassword').value;
    if (password !== confirmPassword) {
        alert('Les mots de passe ne correspondent pas.');
        return;
    }
    sendPsw(password)
}

function sendPsw(password) {
    console.log(password);
    var data = {
        password: password
    };
    var options = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    };

    var url = '/cregistration/sendPsw';

    fetch(url, options)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            console.log('Password sent successfully.');
            window.location.href = '/';
        })
        .catch(error => {
            console.error('Error sending password:', error);
        });
}

function createStudent(promoId) {
    var nom = document.getElementById('nomInput').value;
    var prenom = document.getElementById('prenomInput').value;
    var email = document.getElementById('emailInput').value;

    var data = {
        nom: nom,
        prenom: prenom,
        email: email
    };

    var options = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    };

    var url = '/testhome/student/createStudent';

    fetch(url, options)
        .then(response => {
            
            if (!response.ok) {
                console.log(response);

                throw new Error('Network response was not ok');
                
            }
            console.log('Student created successfully.');
            showToast('étudiant créé avec succès', 'success');
        })
        .catch(error => {
            console.error('Error creating student:', error);
        });
}

function renderConfirmRegistrationView() {
    fetch('/cregistration/sendPsw')
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to fetch view');
            }
            return response.text(); 
        })
        .then(html => {
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







