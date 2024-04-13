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
